<?php
/**
 * genel fonksiyon library'nin bulunduğu dosyadı
 */

function __autoload($class_name)
{
	$includeFile = ROOT_PATH."/class/{$class_name}.class.php";
	if (file_exists($includeFile))
		require_once($includeFile);
}
/**
 * Kullanıcının gerçek IP adresini verir
 *
 * @return string
 */
function getIpAddress()
{
	if ( getenv("HTTP_X_FORWARDED_FOR") != '' )
		return getenv("HTTP_X_FORWARDED_FOR");
	else 
		return getenv("REMOTE_ADDR"); 
}

/**
 * IN için sondan virgün kaldırır.
 *
 * @param dataListe $commaList
 * @return string
 */
function setComma($commaList)
{
	if ( substr($commaList,-1) == ',' )
		return substr($commaList,0,-1);
	else 
		return $commaList;
}
/**
 * tüm array'deki verileri addslashes yapar
 *
 * @param array $dataArr
 * @return array
 */
function stripslashes_deep(&$dataArr)
{
   $value = is_array($dataArr) ? array_map('stripslashes_deep', $dataArr) : /*addslashes*/trim(stripslashes($dataArr));
   return $value;
}
/**
 * data alımı yapan fonksiyon
 *
 * @param string $varName
 * @param string $varType
 * @return string
 */
function request($varName, $varType = "GET")
{
	switch ($varType)
	{
		case 'GET':
			if(array_key_exists($varName,$_GET))
				$data = addslashes($_GET[$varName]);
			else 
				$data = false;
			break;
		case 'POST':
			if(array_key_exists($varName,$_POST))
				$data = addslashes($_POST[$varName]);
			else 
				$data = false;
			break;
		case 'REQUEST':
			if(array_key_exists($varName,$_REQUEST))
				$data = addslashes($_REQUEST[$varName]);
			else 
				$data = false;
			break;
		case 'COOKIE':
			if(array_key_exists($varName,$_COOKIE))
				$data = addslashes($_COOKIE[$varName]);
			else 
				$data = false;
			break;
		case 'SESSION':
			if(array_key_exists($varName,$_SESSION))
				$data = addslashes($_SESSION[$varName]);
			else 
				$data = false;
			break;
		case "FILE":
			$data = $_FILES[$varName];
			break;
		default:
			trigger_error('bilinmeyen bir tip',E_USER_ERROR);
			break;		
	}
	if ( $data != false )
		return $data;
	return false;
}
/**
 * mesaj set eden fonksiton
 *
 * @param integer $type
 * @param string $message
 * @param string $messageHeader
 */
function pageSetMessage($type,$message,$messageHeader='Hata')
{	
	if($type!='0' && $type!='1' && $type!='2') 
		trigger_error('yanlış mesaj tipi lütfen kontrol edin',E_USER_ERROR);
	if($type == '1' && $messageHeader == 'Hata')
		$messageHeader = 'Teşekkürler';
	
	$_SESSION['pageMessage']=$message;
	$_SESSION['pageMessageType']=$type;
	$_SESSION['pageMessageHeader']=$messageHeader;	
	return true;
}
/**
 * mesaj yazıran fonksiyon
 *
 * @return string
 */
function pageMessage()
{	
	if(!empty($_SESSION['pageMessage']))
	{
		if ( $_SESSION['pageMessageType'] == 0 ) {
			$src =  "message_error";
			$class = "text_red";
		} elseif ( $_SESSION['pageMessageType'] == 1 ) {
			$src = "message_ok";
			$class = "text_green";
		} else {
			$src = "message_warn";
			$class = "text_yellow_warn";
		}
		$messageStr = '
		<div id="home-error"> 
			<img src="/img/'.$src.'.gif" />
		  	<p>'.stripslashes(request('pageMessageHeader','SESSION')).' : <span class="userIdd">'.stripslashes(request('pageMessage','SESSION')).'</span></p>
		</div>';
		session::deleteSession(array('pageMessage','pageMessageType','pageMessageHeader'));	
		return $messageStr;
	}
}
/**
 * Yönlendirme yapan fonksiyon
 *
 * @param header $header_param
 */
function header_destruct($page)
{
	if ( !headers_sent() ) 
	{
		header("Location: {$page}");
		exit(0);
	}
	else
		die("<script type=\"text/javascript\">window.location='{$page}'</script>");
}

/**
 * biçimli tarih düzenini SQL formatına dönüştürür
 *
 * @param string $date
 */
function getDateToSql($date)
{
	#01.12.2006
	$exp = explode('.',$date);
	return $exp[2].'-'.$exp[1].'-'.$exp[0];	
}
/**
 * karakter setini set eder
 * default olarak HTML ile UTF-8 olarak ayarlıdır
 *
 * @param string $contentType
 * @param string $encoding
 */
function setHeaderCharacter($contentType='html',$encoding='UTF-8')
{
	header("Content-type: text/{$contentType}; charset={$encoding}");
}
    
function checkIsNotNull($var,$err)
{	 
	if(trim($var)=="")
	{
		if($err=="")
			$err="boş olmaz.";
		return false;
	}
	return true;
}
function generateMessage($label,$err="")
{
	if($err=='boş olamaz.'||$err=='alanını kontrol ediniz.'||$err==""||$err=="yanlız.")
	$err=$label." ".$err;
	return true;
}

/**
 * random image oluşturur
 *
 * @param integer $strlen
 * @return void
 */
function imageVerification($strlen=5)
{	
	$alphanum  = "ABCDEFGHJKLMNPQRTXYZ2346789"; 
	$randText = substr(str_shuffle($alphanum), 0, $strlen); 
	$image = imagecreate(110, 40);
	$color = imagecolorallocate($image, 120, 120, 120);
	$insertfile_id = imagecreatefromgif(ROOT_PATH.'/img/img_bg.gif');
	imagecopy($image,$insertfile_id,0,0,0,0,110, 40);
	$start=5;
	for ($i=0; $i<$strlen; $i++)
	{
		$size=rand(13,18);
		$rotaion=rand(-20,20);
		imagettftext($image, $size, $rotaion, $start, 30, $color, ROOT_PATH."/font/comic.ttf", $randText[$i]);
		$start+=20;
	}
	session::createSession(array('security_code',md5(session::getSessionId().$randText)));
	header ("Content-type: image/jpeg");
	imagejpeg($image,'',100);
	imagedestroy($image);
}

function checkVariables(&$varList,&$where,$createGlobal=true)
{ 
	$state=true;
	$err="";
	foreach ($varList as $detailArr)
	{
		if(isset($where[$detailArr[0]])) //if variable exist
		{
			if(is_array($detailArr[2]))
			{
				foreach ($detailArr[2] as $functionArr)
				{
					$where[$detailArr[0]]=addslashes(stripslashes($where[$detailArr[0]]));
					if(!$functionArr($where[$detailArr[0]],$err)) // err başında & vardı
					{						
						$where[$detailArr[0]]=addslashes(stripslashes($where[$detailArr[0]]));
						$state=false;
						if($detailArr[3]!=NULL)
						{						
							$detailArr[3]($detailArr[1],&$err);
						}
					}
				}
			}

			if($createGlobal)
			$GLOBALS[$detailArr[0]]=addslashes(stripslashes($where[$detailArr[0]]));
		}
		elseif($detailArr[3]!=NULL)
		{

			if($createGlobal&&$detailArr[4]!=NULL)
			{
				$where[$detailArr[0]]=addslashes(stripslashes($where[$detailArr[0]]));
				$GLOBALS[$detailArr[0]]=addslashes(stripslashes($where[$detailArr[0]]));
			}
			if($detailArr[3]!=NULL)
			{
				 $where[$detailArr[0]]=addslashes(stripslashes($where[$detailArr[0]]));
				 $state=$state&&$detailArr[3]($detailArr[1],&$err);
			}
		}
		elseif($createGlobal&&$detailArr[4]!=NULL)
		{
			$where[$detailArr[0]]=addslashes(stripslashes($where[$detailArr[0]]));
			if($createGlobal)
				$GLOBALS[$detailArr[0]]=addslashes(stripslashes($where[$detailArr[0]]));		  
		}
	}
	return $err;
}
function checkIsNumeric($var,$err)
{
	if(!is_numeric($var))
	{
		if($err=="")
		$err="alanını kontrol ediniz.";
		return false;
	}
	return true;
}
function is_email($email,$err="")
{
	if(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email))
		return true;
	if($err=="")
		$err="yanlış.";
	return false;	
}
/**
 * location_id nin child'ını yani bulunduğu nokta ile son aralığını verir.
 * Türkiyeyi seçerse tüm il, ilçe ve semt aralığını verir.
 * istanbul seçerse tüm istanbul içeriğini array olarak get eder
 *
 * @param unknown_type $category_id
 * @return unknown
 */
function &getCatChild($category_id)
{	
	if(!is_numeric($category_id) || strlen($category_id)!=12)
	  return array(0 => 0,1 => 0);
	$catIDLength=12;
	$i=0;
	while(substr($category_id,$i*2,2)!="00" && $i*2<$catIDLength) $i++;
	$startStr=substr($category_id,0,$i*2);
	if(($i*2)+2<= $catIDLength)
	{
		$strRepeat_9=str_repeat("9",strlen($category_id)-(($i*2)+2));
		$strRepeat_0=str_repeat("0",strlen($category_id)-(($i*2)+2));
		$addMaxLimit="99";
	}
	$arr[0]=$startStr.str_repeat("0",strlen($category_id)-$i*2);
	$arr[1]=$startStr.$addMaxLimit.$strRepeat_9;
	$arr[2]=$i;
	$arr[3]=$startStr;
	$arr[4]=$strRepeat_0;
	return $arr;
}
/**
 * üstünü tamamlar
 *
 * @param integer $location_id
 * @return array
 */
function getLocationChild($location_id)
{
	$index = 0;
	$right = '';
	$len = strlen($location_id);
	for($i=$len; $i>0; $i--)
	{
		if(substr($location_id,($i-1),1) != "0") 
			break;
		$right .='9';
		$index++;
	}
	$right = substr($location_id,0,$len-$index).$right;
	return array($location_id,$right);
}

function getCatParent($category_id,$returnType="all_parent_str",$level=NULL)
{

	if(!is_numeric($category_id) || strlen($category_id)!=12) return 0;

	$catIDLength=12;
	switch ($returnType)
	{
		case "all_parent_str":
			$i=0;
			while(substr($category_id,$i*2,2)!="00" && $i*2<$catIDLength) $i++;

			$str=$category_id;
			for ($f=$i;$f>=0;$f--)
			{
				$pos=(($f*2)-2);
				if($pos>0) $str.=",".substr($category_id,0,$pos).str_repeat("0",$catIDLength-($pos));
				else break;
			}
			return $str;
		case "all_parent_arr":
			$i=0;
			while(substr($category_id,$i*2,2)!="00" && $i*2<$catIDLength) $i++;
			for ($f=0;$f<$i;$f++)
			{
				$pos=(($f*2)+2);
				if($pos>0) $arr[]=substr($category_id,0,$pos).str_repeat("0",$catIDLength-($pos));
				else break;
			}
			return $arr;
		case "only_level_value":
			$pos=(($level*2)+2);
			return substr($category_id,0,$pos).str_repeat("0",$catIDLength-($pos));
			break;
		case "only_parent_id":
			//	eğer istenen sadece parent Id ise:
			while(substr($category_id,$i*2,2)!="00" && $i*2<$catIDLength) $i++;
			$pos=(($i*2)-2);
			return substr($category_id,0,$pos).str_repeat("0",$catIDLength-($pos));
		case "only_parent_id_sql":
			$i=($catIDLength/2)-1;
			#$retval="";
			while(substr($category_id,$i*2,2)=="00" && $i>=0){
				$i--;
			}
			$pos=(($i*2)+2);
			return substr($category_id,0,$pos);
		case "only_main_id":
			return substr($category_id,0,2).str_repeat("0",$catIDLength-2);
		case "only_main_max_id":
			//	bir sonraki id yi buluyor
			while(substr($category_id,$i*2,2)!="00" && $i*2<$catIDLength) $i++;
			$pos=(($i*2));
			$main_max_id=((substr($category_id,0,$pos))*1)+1;
			return $main_max_id.str_repeat("0",$catIDLength-strlen($main_max_id));
		case "only_main_id_len":
			//	bir sonraki id yi buluyor
			while(substr($category_id,$i*2,2)!="00" && $i*2<$catIDLength) $i++;
			$pos=(($i*2));
			return $pos;
	}
	return false;
}
/**
 * location bilgisini array olarak verir
 *
 * @param string $method GET|POST|REQUEST
 * @return Array
 */
function getLocationArr($method='GET',$birt='')
{
	$district_id = request($birt.'district_id',$method);
	if ($district_id != '')
		return array($birt.'district_id'=>$district_id,$district_id);
	$city_id = request($birt.'city_id',$method);
	if ($city_id != '')
		return array($birt.'city_id'=>$city_id,$city_id);
	$country_id = request($birt.'country_id','REQUEST');
	if($country_id=='')
		$country_id = request($birt.'country_id',$method);
	if($country_id != '')
		return array($birt.'country_id'=>$country_id,$country_id);
	return true;
}
/**
 * smarty display için kullanılan genel function
 *
 * @param object $smartyObj
 * @param string $template
 * @param string $compile_id
 * @param boolean $display
 * @return void
 */
function displaySmarty(&$smartyObj,$template,$compile_id=null,$display=true)
{
	try 
	{
		$smartyObj->display($template,$_SERVER['SERVER_NAME'],$compile_id,$display);
	}
	catch (Exception $error)
	{
		trigger_error($error->getMessage(),E_USER_ERROR);
	}
}
function fetchSmarty(&$smartyObj,$template,$compile_id=null,$display=true)
{
	return $smartyObj->fetch($template,$compile_id,null,$display);
}
/**
 * smarty cache olup olmadığını kontrol eder
 *
 * @param object $smartyObj
 * @param string $template
 * @param string $compile_id
 * @param boolean $display
 * @return void
 */
function isCacheSmarty(&$smartyObj,$template,$compile_id=null)
{
	return $smartyObj->is_cached($template,$_SERVER['SERVER_NAME'],$compile_id);
}
/**
 * smarty cache siler
 *
 * @param object $smartyObj
 * @param string $template
 * @param string $compile_id
 * @param boolean $display
 * @return void
 */
function clearCacheSmarty(&$smartyObj,$template,$compile_id=null)
{
	return $smartyObj->clear_cache($template,$_SERVER['SERVER_NAME'],$compile_id);
}
/**
 * smarty için expires zamanı verir
 *
 * @param Array $timeArr array('minute'=>1,'hour'=>2,'day'=>30,'month'=>1,'year'=>1)
 * @return integer
 */
function getExpires($setTimeArr = array())
{
	/**
	 * 60 = 1dk
	 * 3600 = 1 saat
	 * 86400 = 1 gün
	 * 259200 = 1 ay
	 * 31557600 = 1 yıl "365 gün + 6 saat"
	 */
	$timeArr = array(
						'year'=>31557600,
						'month'=>2592000,
						'day'=>86400,
						'hour'=>3600,
						'minute'=>60
					);
	foreach ($timeArr as $name=>$value)
	{
		if(array_key_exists($name,$setTimeArr))
		{
			$timeText = $setTimeArr[$name]*$value;
			break;
		}
	}
	return $timeText;
}
/**
 * rewrite'da url'lerin değiştirilebilmesi için tüm linkler php de bu fonksiyonla çağrılır
 *
 * @param string $url /member 
 * @return string
 */
function url($url,$param=null)
{
	if($param == null)
		return '/'.$url;
	return sprintf('/%s&%s',$url,$param);
}
/**
 * array kill eder
 *
 * @param array $array
 */
function killArray(&$array)
{
	array_splice($array,0);
	unset($array);
}
/**
 * log insert yapan function
 *
 * @param object $DB
 * @param integer $user_id
 * @param integer $log_id
 * @return boolean
 */
function setLog(&$DB,$user_id,$log_id)
{
	$ip_address = getIpAddress();
	//$sql = "CALL sp_user_log_insert({$user_id},{$log_id},'{$ip_address}')";
	$sql = "INSERT INTO user_log (user_id,user_log_type_id,ip_address,regDate)
        VALUES (?,?,?,NOW())";
	try 
	{
		$result = new dbResult();
		//$DB->select($result,$sql,array($user_id,$log_id,$ip_address));
		$DB->insert($sql,array($user_id,$log_id,$ip_address));
		return $result->dataArr[0]['response'];
	}
	catch (Exception $error)
	{
		trigger_error($error->getMessage(),E_USER_ERROR);
	}
	return false;
}

/**
 * arama motorlarının siteye gelişlerini kaydeder
 *
 * @return void
 */
function isBotRobot()
{
	$machStr="/Google|gsa\\-crawler|Alexa|MSN|Fast Crawler|BilgiBot|Hakia|findlinks|ConveraCrawler|Slurp|Inktomi|yahoo|slurp|Lycos|Infoseek|Scooter|Alta Vista|ia\\_archiver/";
	$agent=@$_SERVER["HTTP_USER_AGENT"];
	$url = @$_SERVER["REQUEST_URI"];
	
	if ( preg_match($machStr, $agent) )
	{
		$DB =& Loader::loadClass('db');
		$sql = "INSERT INTO sitemap_visit (userAgent,url,regDate,ipAddress) VALUES (?,?,NOW(),?)";
		$DB->insert($sql,array($agent,$url,getIpAddress()));
		@$GLOBALS['isBotRobot'] = true;
	}	
}
/**
 * fiyat bilgisini set eder
 *
 * @param integer $money
 * @param integer $displaySymbol
 * @param string $currencyFormat
 * @param string $currencySym "para birimi"
 * @param string $class "class adı"
 * @param integer $isHtml
 * @param string $endText
 * @return string
 */
function currency($money="0", $displaySymbol=1, $currencyFormat="", $currencySym="YTL", $class="", $isHtml=0, $endText="" )
{
	if($currencyFormat!="") $currencyFormat = request("currencyFormat","SESSION");	
	
	#$money=round($money, $currencyFormat);	
	
	$return_money=number_format($money, $currencyFormat, ',', '.');

	if ($isHtml==1 || $displaySymbol==1) { // eğer herhangi bir html tagı eklenecekse buraya giriyor.
		if($displaySymbol) $currencySymbol=" ".$currencySym; //" (KDV Dahil)";
		$moneyArr=explode(",",$return_money);
		if ($currencySym=="YTL")
		{
			$spanTitle=number_format($money*1000000,0,",",".")." TL";
			$spanClass="text_title";
		}
		$return_money="<span title=\"$spanTitle\" class=\"$style $spanClass\">".$moneyArr[0]."<span>".$moneyArr[1]."</span> $currencySymbol $endText</span>";
	}
	
	return $return_money;
}
/**
 * bit alaqnları için true false çıktısı yapar
 *
 * @param integer $status
 * @return string
 */
function getStatus($status)
{
	if($status =='1')
		return 'true';
	return 'false';
}
function getDebug($debug)
{
	echo "<pre>";
	print_r($debug);
	echo "</pre>";
}
/**
 * Cinsiyet query si çıkartır.
 *
 * @return string
 */
function getGenderQuery()
{
	$properties_category_id = session::getSession('properties_category_id');
	$gender = '';
	if($properties_category_id==2)
	{
		$gender = session::getSession('gender');
		if($gender=='XXM')
			$gender='XXF';
		else 
			$gender='XXM';
		$gender = " AND user.gender = '{$gender}'";
	}
	return $gender;
}
/**
 * class'lar içerisinde tarih alanını set edecek datayı belirtir.
 *
 * @param string $auto_date
 * @param string $news_date
 * @return string
 */
function getNewsDate($auto_date,$news_date)
{
	if ( $auto_date == 'on')
	{
		return date('Y-m-d G:i:s');
	}
	elseif ( isset($news_date) )
	{
		$exp = explode('.',$news_date);
		if ( count($exp) == 3)
		{
			$date_exp = explode(' ',$exp[2]);
			
			if (strlen($date_exp[1]) == 4)
				$date_exp[1] = $date_exp[1].':00';
			$date = sprintf('%s-%s-%s %s',$date_exp[0],$exp[1],$exp[0],$date_exp[1]);
		}
		return $date;		
	}
	else 
		return date('Y-m-d G:i:s');
}
/**
 * dosya uzantısını get eder
 *
 * @param string $filename
 * @return string
 */
function getFileExtension($filename)
{
	$filename = strtolower($filename) ;
	$exts = split("[/\\.]", $filename) ;
	$n = count($exts)-1;
	$exts = $exts[$n];
	return $exts;
}

/**
 * title için url oluşturur
 *
 * @param integer $id
 * @param string $title
 * @param string $type
 * @return string
 */
function getDetailUrl($id,$title,$type='spor')
{
	$title = mb_strtolower($title,'UTF-8');
	$trArr = array('ç','Ç','ı','İ','ş','Ş','ğ','Ğ','ö','Ö','ü','Ü');
	$enArr = array('c','c','i','i','s','s','g','g','o','o','u','u');

	$title = str_replace($trArr,$enArr,$title);
	if($type!='')
		return sprintf('/%s%s.html',$id,getUrlText($title));
	else 
		return sprintf('/%s%s.html',$id,getUrlText($title));
}
/**
 * title'ı link haline getirir
 *
 * @param string $text
 * @return string
 */
function getUrlText($text)
{
	$text = mb_strtolower($text,'UTF-8');
	$trArr = array('ç','Ç','ı','İ','ş','Ş','ğ','Ğ','ö','Ö','ü','Ü');
	$enArr = array('c','c','i','i','s','s','g','g','o','o','u','u');

	$text = str_replace($trArr,$enArr,$text);
	$NOT_acceptable_characters_regex = '#[^-a-zA-Z0-9_ ]#';
	$text = preg_replace($NOT_acceptable_characters_regex, '', $text);
	$text = trim($text);
	return '/'.preg_replace('#[-_ ]+#', '-', $text);
}
function pagingHidden($params)
{
	$hiddenArr = array ('sf','sc','ob','od','tc');
	if(array_key_exists('disabled',$params))
		array_push($hiddenArr,$params['disabled']);	
	
	foreach ( $_POST AS $n => $v )
	{
		if (! in_array($n,$hiddenArr) )
			echo "<input type=\"hidden\" name=\"{$n}\" value=\"{$v}\" />\n";
	}
}
?>