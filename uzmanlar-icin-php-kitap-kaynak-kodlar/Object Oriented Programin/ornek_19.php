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
/** 
 * arayüzle tanımlanmış class 
 * 
 */ 
class isim implements arayuz  
{ 
    private $name; 
    public function setName($name) 
    { 
        $this->name = $name; 
    } 
    public function getName() 
    { 
        return $this->name; 
    } 
    // diğer metotlar 
} 
$isim = new isim(); 
$isim->setName("Taha"); 
echo $isim->getName(); 
?>