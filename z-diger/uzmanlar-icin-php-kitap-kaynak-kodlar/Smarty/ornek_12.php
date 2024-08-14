<?php 
/** 
 * site içerisinde ki tüm session işlemlerini yürüten class 
 * 
 * @author Mehmet Şamlı 
 */ 
class session 
{ 
    /** 
     * class version 
     * 
     */ 
    const VERSION = 1.0; 
    /** 
     * session name 
     * 
     */ 
    const SESSION_NAME = 'JSESSIONID'; 
    /** 
     * class'ın ana construct'ı 
     * Bu alanda session name belirtilip session start edilir 
     * 
     * @return void 
     */ 
    public static function set() 
    { 
        self::setSessionName(); 
        self::startSesssion(); 
    } 
    /** 
     * session işlemini açar 
     * 
     * @return void 
     */ 
    private function startSesssion() 
    { 
        session_start(); 
    } 
    /** 
     * session name set eder 
     * construct metodunda çağrılır 
     * 
     * @return void 
     */ 
    private function setSessionName() 
    { 
        session_name(self::SESSION_NAME); 
    } 
    /** 
     * session atan method. Session için array olarak giden parametredeki  
     * tüm değerleri session olarak atar 
     * array('name','value') 
     * 
     * @param Array $sessionArr 
     * @return boolean 
     */ 
    public static function createSession($sessionArr) 
    { 
        if ( is_array($sessionArr) ) 
        { 
            $count = count($sessionArr); 
            if ($count%2==0) 
            { 
                $i=0; 
                while ($i<$count) 
                { 
                    $_SESSION[$sessionArr[$i]] = $sessionArr[$i+1]; 
                    $i+=2; 
                } 
                return true; 
            }             
        } 
        return false; 
    } 
    /** 
     * session işlemlerini sonlandırmak için kullanılan method 
     * tek tek session'ları array olarak göndererek de silebildiği gibi 
     * $all parametresini true olarak göndererek tüm session'ları silebilir 
     * 
     * @param array $sessionArr array('fname','lname') 
     * @param boolean $all 
     * @return boolean 
     */ 
    public static function deleteSession($sessionArr,$all=false) 
    { 
        /** 
         * tüm session'ları siler 
         */ 
        ######################### 
        if ($all) 
        { 
            session_destroy(); 
            return true; 
        } 
        ######################### 

        /** 
         * dizi olarak gelen session'ları siler 
         */ 
        ##################################### 
        if (is_array($sessionArr)) 
        { 
            $count = count($sessionArr); 
            $i=0; 
            while ($i<$count) 
            { 
                unset($_SESSION[$sessionArr[$i]]); 
                session_unregister($sessionArr[$i]); 
                $i++; 
            } 
            return true; 
        } 
        return false; 
        ##################################### 
    } 
    /** 
     * session id'sini veren method 
     * $reGenerate parametresi true olarak gönderilirse  
     * session_id yi yeniden düzenleyerek response eder 
     *  
     * @param boolean $reGenerate 
     * @return string 
     */ 
    public function getSessionId($reGenerate=false) 
    { 
        if ($reGenerate) 
            session_regenerate_id(); 
        return session_id(); 
    } 
    /** 
     * session bilgisini get eder 
     * 
     * @param string $name 
     * @return string 
     */ 
    public static function getSession($name) 
    { 
        return request($name,'SESSION'); 
    } 
    /** 
     * session olup olmadığını test eder 
     * 
     * @param string $sessionName 
     * @return boolean 
     */ 
    public function sessionVariable($sessionName) 
    { 
        if ( session_is_registered($sessionName) ) 
            return true; 
        else 
            return false; 
    } 
    /** 
     * session datasının hangi dizinde olduğunu get eder 
     * 
     * @return string 
     */ 
    public static function getSessionPath() 
    { 
        return session_save_path(); 
    } 
    /** 
     * destruct method 
     * 
     * @return void 
     */ 
    public function __destruct() 
    { 
    } 
} 
?>
