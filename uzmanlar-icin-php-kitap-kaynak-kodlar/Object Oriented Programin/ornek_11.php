<?php 
class deneme{ 
    const deger = "print değeri"; 
    public function __toString() 
    { 
        return self::deger; 
    } 
} 
$deneme = new deneme(); 
echo $deneme; 
?>