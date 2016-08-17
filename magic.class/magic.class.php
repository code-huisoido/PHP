<?php
/************************************/
/**    php魔术方法之__set、__get    */
/**                                 */
/************************************/

class BaseController
{	
	private $a;
	public $b;
	public $c = 0;
	public $tmp_arr;

	public function __set($name, $value){
		echo "set变量{$name}不存在或者不能访问<br>";
		$this->tmp_arr[$name] = $value;
	}

	public function __get($name){
		echo "get变量{$name}不存在或者不能访问<br>";	
	}
}

class Magic extends BaseController
{
	function index()
	{
		echo "私有变量a：".$this->a."<br>";
		echo "公有变量c：".$this->c."<br>";

		$this->c = "1";
		echo "公有变量c：".$this->c."<br>";

		$this->d = "我是不存在变量d";
		$this->e = "我是不存在变量e";
		var_dump($this->tmp_arr);
	}
}

$instance = new Magic();
$instance->index();