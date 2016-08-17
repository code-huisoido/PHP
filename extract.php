<?php

$arr = array(
	"name" => 'hui',
	"age" => 25,
	"sex" => 'male'
	);

extract($arr);
/*//相当于以下效果
$name = $arr['name'];
$age = $arr['age'];
$sex = $arr['sex'];
*/

echo "info:$name,$age,$sex";