<?php
spl_autoload_register(function ($class) {
    $prefix = 'Foo\\Bar\\';

    $base_dir = __DIR__ . '/src/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        //不使用，交给注册的下一个自动加载处理
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace("\\", "/", $relative_class). 'php';
    if ($file_exists($file)) {
        require $file;
    }
});