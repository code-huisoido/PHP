<?php
function myGenerator() {
    yield 'value1';
    yield 'value2';
    yield 'value3';
}

foreach (myGenerator() as $yieldedValue) {
    echo $yieldedValue, PHP_EOL;
}