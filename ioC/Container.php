<?php

class Container{
	protected $binds;

	protected $instances;

	public function bind($abstract, $concrete){
		if($concrete instanceof Closure){
			$this->binds[$abstract] = $concrete;
		}else{
			$this->instances[$abstract] = $concrete;
		}
	}

	public function make($abstract, $parameters = []){
		if(isset($this->instances[$abstract])){
			return $this->instances[$abstract];
		}

		array_unshift($parameters, $this);

		return call_user_func_array($this->binds[$abstract], $parameters);
	}
}

$container = new Container;

$container->bind('superman', function($container, $moduleName){
	return new Superman($container->make($moduleName));
});

$container->bind('xpower', function($container){
	return new XPower;
});

$container->bind('ultrabomb', function($container){
	return new UltraBomb;
});


//开始启动生产
$superman_1 = $container->make('superman', 'xpower');
$superman_2 = $container->make('superman', 'ultrabomb');
$superman_3 = $container->make('superman', 'xpower');