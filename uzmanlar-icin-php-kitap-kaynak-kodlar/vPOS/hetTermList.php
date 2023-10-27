<?php
include('../config.inc.php');
$payment_session_id = (int)request('payment_session_id','SESSION');
if (request('controle','POST')=='1') 
{

	
	$sql = 'SELECT * FROM bankAccount WHERE vposDefault=1';
	$result = new dbResult();
	$DB->select($result,$sql);
	
	$a = request('a','POST');
	$b = request('b','POST');
	$c = request('c','POST');
	$time = microtime();
$hashstr = $result->dataArr[0]['vposClientID']
. $payment_session_id 
. $a 
. $b
. $c
. $time  
. $result->dataArr[0]['storekey']; 
//echo "$clientId . $oid . $amount . $okUrl . $failUrl . $rnd  . $storekey";
//echo $hashstr;




echo "{a:'".base64_encode(pack('H*',sha1($hashstr)))."',b:'".$time."'}";


}
else
	echo "-1";
?>