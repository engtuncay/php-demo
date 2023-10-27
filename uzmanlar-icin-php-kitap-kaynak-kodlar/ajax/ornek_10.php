<?php
$LOCATION = new location($_GET);
/* location */
$location_id=”110806250000”;
$dataArr = array('district_id'=>$location_id);
$SMARTY->assign('locationJson',$LOCATION->getLocationJson($dataArr));

?>