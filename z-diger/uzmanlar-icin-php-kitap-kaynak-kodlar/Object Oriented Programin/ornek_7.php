<?php 
class a 
{ 
    public static $static = "static metot\n"; 
    public function getStatic() 
    { 
        return self::$static; 
    } 
} 
class b extends a  
{ 
    public function tureyen() 
    { 
        return parent::$static; 
    } 
} 
$a = new a(); 
echo $a->getStatic(); 
$b = new b(); 
echo $b->tureyen(); 
?>