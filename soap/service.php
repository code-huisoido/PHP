<?php
include("soapHandle.class.php");
$wsdl_name = 'soapHandle.wsdl';

//如果没有wsdl文件就创建
if(!file_exists($wsdl_name)){
	include("SoapDiscovery.class.php");
	$disco = new SoapDiscovery('soapHandle', 'myService'); 
	$disco->getWSDL();
}

//注册服务
$server = new SoapServer($wsdl_name);
$server->setClass("soapHandle");
$server->handle();
?>