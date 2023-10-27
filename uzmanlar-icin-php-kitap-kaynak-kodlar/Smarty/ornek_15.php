<?php 
/** 
 * db objelerini oluşturan class 
 * 
 * @author Mehmet Şamlı 
 */ 
class dbExtend 
{ 
    /** 
     * DB object 
     * 
     * @var object 
     */ 
    protected $DB; 
    /** 
     * POST|GET dizi 
     * 
     * @var array 
     */ 
    protected $criteria; 
    /** 
     * DB result object 
     * 
     * @var object 
     */ 
    protected $result; 
    /** 
     * dataların tutulduğu array 
     * 
     * @var array 
     */ 
    protected $dataArr = array(); 
    /** 
     * user id 
     * 
     * @var integer 
     */ 
    protected $user_id; 
    /** 
     * sql cümleciği 
     * 
     * @var string 
     */ 
    protected $sql; 
    /** 
     * order by alanları 
     * 
     * @var array 
     */ 
    protected $od = array('','ASC','DESC'); 
    /** 
     * query filedleri 
     * 
     * @var string 
     */ 
    protected $fieldArr; 
    /** 
     * kayıtta dönen id 
     * 
     * @var integer 
     */ 
    public $insert_id; 
     
    /** 
     * değişkenleri kontrol eder 
     * 
     * @param string $varName 
     * @return boolean 
     */ 
    protected function checkVar($varName) 
    { 
        if(array_key_exists($varName,$this->criteria)&&trim($this->criteria[$varName])!="") 
        {             
            if(!is_array($this->criteria[$varName])) 
                $this->criteria[$varName] = addslashes(stripslashes($this->criteria[$varName])); 
            else  
                $this->criteria[$varName] = request($varName,'REQUEST'); 
            return true; 
        } 
        return false; 
    } 
    /** 
     * sql cümleciğini besleyen dataArr dizisine data push ede 
     * 
     * @param string $value 
     * @param string $characterType 
     * @return void 
     */ 
    protected function push($value,$characterType='s') 
    { 
        switch ($characterType) 
        { 
            case 'i': 
                array_push($this->dataArr,(int)$value); 
                break; 
            case 's': 
                array_push($this->dataArr,(string)$value); 
                break; 
            case 'd': 
                array_push($this->dataArr,(double)$value); 
                break; 
            default: 
                array_push($this->dataArr,$value); 
                break; 
        } 
    } 
    /** 
     * ataArr dizisini boşaltır 
     * 
     * @return void 
     */ 
    protected function flush() 
    { 
        array_splice($this->dataArr,0); 
    } 
    /** 
     * construct methodu set eder. 
     * DB,result ve criteria set eder 
     * 
     * @param Array $criteria 
     */ 
    protected function setConstruct(&$criteria) 
    { 
        $this->DB =& Loader::loadClass('db'); 
        $this->result =& Loader::loadClass('dbResult'); 
        $this->criteria =& $criteria;         
    } 
} 
?>
