<?php
//trait 可以定义抽象方法
trait Hello{
	public function sayHelloWorld(){
		echo 'Hello'.$this->getWorld();
	}
	abstract public function getWorld();
}

class MyHelloWorld{
	private $world;
	use Hello;
	public function getWorld(){
		return $this->world;
	}
	public function setWorld($val){
		$this->world = $val;
	}
}

$myclass = new MyHelloWorld();
$myclass->setWorld('ok');
echo $myclass->getWorld();