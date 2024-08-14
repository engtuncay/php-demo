<?php 
/** 
 * class yaratmaya yarayan class 
 *  
 * @author Mehmet Şamlı 
 */ 
class Loader 
{  
    private static $objects = array(); 
    /** 
     * classın construct methodu yoktur. 
     * dolayısıyla new Loader şeklinde çağrılamaz. 
     * Bunun için fonksiyonu final private şeklinde tanımladık 
     * 
     * @return void 
     */ 
    final private function __construct()  
    { 
    } 
    /** 
     * class klonlanamaz. 
     * 
     * @return void 
     */ 
    final private function __clone()  
    { 
    } 
    /** 
     * class çağıran method. 
     * Eğer class önceden yaratılmışsa aynen alır yaratılmamışsa  
     * eğer yaratılmamışsa yeni bir class yaratır 
     * 
     * @param string $class 
     * @return object 
     */ 
    public static function &loadClass($class)  
    { 
        if (isset(self::$objects[$class])) 
            return self::$objects[$class]; 
          self::$objects[$class] = new $class();   
          return self::$objects[$class];  
    } 
} 
?>