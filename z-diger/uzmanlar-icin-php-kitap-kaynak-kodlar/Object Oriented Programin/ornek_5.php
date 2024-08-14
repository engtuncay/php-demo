<?php 
class a 
{ 
    private $name; 
    public function getName() 
    { 
        $length = self::getLength(); 
        return $length.$this->name; 
    } 
    public function setName($name) 
    { 
        $this->name = $name; 
    } 
    private function getLength() 
    { 
        return mb_strlen($this->name,"UTF-8")."\n"; 
    } 
} 
$a = new a(); 
$a->setName("Taha Şamlı\n"); 
echo $a->getName(); 
?>