<?php 
/**
 * user işlemlerini yürüten class
 *
 * @author Mehmet Şamlı
 */
class userRegister extends userError implements userRegister_leyout  
{
    /**
     * Boş olmaması gereken alanlar
     *
     * @var Array
     */
    protected $validatorList = array();
    /**
     * class içerisinde olşacak muhtemel hataları bu sabit ile yazdırıyoruz.
     *
     * @var string
     */
    protected $errorMessage;
    /**
     * smarty obje'si bu sabite dışarıdan obje olarak atanır.
     * mail header ve footer template'lerini include etmek için kullanılır
     *
     * @var object
     */
    private $SMARTY;
    /**
     * partnerin kendi havuzundamı yoksa tüm havuzdamı işlem yapacağını belirtir
     *
     * @var boolean
     */
    private $global;
    /**
     * class'ın genel construct methodu
     *
     * @param object $DB
     * @param array $criteria
     * @return void
     */
    public function __construct(&$criteria)
    {
        $this->DB =& Loader::loadClass('db');
        $this->criteria =& stripslashes_deep($criteria);
        $this->result =& Loader::loadClass('dbResult');
        parent::__construct();
    }
    /**
     * smarty objesini set eder
     *
     * @param Smarty $smarty
     */
    public function setSmarty(&$smarty)
    {
        $this->SMARTY =& $smarty;
    }
    /**
     * değişkenleri validate eder
     *
     * @param string $type
     * @return boolean
     */
    private function validation($type)
    {
        if ( $type =='userInser' )
        {            
            if(!self::isEmail($this->criteria['mail']))
            {
                self::setError(3);            
                return false;
            }
            elseif ( strlen($this->criteria['password'])<6 )
            {
                self::setError(7);
                return false;
            }
            elseif ( session::getSession('security_code') != (string)md5(session_id().$this->criteria['security_code']) )
            {
                self::setError(6);
                session_unregister('security_code');
                return false;
            }
            session::deleteSession(array('security_code'));
        }
        return true;
    }
    /**
     * mail doğru olup olmadığını test eder
     *
     * @param string $email
     * @return boolean
     */
    private function isEmail($email)
    {
        if(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email))
            return true;
        return false;    
    }
    /**
     * new User and edit user
     *
     * @return boolean
     */
    public function setUser()
    {
        # edit user
        if ( session::getSession('user_id') > 0 )
        {
            if ( ! self::validation('userUpdate') )
            {
                return false;
            }
            else 
            {                
                self::setUpdateUser();
                return true;
            }            
        }
        # insert user
        else 
        {
            if ( ! self::validation('userInser') )
            {
                return false;
            }
            else 
            {            
                if ( self::getUserUnique('mail',$this->criteria['mail']) > 0 )
                {
                    self::setError(0);
                    return false;
                }
                else
                {
                    self::setInserUser();
                    return true;
                }
            }
        }
    }
    /**
     * New user register
     *
     * @return boolean
     */
    private function setInserUser()
    {
        $birtDate = sprintf('%s-%s-%s',$this->criteria['year'],$this->criteria['month'],$this->criteria['day']);
        #####################################################
        $location_idArr = self::getLocationId(); 
        
        
        $user_id = self::setUserId();
        if($this->criteria['user_type_id']=="3")
            $status = 1;
        else 
            $status = 2;
        
        $this->sql = 'INSERT INTO user (id,username,fname,lname,gender,location_id,mail,password,regDate,birthDay,status) VALUES (?,?,?,?,?,?,?,MD5(?),NOW(),?,?)';
        parent::push($user_id,'i');
        parent::push($this->criteria['username']);
        parent::push($this->criteria['fname']);
        parent::push($this->criteria['lname']);
        parent::push($this->criteria['gender']);
        parent::push($location_idArr[0]);
        parent::push($this->criteria['mail']);
        parent::push($this->criteria['password']);
        parent::push($birtDate);
        parent::push($status,'i');
        #####################################################
        try 
        {
            $this->DB->insert($this->sql,$this->dataArr);
            parent::flush();            
            if($status == 2)
            {
                self::setOnline($user_id);                
                $sessionArr = array(
                                    'user_id',$user_id,
                                    'fullName',$this->criteria['username'],                                
                                    'mail',$this->criteria['mail'],
                                    'user_type_id',0,                                
                                    'gender',$this->criteria['gender']
                                   );
                session::createSession($sessionArr);
                // diğer işlemler    
            }
            return true;            
        }
        catch (Exception $error)
        {
            self::setError(4);
            trigger_error($error->getMessage(),E_USER_NOTICE);
        }
        return false;
    }
    /**
     * seçili olan aktif location id get eder
     *
     * @return integer
     */
    private function getLocationId($birth=null)
    {
        if(array_key_exists($birth.'district_id',$this->criteria))
        {
            $this->sql = "SELECT CONCAT(id,',',locationName) AS locationName FROM location WHERE id=?";
            try {
                parent::push($this->criteria[$birth.'district_id']);
                $this->DB->select($this->result,$this->sql,$this->dataArr);
                parent::flush();
                return array($this->criteria[$birth.'district_id'],$this->result->dataArr[0]['locationName']);
            }
            catch (Exception $error){
                trigger_error($error->getMessage(),E_USER_ERROR);
            }            
        }            
        if(array_key_exists($birth.'city_id',$this->criteria))
        {
            $this->sql = "select CONCAT(id,',',locationName) AS locationName FROM location WHERE id=?";
            try {
                parent::push($this->criteria[$birth.'city_id']);
                $this->DB->select($this->result,$this->sql,$this->dataArr);
                parent::flush();
                return array($this->criteria[$birth.'city_id'],$this->result->dataArr[0]['locationName']);
            }
            catch (Exception $error){
                trigger_error($error->getMessage(),E_USER_ERROR);
            }
        }    
        if(array_key_exists($birth.'country_id',$this->criteria))
        {
            $this->sql = "select CONCAT(id,',',locationName) AS locationName FROM location WHERE id=?";
            try {
                parent::push($this->criteria[$birth.'country_id']);
                $this->DB->select($this->result,$this->sql,$this->dataArr);
                parent::flush();
                return array($this->criteria[$birth.'country_id'],$this->result->dataArr[0]['locationName']);
            }
            catch (Exception $error){
                trigger_error($error->getMessage(),E_USER_ERROR);
            }
        }
        return false;
    }

    /**
     * error message set eder
     *
     * @param integer $error_id
     * @return void
     */
    final private function setError($error_id)
    {
        if (array_key_exists($error_id,$this->error))
            $this->errorMessage = $this->error[$error_id];
        else 
            trigger_error('bilinmeyen bir error mesajı',E_USER_ERROR);
    }
    /**
     * edit user
     *
     * @return boolean
     */
    private function setUpdateUser()
    {
        $user_id = (int)session::getSession('user_id');
        try 
        {
            if ( $this->criteria['password'] != '' )
                $password = ", password=MD5('".addslashes($this->criteria['password'])."')";
            $location_idArr = self::getLocationId();
            
            $this->sql = 'UPDATE user SET fname=?,lname=?,location_id=? '.$password.' WHERE id=?';

            parent::push($this->criteria['fname']);
            parent::push($this->criteria['lname']);
            parent::push($location_idArr[0]);
            parent::push($user_id,'i');
            $this->DB->update($this->sql,$this->dataArr);
            parent::flush();        
            return true;            
        }
        catch (Exception $error)
        {
            $this->errorMessage = $this->error[5];    
            trigger_error($error->getMessage(),E_USER_NOTICE);
        }
        return false;    
    }
    /**
     * unique olan alanları get eder
     *
     * @param string $type
     * @param string $value
     * @return boolean
     */
    public function getUserUnique($type,$value)
    {
        if ( $type != 'username' && $type != 'mail' )
            return false;
        $this->sql = "SELECT COUNT(1) AS total FROM user WHERE {$type}=? AND partner_id=?";
        try 
        {
            parent::push($value);
            parent::push($this->partner_id,'i');
            $this->DB->select($this->result,$this->sql,$this->dataArr);
            parent::flush();
            return $this->result->dataArr[0]['total'];
        }
        catch (Exception $error)
        {
            trigger_error($error->getMessage(),E_USER_ERROR);
        }
        return false;
    }
    /**
     * login işlemini yapan method
     *
     * @return boolean
     */
    public function loginControl()
    {
        $this->sql = 'SELECT * FROM user WHERE mail=? AND password=MD5(?) AND status=2';
        try 
        {
            parent::push($this->criteria['mail']);
            parent::push($this->criteria['password']);
            $this->DB->select($this->result,$this->sql,$this->dataArr);    
            parent::flush();
        }
        catch (Exception $error)
        {
            trigger_error($error->getMessage(),E_USER_ERROR);
            return false;
        }
        if ( $this->result->num_rows == 0 )
        {
            self::setError(10);
            return false;
        }
        elseif ( $this->result->num_rows == 1 )
        {
            $sessionArr = array(
                                'mail',$this->result->dataArr[0]['mail'],
                                'user_id',$this->result->dataArr[0]['id'],
                                'user_type_id',$this->result->dataArr[0]['user_type_id'],                                
                                'gender',$this->result->dataArr[0]['gender'],                                
                                'fullName',$this->result->dataArr[0]['fullName']//,
                                );
            if($this->result->dataArr[0]['isAdmin']==1)
                $sessionArr = array_merge($sessionArr,array('isAdmin',1));            
            session::createSession($sessionArr);
            // loglama yapılır            
            return true;
        }
        else 
        {
            trigger_error('Birden çok kayıt',E_USER_NOTICE);
        }
        return false;
    }
    /**
     * logout işlemini yapan method
     *
     * @param object $DB
     * @return void
     */
    public static function logout(&$DB)
    {
        session::deleteSession(array(),true);
        header_destruct($DB,HTTP_URL.'/');
    }
    /**
     * username'ı get eder
     *
     * @param integer $from_user_id
     * @param integer $to_user_id
     * @return string
     */
    public function getUserName(&$DB,$from_user_id,$to_user_id)
    {
        if($from_user_id==$to_user_id)
            return false;        
        $this->sql = "SELECT fullName(user.username,user.fname,user.lname) AS fullName FROM user WHERE id=? AND status=2";
        try 
        {
            $result= new dbResult();
            $DB->select($result,$this->sql,array($to_user_id));
            if ( $result->num_rows == 1 )
                return $result->dataArr[0]['fullName'];
        }
        catch (Exception $error)
        {
            trigger_error($error->getMessage(),E_USER_ERROR);
        }
        return false;
    }
    /**
     * user olup olmadığını get eder
     *
     * @param object $DB
     * @param integer $user_id
     * @return boolean
     */
    public function getUserVariable(&$DB,$user_id)
    {
        $sql = 'SELECT id FROM user WHERE id=?';
        try 
        {
            $result = new dbResult();
            $DB->select($result,$sql,array($user_id));
            if($result->num_rows == 0)
                return false;
            else 
                return true;
        }
        catch (Exception $error)
        {
            trigger_error($error->getMessage(),E_USER_ERROR);
        }
        return false;
    }
    /**
     * class içerisinde oluşan error message'larını get eder
     *
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }
    /**
     * sayfalarda login kontrol yapar
     *
     * @param Object $DB
     * @return boolean
     */
    public function login(&$DB)
    {
        if((int)session::getSession('user_id')>0)
            return true;
        $dataArr = array('goUrl',base64_encode($_SERVER['REQUEST_URI']));
        session::createSession($dataArr);
        header_destruct($DB,url('login').'&go=1');
        return false;
    }
    /**
     * user detay bilgilerini get eder
     *
     * @return object
     */
    public function &getUserDetail($user_id=0)
    {
        $this->sql = 'SELECT username,fname,lname,gender,mail,location_id,birth_location_id,user_type_id,status FROM user WHERE id=?';
        try 
        {
            if($user_id==0)
                $dataArr = array((int)$GLOBALS['user_id']);
            else
                $dataArr = array($user_id);
            $this->DB->select($this->result,$this->sql,$dataArr);
            return $this->result;            
        }
        catch (Exception $error)
        {
            trigger_error($error->getMessage(),E_USER_ERROR);
        }
        return false;
    }
    /**
     * login olup olmadığına bakar
     *
     * @param integer $type_id
     * @param string $message
     * @param string $messageHeader
     */
    public static function loginVariable($type_id,$message,$messageHeader)
    {
        $user_id = (int)session::getSession('user_id');
        if($user_id==0)
        {
            // hata mesajı set edilir
            pageSetMessage($type_id,$message,$messageHeader);
            header_destruct('/login');
        }
    }
}
?>