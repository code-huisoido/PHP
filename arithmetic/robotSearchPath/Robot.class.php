<?php

//扫地机器人移动路径算法
//第一次移动为向后移动，并且机器人不会重复清扫同一个地方
//要求：显示机器人第十二次移动的路径(第几次同理)

class Robot {

    public $path; //移动路径描述
    public $x; //坐标x
    public $y; //坐标y
    public $direction; //移动方向

    function __construct() {
        $this->init();
    }

    //初始化数值
    function init() {
        $this->path = [];
        $this->x = $this->y = 0;
        array_push($this->path, [
            "x" => $this->x, "y" => $this->y
        ]);
        $this->direction = [
            ["x" => $this->x - 1, "y" => $this->y],
            ["x" => $this->x + 1, "y" => $this->y],
            ["x" => $this->x, "y" => $this->y - 1],
            ["x" => $this->x, "y" => $this->y + 1],
        ];
    }

    //机器人向左移动的能力
    function moveLeft() {
        $this->x -= 1;
    }

    //机器人向右移动的能力
    function moveRight() {
        $this->x += 1;
    }

    //机器人向上移动的能力
    function moveUp() {
        $this->y += 1;
    }

    //机器人向下移动的能力
    function moveDown() {
        $this->y -= 1;
    }

    //记录机器人移动过的位置
    function savePath() {
        array_push($this->path, [
            "x" => $this->x, "y" => $this->y
        ]);
    }
}