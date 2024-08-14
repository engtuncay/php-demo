<?php 
$cache_id = "deneme"; 
$cacheObj = cache::getCache($cache_id); 
if(!$cacheObj) 
{ 
    $DB =& Loader::loadClass('db'); 
    $cacheObj =& Loader::loadClass('dbResult'); 
    $sql = 'SELECT fname,lname FROM user LIMIT ?'; 
    $DB->select($cacheObj,$sql,array(2)); 
    cache::setCache($cache_id,$cacheObj,5); 
    echo "query<br />"; 
} 
echo "<pre>"; 
print_r($cacheObj); 
echo "</pre>"; 
?>