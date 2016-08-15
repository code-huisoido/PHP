<?php
/*
验证码
1、后台保存当前验证码并前台输出
2、点击验证码能切换一个新的验证码
3、输入验证码并检验是否正确
*/

//开始生成一个字符串
$code = array();	//验证码
$code_length = 4;	//默认4位
$origin_str = "123456789abcdefghijklmnpqrstuvwxyz";//支持数字、英文字母
$origin_str_length = strlen($origin_str);
for($i = 0; $i < $code_length; $i++){
	$origin_str_index = rand(0, $origin_str_length-1);
	$code[$i] = $origin_str[$origin_str_index];
}
$code = implode('', $code);
session_start();
$_SESSION['code'] = $code;
session_write_close();
//结束生成一个字符串

//开始定义不缓存的头部
header("Expires: -1");
header("Cache-Control:no-store, private, post-check=0, pre-check=0, max-age=0", FALSE);
header("Pragma:no-cache");
//结束定义不缓存的头部

//若存在以下gd库函数
if(function_exists('imagecreate') && function_exists('imagecolorallocate') && function_exists('imagechar') && function_exists('imageline') && function_exists('imagesetpixel') && function_exists('imagerectangle') && function_exists('imagepng')){
	//开始生成一个验证码背景
	$background = '';
	$width = 60;
	$height = 30;
	$im = imagecreate($width, $height);
	$background = imagecolorallocate($im, 255, 255, 255);
	$numorder = array(1, 2, 3, 4);
	shuffle($numorder);
	$numorder = array_flip($numorder);

	//把字和背景结合
	for($i = 1; $i <= 4; $i++){
		$c = $code[$numorder[$i]];
		$font = 5;
		$x = $numorder[$i] * 13 + mt_rand(0, 4) - 2;
		$y = mt_rand(0, 3);
		$color = imagecolorallocate($im, mt_rand(50, 255), mt_rand(50, 128), mt_rand(50, 255));
		imagechar($im, $font, $x + 5, $y + 3, $c, $color);
	}

	//加线条
	$linenums = mt_rand(0, 10);
	for($i = 0; $i <= $linenums; $i++){
		$x1 = mt_rand(0, $width);
		$y1 = mt_rand(0, $height);
		$x2 = $x1 + mt_rand(0, 4) - 2;
		$y2 = $y1 + mt_rand(0, 4) - 2;
		$color = imagecolorallocate($im, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
		imageline($im, $x1, $y1, $x2, $y2, $color);
	}

	//加像素点
	for($i = 0; $i <= 40; $i++){
		$x = mt_rand(0, $width);
		$y = mt_rand(0, $height);
		$color = imagecolorallocate($im, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
		imagesetpixel($im, $x, $y, $color);
	}

	//加一个矩形边框
	$bordercolor = imagecolorallocate($im, 150, 150, 150);
	imagerectangle($im, 0, 0, $width - 1, $height - 1, $bordercolor);

	//结束生成一个验证码背景

	//开始输出验证码
	header('Content-type: image/png');
	imagepng($im);
	imagedestroy($im);
	//结束输出验证码
}


?>

