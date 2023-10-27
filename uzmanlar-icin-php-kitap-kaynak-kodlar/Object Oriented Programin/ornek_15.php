<?php 
class ozel 
{ 
    private static $data=1; 
    public function __construct() 
    { 
    } 
    public static function getData() 
    { 
        return self::$data; 
    } 
    public function __clone() 
    { 
        trigger_error("Bu class klonlanamaz!",E_USER_NOTICE); 
    } 
} 
$ozelObj = new ozel(); 
$ozel = clone $ozelObj; 
?>