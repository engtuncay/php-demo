<?php 
class staticClass 
{ 
    public static $count=1;     
    public static function setCount() 
    { 
        self::$count++; 
    } 
    public static function getCount() 
    { 
        return self::$count; 
    } 
} 
staticClass::setCount(); 
staticClass::setCount(); 
staticClass::setCount(); 
$s = new staticClass(); 
echo $s->getCount(); 
echo staticClass::getCount(); 
?>