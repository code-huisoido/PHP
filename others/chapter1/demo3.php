<?php
$a = 0.1;
$b = 0.7;
echo sprintf("%f", $a + $b);
// 浮点型不能用于比较运算
if ($a + $b == 0.8) {
    echo 'I\'m here';
}