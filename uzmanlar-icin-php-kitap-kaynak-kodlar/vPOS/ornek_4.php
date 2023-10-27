<?php
class payment 
{ 
    /** 
     * Enter description here... 
     * 
     * @var unknown_type 
     */ 
    public $reason=array(); 
    /** 
     * Enter description here... 
     * 
     * @var unknown_type 
     */ 
    public $paymentSessionId=0; 
    /** 
     * Enter description here... 
     * 
     * @var unknown_type 
     */ 
    public $bankAccountArr = array(); 
    /** 
     * Enter description here... 
     * 
     * @var unknown_type 
     */ 
    public $reasonBank = array(); 
    /** 
     * Enter description here... 
     * 
     * @var unknown_type 
     */ 
    private $DB; 
    /** 
     * Enter description here... 
     * 
     * @var unknown_type 
     */ 
    private $result; 

    public function __construct(&$DB) 
    { 
        $this->reasonBank[4]["M"]["01"]="Kullanıcı adınız hatalı. Lüften kontrol edin"; 
        $this->reasonBank[4]["M"]["02"]="Şifreniz Hatalı. Lüften kontrol edin."; 
        $this->reasonBank[4]["M"]["06"]="Bakiyeniz yetersiz."; 

        $this->reasonBank[1]["M"]["0"]="Belirtilen kredi kartı ile işlem gerçekleştirilemedi. Lütfen kredi kartı bilgileriniz yeniden kontrol edin"; 
        $this->reasonBank[1]["M"]["1"]="Belirtilen miktar kredi kartınızdan çekildi"; 
         
        $this->reasonBank[1]["M"]["2"]="Kredi kartı ile ödeme sistemimizde kısa süreli bir hata oluştu. Detaylı bilgi ve yardım için lütfen bize ulaşınız. "; 


        /**cc5 hataları***/ 
        $this->reasonBank[1]["M"]["CC5_51"]="Kartınızda yeterli limit bulunmamaktadır. Lütfen başka bir kredi kartı kullanınız. "; 
        $this->reasonBank[1]["M"]["CC5_54"]="Kullanmış olduğunuz kredi kartının kullanım süresi dolmuştur. Lütfen başka bir kredi kartı kullanınız. "; 
        $this->reasonBank[1]["M"]["CC5_58"]="Kullanmış olduğunuz kredi kartı ile sistemimizde taksitli alış-veriş yapamazsınız."; 
        $this->reasonBank[1]["M"]["CC5_05"]="Bu işlem bankanız tarafından bilinmeyen bir nedenle reddedilmiştir. <br /> Kartınız internette kullanıma kapanmış veya geçici olarak bloke edilmiş olabilir. Lütfen bankanızla temasa geçiniz."; 
        $this->reasonBank[1]["M"]["CC5_57"]=$this->reasonBank[1]["M"]["CC5_05"]; 
        $this->reasonBank[1]["M"]["CC5_95"]="Kullanmış olduğunuz kredi kartı seçilen bankaya ait olmadığı için taksitli alış-veriş yapamzsınız."; 
        $this->reasonBank[1]["M"]["CC5_"]=$this->reasonBank[1]["M"]["CC5_05"]; 

        $this->reasonBank[1]["F"]["OID"]="OrderId"; 
        $this->reasonBank[1]["F"]["ApproveCode"]="AuthCode"; 
        $this->reasonBank[1]["F"]["RRN"]="HostRefNum"; 
        $this->reasonBank[1]["F"]["ErrorCode"]="ErrMsg"; 
        $this->reasonBank[1]["F"]["Status"]="Response"; 
        $this->reasonBank[1]["F"]["ErrorCodeNumber"]="ProcReturnCode"; 
         
        $this->DB = & $DB; 
        $this->result =& new dbResult(); 
    } 
    private function payment_log_insert($payment_session_id,$holderName,$total,$cardno,$bankAccount_id,$termCount,$termRate,$mode,$transaction_type_id) 
    { 
        //bank_return -1:payment denemesi 
        //               0:banka tarafından onaylanmadı 
        //               1:banka tarafından onaylandı 

        $cardno_start=substr($cardno,0,4); 
        $cardno_finish=substr($cardno,12,4); 
        $cardno=$cardno_start." **** **** ".$cardno_finish; 

        $sql="INSERT INTO payment_log (user_id,payment_session_id,bankAccount_id,bank_return,holderName,regDate,total,cardNumber,termCount,termRate,paymentMode,transaction_type_id,ip) 
        VALUES (?,?,?,'-1',?,NOW(),?,?,?,?,?,?,?)"; 
        $dataArr = array(); 
        $user_id = request('user_id','SESSION'); 
        /* eğer user_id yok ise callCenter'den ödeme yapılıyor demektir. */ 
        if ( $user_id =='') 
            $user_id = request('action_user_id','SESSION'); 
         
        array_push($dataArr,$user_id); 
        array_push($dataArr,$payment_session_id); 
        array_push($dataArr,$bankAccount_id); 
        array_push($dataArr,$holderName); 
        array_push($dataArr,$total); 
        //array_push($dataArr,$cardno); 
        array_push($dataArr,request('MaskedPan','POST')); 
        array_push($dataArr,$termCount); 
        array_push($dataArr,$termRate); 
        array_push($dataArr,$mode); 
        array_push($dataArr,$transaction_type_id); 
        array_push($dataArr,getIpAddress()); 
         
        try  
        { 
            $this->DB->insert($sql,$dataArr);             
        } 
        catch (Exception $error) 
        { 
            trigger_error($error->getMessage(),E_USER_ERROR); 
        } 
        return $this->DB->last_id(); 
    } 
    protected function payment_log_update($payment_log_id,$returnArr) 
    { 
        $sql = 'UPDATE payment_log SET bank_return=?,ApproveCode=?,OID=?,RRN=?,TransID=?,errorCode=? ,regDate=NOW() WHERE id=?'; 
        $dataArr = array(); 
        array_push($dataArr,$returnArr[0]); 
        array_push($dataArr,$returnArr[1]); 
        array_push($dataArr,$returnArr[2]); 
        array_push($dataArr,$returnArr[3]); 
        array_push($dataArr,$returnArr[7]); 
        array_push($dataArr,addslashes($returnArr[6]."-".$returnArr[5])); 
        array_push($dataArr,$payment_log_id); 
        try  
        { 
            $this->DB->insert($sql,$dataArr);             
        } 
        catch (Exception $error) 
        { 
            trigger_error($error->getMessage(),E_USER_ERROR); 
        } 
    } 
    /** 
     * payment_session_id yoksa select yaparak oluşturur, varsa get eder 
     * 
     * @return integer 
     */ 
    public function paymentSession() 
    { 
        $payment_session_id = request("payment_session_id","SESSION");         
        if(strlen($payment_session_id) ==0 || $payment_session_id == '') 
        { 
            $sql="SELECT id AS payment_session_id FROM payment_session"; 
            try  
            { 
                $this->DB->select($this->result,$sql); 
            } 
            catch (Exception $error) 
            { 
                trigger_error($error->getMessage(),E_USER_ERROR); 
            } 
            $payment_session_id = $this->result->dataArr[0]['payment_session_id']; 
             
            $sql="UPDATE payment_session SET id=?"; 
            try  
            { 
                $this->DB->update($sql,array($payment_session_id+1)); 
            } 
            catch (Exception $error) 
            { 
                trigger_error($error->getMessage(),E_USER_ERROR); 
            } 
            $_SESSION['payment_session_id']    = $payment_session_id; 
            $this->paymentSessionId = $payment_session_id; 
            return $payment_session_id; 
        } 
        return request("payment_session_id","SESSION"); 
    } 
    /** 
     * payment_session_id'yi siler 
     *  
     * @return void 
     */ 
    public function paymentSessionUnregister() 
    { 
        $this->paymentSessionId=-1; 
        session_unregister("payment_session_id"); 
    } 
    /** 
     * curl ile işlem yapan metod 
     * 
     * @param unknown_type $total 
     * @param unknown_type $cardno 
     * @param unknown_type $expmonth 
     * @param unknown_type $cv2 
     * @param unknown_type $expyear 
     * @param unknown_type $name 
     * @param unknown_type $OID 
     * @param unknown_type $bankAccount_id 
     * @param unknown_type $term 
     * @param unknown_type $vposCount 
     * @param unknown_type $mode 
     * @return boolean 
     */ 
    public function payment_curl(&$total,$cardno,$expmonth,$cv2,$expyear,$name,$OID,&$bankAccount_id,$term=0,$vposCount=1,$mode="Auth") 
    { 
        $payment_arr[]=array(); 
        $transaction_type_id=200; 
        if( $term >= 1 ) 
        { 
            $transaction_type_id=202; 
            $vposCount=2; // taksitli bir seçim yapıldıysa başka br vpos seçilmesin 
        } 

        $sql='SELECT  
                    bankName, 
                    vposFolder, 
                    vposServer, 
                    currency, 
                    vposName, 
                    vposPassword, 
                    vposClientID, 
                    VposTerminalID  
                FROM  
                    bankAccount  
                WHERE bankAccount.id=?'; 
        try  
        { 
            $this->DB->select($this->result,$sql,array($bankAccount_id)); 
        } 
        catch (Exception $error) 
        { 
            trigger_error($error->getMessage(),E_USER_ERROR); 
        } 
         
        if($this->result->num_rows==0) 
            trigger_error("Banka Bilgilerine ulaşaılamadı",E_USER_ERROR); 
        else 
        { 
            $bankName        = $this->result->dataArr[0]['bankName']; 
            $vposFolder        = $this->result->dataArr[0]['vposFolder']; 
            $vposServer        = $this->result->dataArr[0]['vposServer']; 
            $currency        = $this->result->dataArr[0]['currency']; 
            $vposName        = $this->result->dataArr[0]['vposName']; 
            $vposPassword    = $this->result->dataArr[0]['vposPassword']; 
            $vposClientID     = $this->result->dataArr[0]['vposClientID']; 
            $VposTerminalID = $this->result->dataArr[0]['VposTerminalID']; 
        } 
        $payment_log_id = self::payment_log_insert($OID,$name,$total,$cardno,$bankAccount_id,$term,0,$mode,$transaction_type_id); 
        $xml            = self::createCreditXML($vposName,$vposPassword,$vposClientID,$OID,$cardno,$expmonth,$expyear,$cv2,$total,$currency,$term,$mode); 
        $xml_response    = getCURL("https://",$vposServer,$vposFolder,"DATA=".$xml); 
         
        if( $xml_response )  
        { 
            $xmlDom =& new xml_parser(); 
            $result =& $xmlDom->parser($xml_response,false); 
            if($result) 
            { 
                $xmlDom->get_element_value($this->reasonBank[1]["F"]["Status"],0); 
                if($xmlDom->get_element_value($this->reasonBank[1]["F"]["Status"],0)=="Approved") 
                { 
                    $payment_arr[0]=1; 
                    $payment_arr[1]=$xmlDom->get_element_value($this->reasonBank[1]["F"]["ApproveCode"],0); 
                    $payment_arr[2]=$xmlDom->get_element_value($this->reasonBank[1]["F"]["OID"],0); 
                    $payment_arr[3]=$xmlDom->get_element_value($this->reasonBank[1]["F"]["RRN"],0); 
                    $payment_arr[4]=$bankAccount_id; 
                    self::payment_log_update($payment_log_id,$payment_arr); 
                    return $payment_arr; 
                } 
                else 
                { 
                    # default olarak 0 hata kodu çıkar 
                    $payment_arr[0]=0; 
                    $erro_no = $xmlDom->get_element_value($this->reasonBank[1]['F']['ErrorCodeNumber']); 
                    # eğer hata kodu array da varsa tanımlı hata kodu çıksın 

                    if ( array_key_exists('CC5_'.$erro_no,$this->reasonBank[1]["M"]) ) 
                    { 
                        $payment_arr[0] = 'CC5_'.$erro_no; 
                    } 

                    # eğer hata dönerse vede bu işlem iadeyse birde Void olarak yeniden dene 
                    if( $mode == 'Credit' && $erro_no == 93 ) 
                    { 
                        return self::payment_curl($total,$cardno,$expmonth,$cv2,$expyear,$name,$OID,&$bankAccount_id,$term,2,'Void'); 
                    } 

                    $payment_arr[2]=$xmlDom->get_element_value($this->reasonBank[1]["F"]["OID"],0); 
                    $payment_arr[5]=$erro_no.' - '.$xmlDom->get_element_value($this->reasonBank[1]["F"]["ErrorCode"],0); 

                    if(strpos($payment_arr[5],"order that already has a valid transaction")>0) 
                    { 
                        trigger_error("VPOS ta kullanılmış  OID : $OID  bankAccount_id : $bankAccount_id ",E_USER_NOTICE); 
                        $payment_arr[0]=2; 
                    } 
                    self::payment_log_update($payment_log_id,$payment_arr); 
                    return $payment_arr; 
                } 
            } 
        } 
        //yukarıdan bir return yoksa sistede bir problem var 
        //eğer problem ilk defa geliyorsa diğer bankanın posuna geç         
        if( $vposCount==1 ) 
        { 
            return false; 
            trigger_error("VPOS ta problem var ==> bankAccount_id : $bankAccount_id - baska VPOS a geçildi (SES : $OID) *** $xml_response *** ",E_USER_NOTICE); 

            $sql="SELECT b2.id FROM bankAccount b1  
                    INNER JOIN bankAccount b2 ON (b1.id=? AND b1.companyAccountPaymentType=b2.companyAccountPaymentType AND b1.companyAccountType=b2.companyAccountType )  
                WHERE  
                    b2.id!=? "; 
            $dataArr = array(); 
            array_push($dataArr,$bankAccount_id,$bankAccount_id); 
            try  
            { 
                $this->DB->select($this->result,$sql,$dataArr); 
            } 
            catch (Exception $error) 
            { 
                trigger_error($error->getMessage(),E_USER_ERROR); 
            } 
                         
            if($this->result->num_rows > 0) 
            { 
                $bankAccount_id=$this->result->dataArr[0]['id']; 
                return self::payment_curl($total,$cardno,$expmonth,$cv2,$expyear,$name,$OID,$bankAccount_id,1,2,$mode); 
            } 
        } 
        else 
        { 
            trigger_error("VPOS ta problem var ==> bankAccount_id : $bankAccount_id - Odeme yapılamadı (SES : $OID) *** $xml_response *** ",E_USER_NOTICE); 
            $payment_arr[0]=2; 
            return $payment_arr; 
        } 
    } 

    private function createCreditXML($vposName,$vposPassword,$vposClientID,$OID,$cardNumber,$expMonth,$expYear,$cvv,$total,$currency,$taksit=NULL,$type="AUTH") 
    { 
        if ( $type == 'Credit' || $type == 'Void' )
		{
			$xml=<<< hh
<CC5Request>
<Name>$vposName</Name>
<Password>$vposPassword</Password>
<ClientId>$vposClientID</ClientId>
<Mode>P</Mode>
<OrderId>$OID</OrderId>
<Type>$type</Type>
<Total>$total</Total>
<Extra>
</Extra>
<Currency>$currency</Currency>
</CC5Request>
hh;
		}
		else
		{
	if(!is_numeric($taksit) || $taksit<2) $taksit="";
	$xml=<<< hh
<CC5Request>
<Name>$vposName</Name>
<Password>$vposPassword</Password>
<ClientId>$vposClientID</ClientId>
<Mode>P</Mode>
<OrderId>$OID</OrderId>
<Type>$type</Type>
<Number>$cardNumber</Number>
<Expires>$expMonth/$expYear</Expires>
<Cvv2Val>$cvv</Cvv2Val>
<Total>$total</Total>
<Taksit>$taksit</Taksit>
<UserId></UserId>
<Currency>$currency</Currency>
<email></email>
<BillTo>
<Name></Name>
<Street1></Street1>
<City></City>
<PostalCode></PostalCode>
<Country></Country>
<TelVoice></TelVoice>
</BillTo>
<ShipTo>
<Name></Name>
<Street1></Street1>
<City></City>
<PostalCode></PostalCode>
<Country></Country>
</ShipTo>
</CC5Request>
hh;
		}
        return $xml; 
    } 
    /** 
     * hangi bankadan çekim yapılacağını get eder 
     * 
     * @return integer 
     */ 
    public function select_bankAccount() 
    { 
        //eğer satıcının mağğazası varsa ve ürün ödemesiyse onun vposu olup olmadığı kontrol ediliyor 
        $sql='SELECT id,vposDefault FROM bankAccount WHERE vposClientID > 0 ORDER BY vposDefault DESC'; 
        try  
        { 
            $this->DB->select($this->result,$sql); 
        } 
        catch (Exception $error) 
        { 
            trigger_error($error->getMessage(),E_USER_ERROR); 
        }         
        if($this->result->num_rows==0)  
            trigger_error("VPOS hesabı bulunamadı",E_USER_ERROR); 
        else 
        { 
            if($this->result->dataArr[0]['vposDefault']!=1)  
                trigger_error("default VPOS hesabı bulunamadı",E_USER_NOTICE); 
            return $this->result->dataArr[0]['id']; 
        } 
    } 
} 
?>
