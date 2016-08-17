<?php
$a = '1';
$b = &$a;
$b = "2$b";
var_dump($a, $b);