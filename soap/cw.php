<?php

//include("service.php");
include("soapHandle.class.php");
include("SoapDiscovery.class.php");

$disco = new SoapDiscovery('soapHandle', 'myService'); 
//第一个参数是类名（生成的wsdl文件就是以它来命名的），即Service类，第二个参数是服务的名字（这个可以随便写）。
$disco->getWSDL();

?>