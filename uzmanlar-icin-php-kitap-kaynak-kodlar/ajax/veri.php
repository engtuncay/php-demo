<?php 
include('../config.inc.php'); 
if ($_POST) { 
  $start = intval($_POST['start']); 
  //toplam kayıt sayısı get et 
  $sql = "SELECT COUNT(1) AS totalCount FROM user WHERE status=true"; 
  $result =& Loader::loadClass('dbResult'); 
  $DB->select($result,$sql); 
  $totalCount = $result->dataArr[0]['totalCount']; 
  //sıra numarasını set et 
  $sql = 'SET @row=?'; 
  $DB->insert($sql,array($start)); 
  // verileri get eder 
  $sql = 'SELECT @row:=@row+1 AS row,fname,lname,mail FROM user WHERE  status=true LIMIT ?,10'; 
  // çalıştırılacak fonksiyonu set et 
  $result->js = array('jsFunction'=>'parsing'); 
  $DB->select($result,$sql,array($start)); 
  // toplam sonucu set et 
  $result->num_rows = (int)$totalCount; 
  //json encode et 
  echo json_encode($result); 
} 
?>
