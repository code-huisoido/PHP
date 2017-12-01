<?php

$a = range(0, 3);
xdebug_debug_zval('a');

$b = $a;
xdebug_debug_zval('a');

$b = range(0, 1);
var_dump($b);
xdebug_debug_zval('a');


$a = range(0, 3);
xdebug_debug_zval('a');

$b = &$a;
xdebug_debug_zval('a');

$b = range(0, 1);
var_dump($b, $a);
xdebug_debug_zval('a');