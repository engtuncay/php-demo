<?php 
/** 
 * abstract class 
 *  
 * @abstract  
 */ 
abstract class Mesaj 
{ 
    /** 
     * abstract metod 
     * @abstract  
     */ 
    abstract public function a(); 
    /** 
     * static mesaj 
     * 
     * @var string 
     */ 
    private static $mesajText; 
    /** 
     * mesaj set eden metod 
     * 
     * @param string $text 
     * @return void 
     */ 
    public function setMessage($text){ 
        if(!is_string($text)){ 
            throw new Exception('String olmayan bir mesaj!'); 
        } 
        self::$mesajText=$text; 
    } 
    /** 
     * get mesaj 
     * 
     * @return string 
     */ 
    public function getMessage(){ 
        return self::$mesajText; 
    } 
} 
try{ 
    Mesaj::setMessage("Merhaba Arkadaşlar"); 
    echo Mesaj::getMessage(); 
} 
catch(Exception $e){ 
    echo $e->getMessage(); 
} 
?>