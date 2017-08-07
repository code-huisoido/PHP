<?php
$conn = mysqli_connect("localhost", "root", "root", "big");
if (!$conn) {
    die("connect failed");
}
mysqli_query($conn, "set names utf8");

$price = 10;
$goods_id = 1;
$sku_id = 11;
$number = 1;

//生成唯一订单号
function buildOrderNo(){
    return uniqid('orderId-', TRUE);
}

//记录日志
function insertLog($event, $type = 0) {
    global $conn;
    $sql = "insert into ih_log(event, type) values('$event', '$type')";
    mysqli_query($conn, $sql);
}

//模拟下单操作，下单前判断redis队列库存量
$redis = new Redis();
$result = $redis->connect('127.0.0.1', 6379);
$count = $redis->lpop('goods_store');
if (!$count) {
    insertLog('error:no store redis');
    die("已抢完啦！");
}

$order_sn = "orderNo-{$count}";
$user_id = uniqid('userId-', TRUE);

$sql = "insert into ih_order(order_sn, user_id, goods_id, sku_id, price) values('$order_sn', '$user_id', '$goods_id', '$sku_id', '$price')";
$order_rs = mysqli_query($conn, $sql);

//库存减少
$sql = "update ih_store set number=number-{$number} where sku_id='$sku_id'";
$store_rs = mysqli_query($conn, $sql);
if (mysql_affected_rows()) {
    insertLog('库存减少成功');
    die("抢购成功啦！");
} else {
    insertLog('库存减少失败');
    die("抢购失败啦！");
}