<?php
//商品库存队列
$store = 300;
$redis = new Redis();
$result = $redis->connect('127.0.0.1', 6379);
$res = $redis->llen('goods_store');
echo $res;
$count = $store-$res;
for ($i=0; $i < $count; $i++) {
    $redis->lpush('goods_store', $i+1);
}
echo $redis->llen('goods_store');
