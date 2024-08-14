<?php 
$xCache =& XCache::getInstance();
$xCache->timeout=3;
if(!$xCache->data){    
    $sql = 'SELECT * FROM news LIMIT 10';
    $result = new dbResult();
    $DB->select($result,$sql);
    $xCache->data=serialize($result);
    
    echo "DB'den geldi <br /><pre>";
    print_r(unserialize($xCache->data));
}
else {
    echo "cache'den geldi <br /><pre>";
    print_r(unserialize($xCache->data));
}
echo "<pre/>";
?>