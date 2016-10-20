<?php
/* 普通工厂类写法
class Superman{
	protected $power;

	public function __construct(array $modules){
		$factory = new SuperModuleFactory;

		foreach($modules as $moduleName => $moduleOptions){
			$this->power[] = $factory->makeModule($moduleName, $moduleOptions);
		}
	}
}

$superman = new Superman([
	'Fight' => [9, 100],
	'Shot' => [99, 50, 2]
]);*/

class Superman{
	protected $module;

	public function __construct(SuperModuleInterface $module){
		$this->module = $module;
	}
}