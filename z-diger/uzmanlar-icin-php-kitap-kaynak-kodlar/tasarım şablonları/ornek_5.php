<?php
abstract class DataPrototype{ 
   private $size; 
   private $data; 
   abstract public function __clone(); 
   abstract public function getData(); 
   abstract public function setData($data); 
   abstract public function getSize(); 
} 
class ArrayPrototype extends DataPrototype{      
  public function setData($data){ 
     if(!is_array($data)){ 
       throw new Exception('parametre  Array değil'); 
     } 
     $this->data=$data; 
  } 
  public function getData(){ 
    return $this->data;                      
  } 
  public function getSize(){ 
    if(!$size=count($this->data)){ 
      throw new Exception('Değer array değil'); 
    } 
    return $size; 
  } 
  public function __clone(){} 
} 
$ArrayPrototype = new ArrayPrototype(); 
$ArrayPrototype2 = clone $ArrayPrototype; 

$ArrayPrototype->setData(array(12,231,23)); 
echo $ArrayPrototype->getSize(); 
$ArrayPrototype2->setData(array(12,11,20)); 
print_r($ArrayPrototype2->getData());
?>