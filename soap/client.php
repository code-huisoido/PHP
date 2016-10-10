<?php
    ini_set('soap.wsdl_cache_enabled', "0");
    $soap = new SoapClient('http://localhost/GitHub/Php-Practice/soap/service.php?wsdl', array('trace'=>1));
    echo "<pre>";
    try{
    	var_dump($soap->say());
    }
    catch(SoapFault $soapFault){
    	
    	echo "Request :<br>", htmlentities($soap->__getLastRequest()), "<br>";
        echo "Response :<br>", htmlentities($soap->__getLastResponse()), "<br>";
    }
?>