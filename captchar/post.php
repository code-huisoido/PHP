<?php

$captcha_input = trim($_POST['captcha_input']);

session_start();
if($captcha_input === $_SESSION['code']){
	echo "输入正确！";
}else{
	echo "error！";
	die;
}
