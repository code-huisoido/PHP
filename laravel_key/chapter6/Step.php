<?php
interface Step
{
    public static function go(Closure $next);
}

class FirstStep implements Step
{
    public static function go(Closure $next)
    {
        echo "开启session，获取数据\n";
        $next();
        echo "保存数据，关闭session\n";
    }
}

function goFun($step, $className)
{
    return function() use ($step, $className)
    {
        return $className::go($step);
    };
}

function then()
{
    $steps = ["FirstStep"];
    $prepare = function() {
        echo "请求向路由器传递，返回响应\n";
    };
    $go = array_reduce($steps, "goFun", $prepare);
    print_r($go);
    $go();
}

then();