<?php 
/** 
 * genel abstruct metod 
 * @abstract  
 */ 
abstract class save 
{ 
    /** 
     * sadece cookie için kullanacağımız cookie zamanı 
     * 
     * @var integer 
     */ 
    protected $expire=3600; 
    /** 
     * sadece cookie için kullanacağımız cookie path'i 
     * 
     * @var string 
     */ 
    protected $path='/'; 
    /** 
     * abstract set metodu 
     * 
     * @param string $name 
     * @param string $value 
     */ 
    abstract protected function set($name,$value); 
    /** 
     * abstract get metodu 
     * 
     * @param string $name 
     */ 
    abstract protected function get($name); 
} 
/** 
 * session class 
 *  
 */ 
class session extends save  
{ 
    /** 
     * construct metodu 
     * 
     * @return void 
     */ 
    public function __construct() 
    { 
        session_start(); 
    } 
    /** 
     * session set eden metod 
     * abstract metod ile bağlantılı 
     * 
     * @param string $name 
     * @param string $value 
     * @return void 
     */ 
    public function set($name,$value) 
    { 
        $_SESSION[$name]=$value; 
    } 
    /** 
     * session get eden metod 
     * abstract metod ile bağlantılı 
     *  
     * @param string $name 
     * @return string 
     */ 
    public function get($name) 
    { 
        return $_SESSION[$name]; 
    } 
} 
/** 
 * cookie class 
 * 
 */ 
class cookie extends save  
{ 
    /** 
     * cookie set eden metod 
     * abstract metod ile bağlantılı 
     * 
     * @param string $name 
     * @param string $value 
     * @return void 
     */ 
    public function set($name,$value) 
    { 
        setcookie($name,$value,time()+$this->expire,$this->path); 
    } 
    /** 
     * cookie get eden metod 
     * abstract metod ile bağlantılı 
     *  
     * @param string $name 
     * @return string 
     */ 
    public function get($name) 
    { 
        return $_COOKIE[$name]; 
    } 
} 
$cookie = new cookie(); 
$cookie->set('name','Taha1<br />'); 
echo $cookie->get('name'); 

$session = new session(); 
$session->set('isim','Taha2'); 
echo $session->get('isim'); 
?>