<?php

//扫地机器人移动路径算法
//第一次移动为向后移动，并且机器人不会重复清扫同一个地方
//要求：显示机器人第十二次移动的路径(第几次同理)

//path 是多条的，因此不能固定
//nextPosition 也是动态变化，因此不能固定
/*$this->nextPostion = [
    "Down" => ["x" => $this->x, "y" => $this->y - 1],
    "Left" => ["x" => $this->x - 1, "y" => $this->y],
    "Right" => ["x" => $this->x + 1, "y" => $this->y],
    "Up" => ["x" => $this->x, "y" => $this->y + 1]
];*/

include_once "./Robot.class.php";
const TIMES = 12;

class Path {

    public $robot;     //移动主体
    public $multiPath; //所有可能移动的路径
    
    function __construct() {
        $this->robot = new Robot();
        $this->multiPath = [];
    }

    //判断是否可以往某个方向移动
    function canMove($path, $nextPosition) {

        foreach ($path as $k => $v) {

            $diff = array_diff($v, $nextPosition);

            //符合不重复规则
            if (count($diff) == 0) {
                return 1;
            }
        }
        return 0;
    }

    //更新机器人位置
    function updatePosition() {

        foreach ($this->robot->nextPostion as $k => $v) {
            if ($this->canMove($v)) {
                $operation = "move".$k;
                $this->robot->$operation();
                
                break;
            }
        }


    }

    //一定次数下自动寻找路径
    function searchPath($path = []) {

        
        $this->searchPath($path);
        array_push($this->multiPath, $path);
    }

    //走起
    function go($times) {
        for ($i=0; $i < $times; $i++) { 
            $this->searchPath();
        }
    }

    //输出路径
    function echoPath() {
        echo "<pre>";
        var_dump($this->multiPath);
        //用圆形代表机器人
        /*foreach ($this->robot->path as $k => $v) {
            for ($i = 0; $i < abs($v['x']); $i++) {
                echo " ";
            }
            for ($j = 0; $j < abs($v['y']); $j++) {
                echo "<br/>";
            }
            echo "o"
        }*/
    }


}

$aPath = new Path();
$aPath->go(TIMES);