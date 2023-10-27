<?php 
$SMARTY =& Loader::loadClass('Smarty'); 
$tpl_name = './search/search_result.tpl'; 

$cache_id = "deneme2"; 
$htmlOutput = cache::getCache($cache_id); 
if(!$htmlOutput) 
{ 
    $DB =& Loader::loadClass('db'); 
    $result =& Loader::loadClass('dbResult'); 
     
    $sql = 'SELECT * FROM user LIMIT ?'; 
    $DB->select($result,$sql,array(20)); 
     
     
    $SMARTY->assign('dataArr',$result->dataArr); 
    $htmlOutput = $SMARTY->fetch($tpl_name,$cache_id,null,false); 
     
    ########################################## 
    cache::setCache($cache_id,$htmlOutput,60); 
    ########################################## 
     
    echo $htmlOutput."\n"; 
    echo "<!-- query -->"; 
} 
else  
    echo $htmlOutput; 
?>