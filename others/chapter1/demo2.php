<?php

$data = ['a', 'b', 'c'];

foreach ($data as $k => $v) {
    $v = &$data[$k];
    var_dump($data);
}

var_dump($data);

/* 运行结果：
array(3) {
  [0] =>
  string(1) "a"
  [1] =>
  string(1) "b"
  [2] =>
  string(1) "c"
}

array(3) {
  [0] =>
  string(1) "b"
  [1] =>
  string(1) "b"
  [2] =>
  string(1) "c"
}

array(3) {
  [0] =>
  string(1) "b"
  [1] =>
  string(1) "c"
  [2] =>
  string(1) "c"
}

array(3) {
  [0] =>
  string(1) "b"
  [1] =>
  string(1) "c"
  [2] =>
  string(1) "c"
} */