<?php 
/** 
 * payment işlemini yürüten class 
 *  
 * @author Mehmet Şamlı 
 */ 
class payment_management  
{ 
    /** 
     * DB objesi 
     * 
     * @var DB 
     */ 
    private $DB; 
    /** 
     * payment.class object 
     * 
     * @var object 
     */ 
    private $PAYMENT; 
    /** 
     * result objesi 
     * 
     * @var result 
     */ 
    private $result; 
    /** 
     * payment_session_id 
     * 
     * @var payment_session_id 
     */ 
    public $payment_session_id; 
    /** 
     * payment_transaction_id 
     * 
     * @var payment_transaction_id 
     */ 
    var $payment_transaction_type_id; 
    /** 
     * class'a aktarılan POST veya GET data 
     * 
     * @var unknown_type 
     */ 
    public $criteria; 
    /** 
     * user_id 
     * 
     * @var user_id 
     */ 
    private $user_id; 
    /** 
     * Oluşacak herhangi bir hata bu değişken aracılığıyla basılacaktır 
     * 
     * @var unknown_type 
     */ 
    public $errorMessage; 
    /** 
     * Oluşacak muhtemel hataların kodları 
     * 
     * @var unknown_type 
     */ 
    public $errorNo; 
    /** 
     * Class içerisinde sabait değerler bu arrayda tutulur. 
     * 
     * @var unknown_type 
     */ 
    private $parameter = array(); 
    /** 
     * ödeme tipi 
     * 
     * @var status 
     */ 
    private $status; 
    /** 
     * Taksit için çekim yapılacak banka ID'si 
     * 
     * @var bankAccount_id 
     */ 
    private $bankAccount_id; 
    /** 
     * Kullanıcı ismi 
     * 
     * @var user_name 
     */ 
    public $user_name; 
    /** 
     * smarty object 
     * 
     * @var object 
     */ 
    public $SMARTY; 

     
    /** 
     * Class'ın ama çalışma methodu 
     * 
     * @param DBobject $DB 
     * @param postData $criteria 
     * @param user_id $user_id 
     * @return payment_management 
     */ 
    public function __construct( &$criteria, $user_id,$session=true ) 
    { 
        $this->DB =& Loader::loaderClass('db'); 
        $this->criteria = & $criteria; 
        $this->user_id = $user_id; 
        $this->result = new dbResult();             
        $this->PAYMENT = new payment($DB); 
        $this->bankAccount_id = $this->criteria['bankAccount_id']; 
        $this->payment_transaction_type_id = $this->criteria['payment_transaction_type']; 
        if ($session == true) 
            $this->payment_session_id  = $this->PAYMENT->paymentSession(); 
    } 
    /** 
     * Class içerisinde oluşan hataları set eder. 
     * 
     * @param errorMessage $errorId 
     */ 
    private function setErrorMessage($errorId) 
    { 
        $errorManagement = new errorManagement(); 
        $errorManagement->setErrorMessage($errorId); 
        $this->errorMessage = $errorManagement->getErrorMessage(); 
    } 
    /** 
     * Tüm ödemeler bu method tarafından yapılacaktır. 
     * Class'ın diğer methodları bu methodu çağırarak  
     * ödemeler gerçekleşecek 
     * 
     * @param ödeme_şekli $transaction_type_id 
     * @param parametrik_status $status 
     * @return true_false 
     */ 
    public function setPayment($transaction_type_id,$status=null) 
    { 
        if ($this->payment_session_id=='' || $this->payment_session_id==0)  
        { 
            trigger_error("payment update te payment sesion id boş geliyor.". $this->payment_session_id,E_USER_ERROR); 
        } 
        /** 
         * form kontrol yap 
         */ 
        $paymentResult = array(); 
        $amount = self::getPaymentTotal(); 
        $price = $amount;         
         
        switch ($transaction_type_id) 
        { 
            # Kredi kartı işlemleri 
            case 200: 
            case 202: 
                if ( $status != null ) 
                { 
                    $this->status = $status; 
                    $mode = 'Credit'; 
                } 
                else  
                { 
                    $this->status = 2; 
                    $mode = 'Auth'; 
                } 
                $vposCount = 1; 
                /** 
                 * Eğer banka ID'si yoksa tek çekim 
                 */ 
                if ( $this->criteria['term_id'] > 0 && $this->bankAccount_id != '' ) 
                { 
                    $termTotalArr     = self::getTermTotal($this->criteria['term_id'],$amount); 
                    $amount         = str_replace(',','',$termTotalArr['totalAmount']); 
                    $term           = $termTotalArr['term']; 
                    $vposCount         = 2; 
                } 
                $paymentResult = array(); 
                $paymentResult = self::setPaymentCreditCard($amount,$term,$vposCount,$mode); 
                break; 
            default: 
                trigger_error('Bilinmeyen bir ödeme tipi.<b>'.$transaction_type_id.'</b>',E_USER_WARNING); 
                return false; 
                break; 
        } 

        if( $paymentResult[0] == 1 ) 
        {               
            self::setPaymentInsert($price,$amount,$transaction_type_id,$user_info_id,$status,$term);                                 
            return true; 
        } 
        else  
        { 
            $this->errorMessage = $this->PAYMENT->reasonBank[1]["M"][$paymentResult[0]]; 
            return false; 
        } 
    } 
    /** 
     * Alım yapılan toplam tutar. 
     * Kredi kartıyla işlem yaparken 
     * bu alanda çekilecek tutarı yeniden hesap edip 
     * o tutarı çekiyoruz. böylece art  
     * niyetli kişileri engelliyoruz 
     * 
     * @return integer 
     */ 
    private function getPaymentTotal() 
    { 
        return 100; 
    } 
    /** 
     * Tüm ödeme işlemlerinde payment ve payment_detail tablolarına kayıt yapar 
     * 
     * @param fiyat $price 
     * @param toplam_tutar $totalAmount 
     * @param ödeme_şekli $payment_transaction_type 
     * @param adres_id $user_info_id 
     * @param parametrik_status $status 
     * @return boolean 
     */ 
    private function setPaymentInsert($price,$totalAmount,$payment_transaction_type,$user_info_id,$status=null,$term_count) 
    { 
        /** 
         * backoffice işlemleri "tüm iptaller" 
         */ 
        if ( $status != null) 
        { 
            $sql = 'UPDATE  
                        payment  
                    INNER JOIN payment_detail ON(payment.payment_session_id=payment_detail.payment_session_id) 
                    SET 
                        payment.status=?, 
                        payment_detail.status=? 
                    WHERE 
                        payment.payment_session_id=?'; 
            $this->DB->update($sql,array($status,$status,$this->payment_session_id)); 
        } 
        else 
        { 
            $invoice_id = 0; 
            $delivery_id = 0;     
            $sql = 'INSERT INTO payment (partner_id,payment_session_id,user_id,user_info_invoice_id,user_info_delivery_id,price,total,regDate,term_count,status,term_price) 
                    VALUES(?,?,?,?,?,?,?,NOW(),?,?,total-price)'; 
            $dataArr = array(); 
            array_push($dataArr,request('partner_id','SESSION')); 
            array_push($dataArr,$this->payment_session_id); 
            array_push($dataArr,$this->user_id); 
            array_push($dataArr,$invoice_id); 
            array_push($dataArr,$delivery_id); 
            array_push($dataArr,$price); 
            array_push($dataArr,$totalAmount); 
            array_push($dataArr,$term_count); 
            array_push($dataArr,$this->status);             
            $this->DB->insert($sql,$dataArr); 
             
            $sql = 'INSERT INTO payment_detail (payment_session_id,transaction_type_id,price,total,regDate,status,bankAccount_id,term_count,term_price)  
            VALUES(?,?,?,?,NOW(),?,?,?,total-price)'; 
            $dataArr = array(); 
            array_push($dataArr,$this->payment_session_id); 
            array_push($dataArr,$payment_transaction_type); 
            array_push($dataArr,$price); 
            array_push($dataArr,$totalAmount); 
            array_push($dataArr,$this->status); 
            array_push($dataArr,$this->bankAccount_id); 
            array_push($dataArr,$term_count); 
            $this->DB->insert($sql,$dataArr); 
        } 
        return true; 
    } 
    /** 
     * Taksitli ödeme için tutarları verir. 
     * 
     * @param tarksitId $term_id 
     * @param amount $amount 
     * @return totalArr 
     */ 
    private function getTermTotal($term_id,$amount) 
    { 
        $sql = "SELECT bankAccount_id,term,rate,((1+rate)*$amount) AS totalAmount FROM bankRate WHERE id=?"; 
        $this->DB->select($this->result,$sql,array($term_id)); 
        if ( $this->result->num_rows == 1 ) 
        { 
            $totalArr['term']             = $this->result->dataArr[0]['term']; 
            $totalArr['bankAccount_id'] = $this->result->dataArr[0]['bankAccount_id']; 
            $totalArr['totalAmount']     = number_format($this->result->dataArr[0]['totalAmount'],2); 
            $totalArr['rate']            =  $this->result->dataArr[0]['rate']; 
            return $totalArr; 
        } 
        else  
        { 
            trigger_error('Taksit sisteminden kaynaklanan bir hata oluştu.Lütfen sonra yeniden deneyiniz!',E_USER_ERROR); 
            return false; 
        }         
    } 
    /** 
     * Curl ile banka ile iletişim kuran genel fonksiyon 
     * 
     * @param integer $amoun tutar 
     * @param integer $term vade 
     * @param integer $vposCount "tek çekim 1, taksit 2" 
     * @param string $mode çekimmi_iademi 
     * @return array 
     */ 
    private function setPaymentCreditCard($amount,$term=0,$vposCount=1,$mode="Auth") 
    { 
        //$card_no = $this->criteria['card_number_1'].$this->criteria['card_number_2'].$this->criteria['card_number_3'].$this->criteria['card_number_4']; 
        $card_no = $this->criteria['md']; 
        if ( $this->bankAccount_id =='') 
            $this->bankAccount_id = $this->PAYMENT->select_bankAccount(); 
         
        $return = array(); 
        $return = $this->PAYMENT->payment_curl($amount,$card_no,$this->criteria['card_month'],$this->criteria['card_cvv'],$this->criteria['card_year'],$this->criteria['card_holder_name'],$this->payment_session_id,$this->bankAccount_id,$term,$vposCount,$mode); 
        return $return; 
    }     
    /** 
     * Banka bilgilerini Array olarak listeler 
     * 
     * @return array 
     */ 
    public function getBankAccount() 
    { 
        $sql = 'SELECT id, bankName FROM bankAccount ORDER BY bankSort ASC'; 
        try  
        { 
            $this->DB->select($this->result,$sql); 
            return $this->result; 
        } 
        catch (Exception $error) 
        { 
            trigger_error($error->getMessage(),E_USER_ERROR); 
        } 
    } 
    /** 
     * Alım yapılan tutarın hangi bankadan ve hangi faiz oranıyla yapılacağını belirler 
     * 
     * @param taksitli alışverişler için banka ID'si $bankAccount_id 
     * @return taksit bilgileri Array olarak return yapar $returnArr 
     */ 
    public function getTermList($bankAccount_id,$totalAmount=null) 
    { 
        if ($totalAmount==null) 
        $totalAmount = self::getPaymentTotal(); 
         
        $sql =  "select COUNT(1) AS totalCount, 
(select count(1) from property_sale where  payment_session_id=?) AS totalProduct 
        FROM property_sale  
inner join product on(product.id=property_sale.product_id) 
WHERE  
payment_session_id=? AND product.max_rate=true"; 
        $this->DB->select($this->result,$sql,array($this->payment_session_id,$this->payment_session_id)); 
         
        if ( $_GET['s']=="1") 
            $sql = "SELECT id AS term_id, term, rate FROM bankRate WHERE bankAccount_id=?"; 
        elseif( $this->result->dataArr[0]['totalCount'] == 1 && $this->result->dataArr[0]['totalProduct'] == 1)     
            $sql = "SELECT id AS term_id, term, rate FROM bankRate WHERE bankAccount_id=?"; 
        else 
            $sql = "SELECT id AS term_id, term, rate FROM bankRate WHERE bankAccount_id=? AND max_rate=false"; 
         
        $this->DB->select($this->result,$sql,array($bankAccount_id)); 
        $returnArr[0]['tot']    = 'Toplam'; 
        $returnArr[0]['ins']    = 'Aylık ödeme'; 
        $returnArr[0]['term']    = 'Taksit sayısı'; 
        $returnArr[0]['term_id'] = ''; 
        $returnArr[0]['rate']    = 'Faiz'; 
        for ( $i=0; $i < $this->result->num_rows; $i++ ) 
        { 
            $j=$i+1; 
            $termPriceArr = array(); 
            $termPriceArr = self::setTermPrice($totalAmount,$this->result->dataArr[$i]['rate'],$this->result->dataArr[$i]['term']); 
             
            $returnArr[$j]['tot'] = $termPriceArr['total']; 
            $returnArr[$j]['ins'] = $termPriceArr['installment']; 
            $returnArr[$j]['term']    = $this->result->dataArr[$i]['term']; 
            $returnArr[$j]['term_id'] = $this->result->dataArr[$i]['term_id']; 
            $returnArr[$j]['rate']    = $this->result->dataArr[$i]['rate']; 
        } 
         
        return $returnArr;         
    } 
    /** 
     * Faiz oranlarıyla tutarın kaç para olduğunu belirtir 
     * 
     * @param tutar $amount 
     * @param faiz $termRate 
     * @param vade ay sayısı $termCount 
     */ 
    private function setTermPrice($amount,$termRate,$termCount) 
    { 
        $rateX = (1+$termRate); 
        $returnArr['total'] = number_format($amount*$rateX,2,".",""); 
        $returnArr['termPrice'] = $returnArr['total']-$amount; 
        $returnArr['installment'] = number_format($returnArr['total']/$termCount,2); 
        return $returnArr; 
    } 
    /** 
     * Taksit sisteminde banka değiştirmede bankAccount_id session olarak atar.  
     * Eğer sistemde kayıtsız bir banka varsa class errorMessage set eder 
     * 
     * @return true 
     */ 
    public function setBankAccount() 
    { 
        $sql = "SELECT COUNT(1) AS total FROM bankRate 
        INNER JOIN bankAccount ON (bankAccount.id=bankRate.bankAccount_id) 
        WHERE  
            bankRate.bankAccount_id='{$this->criteria['bank_id']}' AND  
            LENGTH(bankAccount.vposClientID) > 1 "; 
        $this->DB->select($this->result,$sql); 
        if ( $this->result->dataArr[0]['total'] > 0 ) 
            $_SESSION['bankAccount_id'] = $this->criteria['bank_id']; 
        else  
            $this->setErrorMessage(1); 
        return true;         
    } 

    /** 
     * ürün alım işleminde confirmaition mail gönderir 
     * 
     * @return void 
     */ 
    private function sendMail() 
    { 
       //mail kodu        
    } 
} 
?>