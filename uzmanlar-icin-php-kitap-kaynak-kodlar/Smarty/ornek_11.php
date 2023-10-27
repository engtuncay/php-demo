<?php 
function getNow() 
{ 
    $monthArr = array(); 
    array_push($monthArr,''); 
    array_push($monthArr,'Ocak'); 
    array_push($monthArr,'Şubat'); 
    array_push($monthArr,'Mart'); 
    array_push($monthArr,'Nisan'); 
    array_push($monthArr,'Mayıs'); 
    array_push($monthArr,'Haziran'); 
    array_push($monthArr,'Temmuz'); 
    array_push($monthArr,'Ağustos'); 
    array_push($monthArr,'Eylül'); 
    array_push($monthArr,'Ekim'); 
    array_push($monthArr,'Kasım'); 
    array_push($monthArr,'Aralık'); 

    echo $monthArr[date('n')]; 
} 
$SMARTY =& Loader::loadClass("Smarty");    
$SMARTY->register_block('buay', 'getNow', false); 

$SMARTY->display('deneme_3.tpl'); 
?>
