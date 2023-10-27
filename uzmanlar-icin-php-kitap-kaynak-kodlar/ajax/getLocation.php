<?php
require_once('../config.inc.php');
$LOCATION = new location($_POST);
$id = request('location_id','POST');
$level = request('level','POST');
echo $LOCATION->getJsonData($level,$id);
?>
