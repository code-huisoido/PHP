<?php

namespace NBA;

class Jorden
{
	function __construct(){
		echo "my class name is ".get_class();
	}
}

new Jorden;
echo "<br>";
echo \NBA\Jorden::class;