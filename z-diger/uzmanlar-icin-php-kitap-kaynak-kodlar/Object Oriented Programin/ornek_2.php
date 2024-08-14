<?php 
function __autoload($className) 
{ 
    $includeFile = "/lib/{$className}.class.php"; 
    if(file_exists($includeFile)) 
        require_once($includeFile); 
    else  
        throw new Exception("{$className}.class.php dosyası yüklenemedi."); 
} 
?>