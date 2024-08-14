<?php 
class a 
{ 
    private $name; 
    protected function getName() 
    { 
        return $this->name; 
    } 
    protected function setName($name) 
    { 
        $this->name = $name; 
    } 
} 
class b extends a  
{ 
    private $year;     
    public function setData($name,$year) 
    { 
        parent::setName($name); 
        self::setYear($year); 
    } 
    private function setYear($year) 
    { 
        $this->year = $year; 
    } 
    private function getYear() 
    { 
        return $this->year; 
    } 
    public function getData() 
    { 
        $name = parent::getName(); 
        $year = self::getYear(); 
        return array($name,$year); 
    } 
} 
$b = new b(); 
$b->setData('Taha Şamlı',1); 
$returnArr = $b->getData(); 
printf("%s şuan %s yaşında.",$returnArr[0],$returnArr[1]); 
?> 
