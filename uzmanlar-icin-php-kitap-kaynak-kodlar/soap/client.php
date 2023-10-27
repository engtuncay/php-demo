<?php
try{
	$soap = new SoapClient('http://localhost/soap/service_1.php?wsdl');
	$arr = $soap->musteriBilgisiGetir(11);
	print_r($arr);
}catch(SoapFault $error){
	trigger_error($error->getMessage(),E_USER_ERROR);
}