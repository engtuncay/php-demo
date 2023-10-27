<?php 
/** 
 * dinleyici class 
 * 
 * @author deniz 
 */ 
class dinleyici 
{ 
    /** 
     * Query sonucunda dönen satır sayısı 
     * 
     * @var integer 
     */ 
    public $num_rows; 
    /** 
     * Query sonucunda oluşan data'nın aktarılacağı Array 
     * 
     * @var array 
     */ 
    public $dataArr; 
    /** 
     * Genel çalışma methodu 
     * 
     * @return void 
     */ 
    public function __construct() 
    { 
        $this->num_rows = 0; 
        $this->dataArr = array(); 
    } 
} 
$dinleyiciObj1 = new dinleyici(); 
$dinleyiciObj2 = $dinleyiciObj1; 
$dinleyiciObj3 = clone $dinleyiciObj1; 
$dinleyiciObj1->num_rows=2; 

print_r($dinleyiciObj1); 
print_r($dinleyiciObj2); 
print_r($dinleyiciObj3); 
?>