<?php 
$SMARTY =& Loader::loadClass("Smarty");  
$SMARTY->caching=2; 
$SMARTY->cache_lifetime = 60; 
$tpl_name='deneme2.tpl'; 

if(!$SMARTY->is_cached($tpl_name)) 
{ 
    $SMARTY->assign('name','Mert'); 
    $arr = array(1,2,3,4,5); 
    $SMARTY->assign('arr',$arr); 
} 
$SMARTY->display('deneme2.tpl'); 
?>
