<?php
/**
 * 经测试，子类方法覆盖了trait方法，trait方法覆盖了父类方法
 */
class Base {
	public function sayHello(){
		echo 'Hello ';
	}
}

trait SayWorld{
	public function sayHello(){
		parent::sayHello();
		echo 'World!';
	}
}

class MyHelloWorld extends Base{
	use SayWorld;

	public function sayHello(){
		echo 'I\'m a son';
	}
}

$o = new MyHelloWorld();
$o->sayHello();

