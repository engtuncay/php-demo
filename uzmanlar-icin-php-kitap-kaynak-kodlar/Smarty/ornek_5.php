<?php 
$SMARTY =& Loader::loadClass("Smarty");  

$SMARTY->assign('name','Mert'); 
$arr = array(1,2,3,4,5); 
$SMARTY->assign('arr',$arr); 

$SMARTY->display('deneme2.tpl'); 
?>
