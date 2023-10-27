<?php
/** 
 * hata kodu yöneten class 
 * @author  Mehmet Şamlı 
 */ 
class errorManagement 
{ 
    /** 
     * hata kod numarası 
     * 
     * @var array 
     */ 
    public $error = array(); 
    /** 
     * hata mesajı 
     * 
     * @var string 
     */ 
    public $errorMessage; 
    /** 
     * Class içerisinde oluşan hataları set eder 
     * 
     * @param errorId $errorId 
     * @return return 
     */ 
    public function setErrorMessage($errorId) 
    { 
        $error[0] = 'Bilinmeyen bir hata oluştu'; 
        $error[1] = 'Belirttiğiniz banka sistemimizde bulunamadı!';         
        if ( array_key_exists($errorId,$error) ) 
            $this->errorMessage = $error[$errorId]; 
        return true; 
    } 
    /** 
     * Class içerisinde oluşan hataları get eder 
     * 
     * @return errorMessage 
     */ 
    public function getErrorMessage() 
    { 
        return $this->errorMessage; 
    } 
}
?>