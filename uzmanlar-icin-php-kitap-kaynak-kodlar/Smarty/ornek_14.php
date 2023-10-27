<?php 
/** 
 * interface arayüzü 
 * 
 */ 
interface dbInterface{ 
    /** 
     * select metodu 
     * 
     * @param object $res 
     * @param string $query 
     * @param array $dataArr 
     * @param boolean $trigger 
     */ 
    public function select(&$res,$query,$dataArr=array(),$trigger=true); 
    /** 
     * insert metoru 
     * 
     * @param string $query 
     * @param array $dataArr 
     * @param boolean $trigger 
     */ 
    public function insert($query,$dataArr=array(),$trigger=true); 
    /** 
     * update metodu 
     * 
     * @param string $query 
     * @param array $dataArr 
     * @param boolean $trigger 
     */ 
    public function update($query,$dataArr=array(),$trigger=true); 
    /** 
     * delete metodu 
     * 
     * @param string $query 
     * @param array $dataArr 
     * @param boolean $trigger 
     */ 
    public function delete($query,$dataArr=array(),$trigger=true); 
    /** 
     * transaction başlatan metod 
     * 
     * @param boolean $autocommit 
     */ 
    public function startTransaction($autocommit=false); 
    /** 
     * commit 
     * 
     */ 
    public function commit(); 
    /** 
     * rollback 
     * 
     */ 
    public function rollback(); 
    /** 
     * kayıt id'si 
     * 
     */ 
    public function last_Id(); 
} 
/** 
 * MySQL için genel db.class 
 * 
 * @author Mehmet Şamlı 
 */ 
class db implements dbInterface { 
    /** 
     * Kaç satırda işlem yaptığını return eder 
     * 
     * @var integer 
     */ 
    public $affected_rows; 
    /** 
     * MySQL'e yapılan bağlantı sabiti 
     * 
     * @var obje 
     */ 
    public $mysqli; 
    /** 
     * debug ekranı 
     * 
     * @var boolean 
     */ 
    public $debug=false; 
    /** 
     * state alanı 
     * 
     * @var boolean 
     */ 
    protected $db_state=true; 
    /** 
     * error_no 
     * 
     * @var integer 
     */ 
    protected $current_err_no; 
    /** 
     * bağlantı durumu 
     * 
     * @var boolean 
     */ 
    private $connection; 
    /** 
     * stmt object 
     * 
     * @var object 
     */ 
    private $stmt; 
     
    const EMPTY_RESULT=3; 
     
    const SQL_SYNTAX_ERROR=4; 
     
    /** 
     * class'ın construct'ı 
     * 
     * @param string $host 
     * @param integer $port 
     * @param string $user 
     * @param string $pass 
     * @param string $db 
     * @param string $character 
     */ 
    public function __construct() { 
        try { 
            $this->mysqli = new mysqli(db_host, db_user, db_pass,db_dbName,db_port); 
            $this->mysqli->set_charset(db_character ); 
            $this->connection=true; 
            $this->db_state=true; 
        } catch(SQLException $error){ 
            $this->connection=false; 
            $this->db_state=false; 
            $this->current_err_no=2; 
            trigger_error($error->getMessage(),E_USER_WARNING ); 
        } 
    } 
    /** 
     * Array'ı boşaltan method 
     * 
     * @param boolean $resource 
     * @return boolean 
     */ 
    public function empty_results(&$resource) { 
        if ($resource != null) { 
            try { 
                if (isset($resource->dataArr) && is_array($resource->dataArr )) 
                    array_splice($resource->dataArr,0,$resource->num_rows); 
                $resource->num_rows=0; 
                $resource->dataArr=null; 
                $resource->dataArr=array(); 
                $this->affected_rows=0; 
                unset($resource ); 
                return true; 
            } catch(SQLException $error){ 
                trigger_error($error->getMessage(),E_USER_NOTICE ); 
                return false; 
            } 
        } 
        return false; 
    } 
     
    /** 
     * Data tipini belirler 
     * 
     * @param string|integer|double|blob $data 
     * @return string s|i|d|b 
     */ 
    private function getDataType($data) { 
        if (is_string($data )) 
            $type='s'; 
        elseif (is_integer($data )) 
            $type='i'; 
        elseif (is_double($data )) 
            $type='d'; 
        else 
            $type='b'; 
        return $type; 
    } 
    /** 
     * dataSet'ini belirleyen method 
     * 
     * @param Array $dataArr 
     * @return array|boolean 
     */ 
    private function setDataType($dataArr) { 
        if (is_array($dataArr )) { 
            $count=count($dataArr ); 
            $dataType=$data=''; 
            for($i=0; $i < $count; $i ++) { 
                $dataType .= self::getDataType($dataArr [$i] ); 
                $data .= '$dataArr[' . $i . '],'; 
            } 
            return array ($dataType,setComma($data)); 
        } else { 
            trigger_error('Array değil',E_USER_ERROR ); 
            return false; 
        } 
    } 
    /** 
     * query işlemini yapan method. 
     * Sadece db.class içerisinden çağrılabilir. 
     * 
     * @param string $query 
     * @param boolean $trigger 
     * @param boolean $use_result "select'lerde MYSQLI_USE_RESULT ekler" 
     * @return boolean 
     */ 
    protected function &execute($query,$trigger,$use_result=false) { 
        try { 
            if ($trigger == false) { 
                if ($use_result) 
                    if (! $result=& $this->mysqli->query($this->mysqli,$query,MYSQLI_USE_RESULT )) 
                    { 
                        throw new SQLException("<b><br>$query<br></b>" ); 
                    } 
                    else if (! $result=& $this->mysqli->query($query )){ 
                        throw new SQLException("<b><br>$query<br></b>" ); 
                    } 
            } else { 
                if ($use_result) 
                    $result=& $this->mysqli->query($this->mysqli,$query,MYSQLI_USE_RESULT ); 
                else 
                    $result=& $this->mysqli->query($query );             
            } 
            $this->affected_rows=$this->mysqli->affected_rows; 
            return $result; 
        } catch(SQLException $erro){ 
            trigger_error($erro->getMessage(),E_USER_WARNING ); 
        } 
        return false; 
    } 
    /** 
     * stmt ile query oluşturur 
     * 
     * @param Array $res result Array 
     * @param string $query SQL 
     * @param Array $dataArr data array 
     * @return void 
     */ 
    private function stmtSelect($res,$query,$dataArr) { 
        $this->stmt=&  $this->mysqli->stmt_init();  
        try { 
            if ($this->stmt->prepare($query )) { 
                $result=& $this->stmt->result_metadata(); 
                $fieldArr=array(); 
                $_dataArr=array(); 
                $data=''; 
                while($finfo=$result->fetch_field()){ 
                    array_push($fieldArr,$finfo->name); 
                    $data .= '$_dataArr[],'; 
                } 
                $result->close(); 
                $dataTypeArr=self::setDataType($dataArr ); 
                @eval("\$this->stmt->bind_param(\$dataTypeArr[0]".",".$dataTypeArr[1].");"); 
                $data=setComma($data ); 
                $this->stmt->execute(); 
                 
                @eval("\$this->stmt->bind_result($data);" ); 
                $this->stmt->store_result(); 
                $res->num_rows=$this->stmt->num_rows; 
                $ii=0; 
                $len=$this->stmt->field_count; 
                while($this->stmt->fetch()){ 
                    if (is_array($dataArr )) { 
                        for($i=0; $i < $len; $i ++) 
                            $res->dataArr [$ii] [$fieldArr [$i]]=$_dataArr[$i]; 
                    } 
                    $ii ++; 
                } 
                $this->db_state=true; 
            } 
            else  
            { 
                echo "<!-- {$query} -->"; 
            } 
        } catch(SQLException $error){ 
             
            trigger_error($error->getMessage(),E_USER_ERROR ); 
        } 
    } 
    /** 
     * select işlemini yapar. 
     * tüm class ve harici dosyalar tarafından çağrılabilir. 
     * 
     * @param boolean $res result object 
     * @param string $query sql 
     * @param boolean $trigger  
     * @return boolean 
     */ 
    public function select(&$res,$query,$dataArr=array(),$trigger=true) { 
        self::empty_results($res ); 
        if ($this->debug) { 
            array_push($this->debugQuery,$query ); 
        } 
        try { 
            if (count($dataArr)>0) { 
                self::stmtSelect($res,$query,$dataArr ); 
                return true; 
            } 
            $result=& self::execute($query,$trigger ); 
             
            @$num=$result->num_rows; 
            if ($num > 0) { 
                $res->num_rows=$num; 
                for($i=0; $i < $res->num_rows; $i ++) { 
                    $dataArr=$result->fetch_assoc(); 
                    if (is_array($dataArr )) { 
                        foreach($dataArr as $name => $value ) 
                            $res->dataArr [$i] [$name]=$value; 
                    } 
                } 
                $this->db_state=true; 
                $result->close(); 
                return true; 
            } else { 
                $this->db_state=true; 
                $this->current_err_no=self::EMPTY_RESULT; 
                return false; 
            } 
        } catch(SQLException $error){ 
            if ($trigger) 
                trigger_error($this->mysqli->error."$query".$error->getMessage(),E_USER_WARNING ); 
            $this->db_state=false; 
            $this->current_err_no=self::SQL_SYNTAX_ERROR; 
        } 
        return false; 
    } 
    /** 
     * insert işlemini yapan method 
     * 
     * @param string $query 
     * @param Array $dataArr 
     * @param boolean $trigger 
     * @return boolean 
     */ 
    public function insert($query,$dataArr=array(),$trigger=true) { 
        if ($this->debug) 
            array_push($this->debugQuery,$query ); 
        if (count($dataArr)==0) { 
            self::execute($query,$trigger ); 
            return true; 
        } 
        try { 
            $this->stmt=& $this->mysqli->prepare($query ); 
            $dataTypeArr=self::setDataType($dataArr ); 
            eval("\$this->stmt->bind_param(\$dataTypeArr[0]".",".$dataTypeArr[1].");"); 
            if ($this->stmt->execute()) 
            { 
                $this->affected_rows=$this->mysqli->affected_rows; 
                $this->db_state=true; 
                return true; 
            } 
            else  
            { 
                throw new SQLException('Execute yapılamadı'); 
            } 
        } catch(SQLException $error){ 
            $this->db_state=false; 
            $this->current_err_no=self::SQL_SYNTAX_ERROR; 
            trigger_error($error->getMessage() . "<!-- $query -->",E_USER_WARNING ); 
        } 
        return false; 
    } 
    /** 
     * update işlemini yapan method 
     * 
     * @param string $query 
     * @param Array $dataArr 
     * @return boolean 
     */ 
    public function update($query,$dataArr=array(),$trigger=true) { 
        if ($this->debug) 
            array_push($this->debugQuery,$query ); 
        if (count($dataArr)== 0) { 
            self::execute($query,$trigger ); 
            return true; 
        } 
        try { 
            $this->stmt=& $this->mysqli->prepare($query ); 
            $dataTypeArr=self::setDataType($dataArr ); 
            @eval("\$this->stmt->bind_param(\$dataTypeArr[0]".",".$dataTypeArr[1].");"); 
            $this->stmt->execute(); 
            $this->affected_rows=$this->mysqli->affected_rows; 
            $this->db_state=true; 
            return true; 
        } catch(SQLException $error){ 
            $this->db_state=false; 
            $this->current_err_no=self::SQL_SYNTAX_ERROR; 
            trigger_error($error->getMessage(),E_USER_WARNING ); 
        } 
        return false; 
    } 
    /** 
     * delete işlemini yapan method 
     * 
     * @param string $query 
     * @param Array $dataArr 
     * @param boolean $trigger 
     * @return boolean 
     */ 
    public function delete($query,$dataArr=array(),$trigger=true) { 
        if ($this->debug) 
            array_push($this->debugQuery,$query ); 
        if (count($dataArr)== 0) { 
            self::execute($query,$trigger ); 
            return true; 
        } 
        try { 
            $this->stmt=& $this->mysqli->prepare($query ); 
            $dataTypeArr=self::setDataType($dataArr ); 
            eval("\$this->stmt->bind_param(\$dataTypeArr[0]".",".$dataTypeArr[1].");"); 
            $this->stmt->execute(); 
            $this->affected_rows=$this->mysqli->affected_rows; 
            $this->db_state=true; 
            return true; 
        } catch(SQLException $error){ 
            $this->db_state=false; 
            $this->current_err_no=self::SQL_SYNTAX_ERROR; 
            trigger_error($error->getMessage(),E_USER_WARNING ); 
        } 
        return false; 
    } 
    /** 
     * insert yapılan Id'yi verir 
     * tüm class ve harici dosyalar tarafından çağrılabilir. 
     * 
     * @return integer 
     */ 
    public function last_id() { 
        return $this->mysqli->insert_id; 
    } 
    /** 
     * transaction oluşturur 
     * tüm class ve harici dosyalar tarafından çağrılabilir. 
     * 
     * @param boolean $autocommit 
     * @return boolean 
     */ 
    public function startTransaction($autocommit=false) { 
        try { 
            $this->mysqli->autocommit( $autocommit ); 
            return true; 
        } catch(SQLException $error){ 
            trigger_error($error->getMessage(),E_USER_ERROR); 
        } 
        return false; 
    } 
    /** 
     * oluşan transaction için commit yapar 
     * tüm class ve harici dosyalar tarafından çağrılabilir. 
     * 
     * @return void 
     */ 
    public function commit() { 
        try { 
            $this->mysqli->commit(); 
        } catch(SQLException $error){ 
            trigger_error($error->getMessage(),E_USER_ERROR ); 
        } 
    } 
    /** 
     * oluşan transaction'u geri alır 
     * tüm class ve harici dosyalar tarafından çağrılabilir. 
     * 
     * @return void 
     */ 
    public function rollback() { 
        try { 
            $this->mysqli->rollback(); 
        } catch(SQLException $error){ 
            trigger_error($error->getMessage(),E_USER_ERROR ); 
        } 
    } 
    /** 
     * işlem bittiğinde bağlantı kopartılır 
     * tüm class ve harici dosyalar tarafından çağrılabilir. 
     * 
     * @param void 
     */ 
    public function __destruct() { 
        try { 
            if (is_resource($this->mysqli )) 
                $this->mysqli->close(); 
        } catch(SQLException $error){ 
            trigger_error($error->getMessage(),E_USER_ERROR ); 
        } 
    } 
    /** 
     * Bilinmeyen method 
     * tüm class ve harici dosyalar tarafından çağrılabilir. 
     * 
     * @return boolean 
     */ 
    public function __clone() { 
        trigger_error('Bilinmeyen bir method',E_USER_ERROR ); 
        return false; 
    } 
    /** 
     * obje'yi echo veya print ettiğimizde çağrılan toString fonskiyonu 
     * 
     * @return boolean 
     */ 
    public function __toString() { 
        trigger_error('Obje direk echo yapılamaz',E_USER_ERROR ); 
        return false; 
    } 
    /** 
     * mysql info bilgilerini verir. 
     * tüm class ve harici dosyalar tarafından çağrılabilir. 
     * 
     * @return string 
     */ 
    public function stat() { 
        return $this->mysqli->stat(); 
    } 
    /** 
     * error message 
     *  
     * @return string 
     */ 
    public function errorMessage() { 
        return mysqli_stmt_error($this->stmt ); 
    } 
} 
?>