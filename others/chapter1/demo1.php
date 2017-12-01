<?php

$a = range(0, 3);
xdebug_debug_zval('a');

$b = $a;
xdebug_debug_zval('a');

$a = range(0, 3);
xdebug_debug_zval('a');

$b = &$a;
xdebug_debug_zval('a');

/* 运行结果:
a: (refcount=1, is_ref=0)=array (0 => (refcount=1, is_ref=0)=0, 1 => (refcount=1, is_ref=0)=1, 2 => (refcount=1, is_ref=0)=2, 3 => (refcount=1, is_ref=0)=3)
a: (refcount=2, is_ref=0)=array (0 => (refcount=1, is_ref=0)=0, 1 => (refcount=1, is_ref=0)=1, 2 => (refcount=1, is_ref=0)=2, 3 => (refcount=1, is_ref=0)=3)
a: (refcount=1, is_ref=0)=array (0 => (refcount=1, is_ref=0)=0, 1 => (refcount=1, is_ref=0)=1, 2 => (refcount=1, is_ref=0)=2, 3 => (refcount=1, is_ref=0)=3)
a: (refcount=2, is_ref=1)=array (0 => (refcount=1, is_ref=0)=0, 1 => (refcount=1, is_ref=0)=1, 2 => (refcount=1, is_ref=0)=2, 3 => (refcount=1, is_ref=0)=3) */