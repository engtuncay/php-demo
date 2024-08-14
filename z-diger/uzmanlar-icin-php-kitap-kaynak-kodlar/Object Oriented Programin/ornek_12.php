<?php 
class deneme{ 
    public $name; 
    public function __call($name,$arr) 
    { 
        print_r($arr); 
        echo "{$name} isimde bir metot bulunmamaktadır"; 
    } 
} 
$deneme = new deneme(); 
$deneme->s(2); 
?>