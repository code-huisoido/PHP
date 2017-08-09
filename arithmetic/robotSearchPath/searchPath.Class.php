<?php

//扫地机器人移动路径算法
//第一次移动为向后移动，并且机器人不会重复清扫同一个地方
//要求：显示机器人第十二次移动的路径(第几次同理)

include_once "./Robot.class.php";
const TIMES = 12;

class Path {

    public $robot;

    //每次移动的方向数组
    function __construct() {
        $this->robot = new Robot();
    }

    //判断是否可以往某个方向移动
    function canMove($nextPosition) {
        
        foreach ($this->robot->path as $k => $v) {
            $diff = array_diff($v, $nextPosition);
            if (0 == count($diff)) {
                return 0; //下一个移动的位置不符合规则
            }
        }
        return 1;
    }

    //一定次数下自动寻找路径
    function searchPath($times = 0) {

        if (!$times) die("原地不动");

        for ($i = 1; $i <= $times; $i++) {
            foreach ($this->robot->direction as $k => $v) {
                if ($this->canMove($v)) {
                    $this->robot->savePath();
                }
            }
        }
    }
}

$aPath = new Path();
$aPath->searchPath(TIMES);