<?php
interface location_leyout
{
  /**
   * location datası json olarak get eder
   *
   * @param integer $level
   * @param integer $location_id
   * @param integer $selected_id
   */
  public function getJsonData($level,$location_id,$selected_id=null);
  /**
   * belli bir locationu get eder
   *
   * @param array $dataArr
   * @param string $birth
   */
  public function getLocationJson($dataArr=array(),$birth='');
  /**
   * Location adını get eder
   *
   * @param integer $location_id
   * @param boolean $pars
   */
  public function getLocationName($location_id,$pars=false);
  /**
   * Sadece location adını get eder
   *
   * @param integer $id
   */
  public function getLocName($id);
}
?>