<?php

function myPrint($result) {
    echo "<pre>";
    var_dump($result);
}

function setLog($message, $code='200', $logName='log') {
    $logContent = [
        "time" => date("y-m-d H:i:s", time()),
        "code" => $code,
        "message" => $message
    ];
    file_put_contents(dirname(__FILE__)."/{$logName}.txt", json_encode($logContent).PHP_EOL, FILE_APPEND);
}

function microtime_float() {
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

function easyLog($result, $message, $logName='log') {
    if ($result === false) {
        setLog([
            "error" => $message
        ], 500, $logName);
    } else {
        setLog([
            "success" => $message
        ], 200, $logName);
    }
}

function dd($result) {
    echo "<pre>";
    print_r($result);
    die;
}