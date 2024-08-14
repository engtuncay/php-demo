<?php 
class defineClass 
{ 
    const classVersion = '1.0'; 
    public function getVersion() 
    { 
        return self::classVersion; 
    } 
} 
echo defineClass::classVersion; 
echo "\n"; 
echo defineClass::getVersion(); 
echo "\n"; 
$defineClass = new defineClass(); 
echo $defineClass->getVersion(); 
?> 