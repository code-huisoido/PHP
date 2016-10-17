<?php
$redis = new Redis();
$redis->connect('127.0.0.1',6379);
$redis->set('name','swhui');
echo 'Hi '.$redis->get('name');
echo '</br>';
echo 'Hi '.$redis->get('name2');

?>