<?php
trait HelloWorld{
	public function sayHello(){
		echo 'Hello World!';
	}
}

//修改sayHello的访问控制
class MyClass1{
	use HelloWorld{
		sayHello as protected;
	}
}


class MyClass2{
	use HelloWorld{
		sayHello as private myPrivateHello;
	}
}

//经测试，访问sayHello可以，myPrivateHello报私有方法错误
$myclass = new MyClass2();
$myclass->sayHello();