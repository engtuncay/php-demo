<?php
interface test{
    public function getData();
    public function setData($data);
}
class deneme implements test {
    private $data;
    public function __construct(){
        
    }
    public function setData($data){
        $this->data=$data;
    }
    public function getData(){
        return $this->data;
    }
}
interface test2 extends test {
    public function carpan($carpan);
}
class deneme2 implements test2 {
    private $data;
    public function __construct(){
    }
    public function setData($data){
        $this->data=$data;
    }
    public function getData(){
        return $this->data;
    }
    public function carpan($carpan){
        return self::getData()*$carpan;
    }
}
$deneme = new deneme();
$deneme->setData(10);
echo $deneme->getData()."\n";

$deneme2= new deneme2();
$deneme2->setData(10);
echo $deneme2->carpan(5);
?>