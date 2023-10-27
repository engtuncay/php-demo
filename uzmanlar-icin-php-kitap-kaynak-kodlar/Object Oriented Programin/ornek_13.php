<?php 
class overloading{ 
    /** 
     * overloading yapılacak değişken 
     * 
     * @var array 
     */ 
    private $veri = array(); 
    /** 
     * overloading set eden metot 
     * 
     * @param string $name 
     * @param mixed $value 
     */ 
    public function __set($name, $value) { 
        $this->veri[$name] = $value; 
    } 
    /** 
     * overloading get eden metot 
     * 
     * @param string $name 
     * @return mixed 
     */ 
    public function __get($name) { 
        if (array_key_exists($name, $this->veri)) { 
            return $this->veri[$name]; 
        } 
    } 
    /** 
     * overloading isset 
     * 
     * @param unknown_type $isim 
     * @return unknown 
     */ 
    public function __isset($name) { 
        return isset($this->veri[$name]); 
    } 

    /** 
     * overloading unset metodu 
     * 
     * @param string $name 
     */ 
    public function __unset($name) { 
        unset($this->veri[$name]); 
    }
    /** 
     * getData metodu 
     * 
     * @param string $name 
     */  
    public function getData(){ 
        print_r($this->veri); 
    } 
    /** 
     * overloading metot 
     * 
     * @param string $name 
     * @param string $detail 
     * @return void
     */ 
    public function __call($name,$detail) 
    { 
        echo "\n'$name' adında metotdun değeri:\n"; 
        print_r($detail); 
    } 
    /** 
     * overloading metot 
     * 
     * @param string $name 
     * @param string $detail 
     */ 
    public static function __callStatic($name,$detail) 
    { 
        echo "\n'$name' adında metotdun değeri:\n"; 
        print_r($detail); 
    } 
} 
$overloading = new overloading(); 
$overloading->isim = 'Akif'; 
$overloading->soyisim = 'Göcek'; 
$overloading->getData(); 
unset($overloading->isim); 
$overloading->getData(); 
print_r($overloading->soyisim); 
$overloading->deneme(array(1,2,3));
?>