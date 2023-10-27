<?php
require_once('ornek_1.php');
echo geoip::getCountyCode(null,1)."\n<br />";
echo geoip::getCountyCode(null,2)."\n<br />";
echo geoip::getCountyCode(null,3)."\n<br />";
echo geoip::getCodeTimeZone(geoip::getCountyCode(null,1))."\n<br />";
echo "<pre>";
print_r(geoip::getLocationArray(null));
echo "</pre>";
?>