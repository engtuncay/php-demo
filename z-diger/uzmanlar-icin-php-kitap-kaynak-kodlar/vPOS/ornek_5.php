<?php 
include('../config.inc.php'); 
highlight_file(__FILE__); 


$PAYMENTMANAGEMENT =& new payment_management($DB,$_POST,$user_id); 
$PAYMENTMANAGEMENT->SMARTY = $smarty; 

if ($_POST) 
{ 
    $DB->startTransaction(); 
        $return = $PAYMENTMANAGEMENT->setPayment(request('payment_transaction_type','POST')); 
    $DB->commit(); 
     
    if ($return == false || $PAYMENTMANAGEMENT->errorMessage != '') 
    { 

        die($PAYMENTMANAGEMENT->errorMessage); 
    } 
    die("Ödemeniz gerçekleşmiştir"); 
} 

$PAYMENT = new payment($DB); 
$payment_session_id = $PAYMENT->paymentSession(); 
$amount = 100;// çekilecek tutar 
$smarty->assign('bankAccountArr',$PAYMENTMANAGEMENT->getBankAccount()->dataArr); 


$smarty->assign('fullName',$teslimatArr->dataArr[0]['fullName']); 
$smarty->assign('address',$teslimat); 
$smarty->assign('tell',$teslimatArr->dataArr[0]['telephone']); 
$smarty->assign('yedek',$teslimatArr->dataArr[0]['yedek']); 


$sql = 'SELECT * FROM bankAccount WHERE vposDefault=1'; 
$result = new dbResult(); 
$DB->select($result,$sql); 
$clientId=$result->dataArr[0]['vposClientID']; 
$okUrl = 'https://www.deneme.com/pay.php'; 
$failUrl = 'https://www.deneme.com/pay.php'; 
$smarty->assign('clientId',$clientId); 
$smarty->assign('oid',$payment_session_id); 
$smarty->assign('okUrl',$okUrl); 
$smarty->assign('failUrl',$failUrl); 

$oid = $payment_session_id;   //Siparis numarasi 

//Tarih veya her seferinde degisen bir deger güvenlik amaçlı 
$rnd = microtime(); 

//is yeri ayiraci (is yeri anahtari) 
$storekey = $result->dataArr[0]['storekey']; 
$storetype = "3d";//3D modeli 


// 3D modelinde hash hesaplamasinda islem tipi ve taksit kullanilmiyor 
$hashstr = $clientId . $oid . $amount . $okUrl . $failUrl . $rnd  . $storekey; 

$hash = base64_encode(pack('H*',sha1($hashstr))); 

$smarty->assign('rnd',$rnd); 
$smarty->assign('hash',$hash); 
$smarty->assign('amount',$amount); 

$smarty->display('test/payment.tpl'); 
?>