<?php 
class a 
{ 
    public function __construct() 
    { 
        echo "Başlangıç \n"; 
    } 
    public function __destruct() 
    { 
        echo "Bitiş\n"; 
    } 
} 
$a = new a(); 
echo "deneme\n"; 
?> 