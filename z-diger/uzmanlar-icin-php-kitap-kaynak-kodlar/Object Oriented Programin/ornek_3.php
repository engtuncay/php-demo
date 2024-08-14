<?php 
class a 
{ 
    # php 4 ile kullanılan construct metodu 
    function a() 
    { 
        echo "PHP 4"; 
    } 
    # php 5 ile gelen construct metodu 
    function __construct() 
    { 
        echo "PHP 5"; 
    }     
} 
$a = new a(); 
?>