<?php 
class a 
{ 
    public $name; 
    public function getName() 
    { 
        return $this->name; 
    } 
    public function setName($name) 
    { 
        $this->name = $name; 
    } 
} 
############# 
$a = new a(); 
############# 
$a->setName("Taha Şamlı\n"); 
echo $a->getName(); 
$a->name = "Burak Şamlı\n"; 
echo $a->getName(); 
?>