<?php
/** 
 * abstract class 
 * @author Mehmet Şamlı 
 */ 
abstract class AbstractClass 
{ 
    /** 
     * abstruct metod 
     * @abstract  
     */ 
    abstract protected function getMessage(); 
    /** 
     * mesaj output verir 
     * @return void 
     */ 
    public function getOutput() 
    { 
        echo $this->getMessage(); 
    } 
} 
/** 
 * message class 
 * 
 * @author Mehmet Şamlı 
 */ 
class Message extends AbstractClass  
{ 
    /** 
     * mesaj değerini tutan sabit değişken 
     * 
     * @var string 
     */ 
    private $message; 
    /** 
     * construct metodu 
     * 
     * @param string $message 
     * @return void 
     */ 
    public function __construct($message) 
    { 
        $this->message = $message; 
    } 
    /** 
     * mesah değerini get eder 
     * 
     * @return string 
     */ 
    protected function getMessage() 
    { 
        return $this->message; 
    } 
} 
$message = new Message('Türeyen class'); 
$message->getOutput(); 
?> 