<?php

//扫地机器人移动路径算法
//第一次移动为向后移动，并且机器人不会重复清扫同一个地方
//要求：显示机器人第十二次移动的路径(第几次同理)

class Robot {
    public $x; //坐标x
    public $y; //坐标y

    function __construct() {
        $this->init();
    }

    //初始化数值
    function init() {
        $this->x = $this->y = 0;
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
}