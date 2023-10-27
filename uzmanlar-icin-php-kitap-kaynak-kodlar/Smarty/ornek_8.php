<?php 
$SMARTY =& Loader::loadClass("Smarty");
$SMARTY->caching=2; 
$SMARTY->cache_lifetime = 60; 
$tpl_name='deneme2.tpl'; 

// user_id 
$cache_id=1; 
// user_id altında farklı bir cache 
$compile_id = 10; 
if(!$SMARTY->is_cached($tpl_name,$cache_id,$compile_id)) 
{ 
    $SMARTY->assign('name','Mert'); 
    $arr = array(1,2,3,4,5); 
    $SMARTY->assign('arr',$arr); 
} 
$SMARTY->display($tpl_name,$cache_id,$compile_id); 
?>
