<?php  
interface arayuz 
{ 
    /** 
     * getName arayüzü 
     * 
     */ 
    public function getName(); 
    /** 
     * setName arayüzü 
     * 
     * @param string $name 
     */ 
    public function setName($name); 
} 
interface derinArayuz extends arayuz  
{ 
    /** 
     * setObject arayüz metodu 
     * 
     * @param Data $data 
     */ 
    public function setObject(Data $data); 
} 
class Data 
{ 
    /** 
     * count sabit değişkeni 
     * 
     * @var integer 
     */ 
    public $count=0; 
    /** 
     * set metodu 
     * 
     * @return void 
     */ 
    public function set() 
    { 
        $this->count++; 
    } 
    /** 
     * get metodu 
     * 
     * @return integer 
     */ 
    public function get() 
    { 
        return $this->count; 
    } 
} 
/** 
 * islem class'ı 
 * 
 */ 
class islem implements derinArayuz  
{ 
    /** 
     * isim sabit değişkeni 
     * 
     * @var string 
     */ 
    private $name; 
    /** 
     * setName metodu 
     * 
     * @param string $name 
     * @return void 
     */ 
    public function setName($name)  
    {  
        $this->name = $name;  
    } 
    /** 
     * getName metodu 
     * 
     * @return string 
     */ 
    public function getName()  
    {  
        return $this->name;  
    } 
    /** 
     * setObject metodu 
     * 
     * @param Data $dataObject 
     * @return integer 
     */ 
    public function setObject(Data $dataObject) 
    { 
        $dataObject->set(); 
        $dataObject->set(); 
        return $dataObject->get(); 
    } 
} 
$Data = new Data(); 
$islem = new islem(); 
$islem->setName("Taha"); 
echo $islem->getName()."\n"; 
echo $islem->setObject($Data); 
?>