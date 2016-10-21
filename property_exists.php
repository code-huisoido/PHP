<?php

class Test{

    private $arg1;
    protected $arg2;

    function arg_exists($args){
        return property_exists($this, $args);
    }

}

$test = new Test();
echo "<pre>";
var_dump($test->arg_exists('arg1'));
var_dump($test->arg_exists('arg3'));

//get the result:
//bool(true)
//bool(false)