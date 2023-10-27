<?php 
$SMARTY =& Loader::loadClass('Smarty'); 
$tpl_name = './search/search_result.tpl'; 

$xCache =& XCache::getInstance();
$xCache->timeout=120;
if(!$xCache->data) 
{ 
    $DB =& Loader::loadClass('db'); 
    $result =& Loader::loadClass('dbResult'); 
     
    $sql = 'SELECT * FROM user LIMIT ?'; 
    $DB->select($result,$sql,array(20)); 
     
     
    $SMARTY->assign('dataArr',$result->dataArr); 
    $htmlOutput = $SMARTY->fetch($tpl_name,$cache_id,null,false); 
     
    ########################################## 
    $xCache->data = $htmlOutput;
    ########################################## 
     
    echo $htmlOutput."\n"; 
    echo "<!-- query -->"; 
} 
else  
    echo $xCache->data; 
?>