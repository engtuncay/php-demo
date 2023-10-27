<?php
/**
 * tüm location işlemlerini yürüten class
 *
 * @author Mehmet Şamlı
 */
class location extends dbExtend implements location_leyout 
{
  /**
   * json için ülke datasını tutar
   *
   * @var string
   */
  private $country='';
  /**
   * json için şehir datasını tutar
   *
   * @var string
   */
  private $city='';
  /**
   * json için ilçe datasını tutar
   *
   * @var string
   */
  private $district='';
  /**
   * construct method
   *
   * @param Array $criteria
   * @return void
   */
  public function __construct(&$criteria)
  {
    $this->DB =& Loader::loadClass('db');
    $this->result =& Loader::loadClass('dbResult');
    $this->criteria =& $criteria;
  }
  /**
   * json data olarak response döner
   *
   * @param string $level hangi level'da olduğunu verir 0:ülke 1: bölge 2: şehir 3:ilçe
   * @param integer $location_id formdan gelen location_id
   * @param integer $selected_id selected olacak id
   * @return json|boolean
   */
  public function getJsonData($level,$location_id,$selected_id=null)
  {
    $nationArr = getCatChild($location_id);
    $sql = 'SELECT id,locationName FROM location WHERE (id BETWEEN ? AND ?) AND _level=? ORDER BY sort,LocationName';
        
    parent::push($nationArr[0]);
    parent::push($nationArr[1]);
    parent::push($level);
    try{
      $this->DB->select($this->result,$sql,$this->dataArr);
      parent::flush(); 
      return self::getJson($this->result,$selected_id);
    }catch (Exception $error){
       trigger_error($error->getMessage(),E_USER_ERROR);
    }
    return false;
  }
  /**
   * parametre olarak gelen dataArr'deki verileri json olarak response yapar
   *
   * @param object $dataArr
   * @return json
   */
  private function getJson($dataArr)
  {
    $return = '';    
    for ( $i=0; $i<$dataArr->num_rows; $i++ ){
      $return .= sprintf('{"d":{"v":"%s","t":"%s","s":"f"}}', 
      $dataArr->dataArr[$i]['id'],
      htmlspecialchars($dataArr->dataArr[$i]['locationName'])
      );
      if ( $dataArr->num_rows !=($i+1))
        $return .= ",";
    }        
    return sprintf('{"s":[%s]}',setComma($return));
  }
  /**
   * ilçeden parent'ına göre verileri getirir
   *
   * @param array $dataArr
   * @return json|boolean
   */
  public function getLocationJson($dataArr=array(),$birth='')
  {
    $str ='(_level=0)';
    if ( isset($dataArr[$birth.'district_id']) ){
      $location_id = $dataArr[$birth.'district_id'];
      $city = substr($location_id,0,2);
      $str .= sprintf('OR (id BETWEEN %s0000000000 AND %s9999999999 AND 
      _level=2) /* il */',$city,$city);
      $districtArr =getCatParent($location_id,'only_parent_id');            
      $str .= sprintf('OR (id BETWEEN %s AND %s999999 and _level=3) 
      /* ilçe */',$districtArr, substr($location_id,0,6));
    }
    elseif ( isset($dataArr[$birth.'city_id']) ){
      $location_id = $dataArr[$birth.'city_id'];
      $city = substr($location_id,0,2);
      $str .= sprintf('OR (id BETWEEN %s0000000000 AND %s9999999999 and _level=2) /* il */',$city,$city);
    }
    elseif (isset($dataArr[$birth.'country_id'])){
      $location_id = $dataArr[$birth.'country_id'];
      $city = substr($location_id,0,2);
      $str .= sprintf('OR (id BETWEEN %s0000000000 AND %s9999999999 AND
        _level=2) /* il */',$city,$city);
    }
    $sql = "SELECT * FROM view_location_json WHERE {$str}
    ORDER BY _level, sort, locationName, id ASC";
    try{
      $this->DB->select($this->result,$sql);            
      $this->country =$this->city= $this->district;
      for($i=0;$i<$this->result->num_rows;$i++){
        self::pushArray($this->result->dataArr[$i]);
      }
      $return = '{"s":[['.setComma($this->city).'],['
      .setComma($this->district).']]}';
      self::flushData();
      return $return;
    }
    catch (Exception $error){
       trigger_error($error->getMessage(),E_USER_ERROR);
    }
    return false;
  }
  /**
   * loop'a giren sonuçları $this->locationArr dizisine push eder
   *
   * @param array $dataArr
   * @return void
   */
  private function pushArray($dataArr)
  {
    switch ($dataArr['_level']){
      case 0:
        $this->country .= sprintf('{"l":{"v":"%s","t":"%s"}},',
        $dataArr['id'],htmlspecialchars($dataArr['locationName']));    
        break;
      case 2:
        $this->city .= sprintf('{"l":{"v":"%s","t":"%s"}},',
        $dataArr['id'], htmlspecialchars($dataArr['locationName']));
        break;
      case 3:
        $this->district .= sprintf('{"l":{"v":"%s","t":"%s"}},',
        $dataArr['id'],htmlspecialchars($dataArr['locationName']));
        break;
      default:
        break;
    }
  }
  /**
   * location name'i get eder
   *
   * @param integer $location_id
   * @param boolean $pars
   * @return string|array
   */
  public function getLocationName($location_id,$pars=false)
  {
    $sql = 'SELECT related_id,CONCAT(locCityName,\' / \', locationName) AS locationName FROM location WHERE id=?';
    try{
      $this->DB->select($this->result,$sql,array($location_id));
      if ($this->result->num_rows==1 && $pars == false)
        return $this->result->dataArr[0]['locationName'];
      elseif ($this->result->num_rows==1 && $pars == true)
        return array($this->result->dataArr[0]['related_id'],
        $this->result->dataArr[0]['locationName']);
    }catch (Exception $error){
      trigger_error($error->getMessage(),E_USER_ERROR);
    }
    return false;
  }
  /**
   * flosh işlemi yapar
   *
   * @return void
   */
  private function flushData()
  {
    $this->country='';
    $this->city='';
    $this->district='';
  }
  /**
   * location name'i get eder
   *
   * @param long $id
   * @return string
   */
  public function getLocName($id)
  {
    $this->sql = 'SELECT locationName FROM view_loccityname WHERE id=?';
    try{
      $this->DB->select($this->result,$this->sql,array($id));
      return $this->result->dataArr[0]['locationName'];
    }
    catch (Exception $error){
      trigger_error($error->getMessage(),E_USER_ERROR);
    }
    return false;
  }
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
  if(($i*2)+2<= $catIDLength){
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
?>