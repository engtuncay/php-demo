<?php
if ( preg_match($machStr, $agent) )
{
  $DB =& Loader::loadClass('db');
  $sql = "INSERT INTO sitemap_visit (userAgent,url,regDate,ipAddress) VALUES (?,?,NOW(),?)";
  $DB->insert($sql, array($agent, $url, $ipAddress));
  @$GLOBALS['isBotRobot'] = true;
} 
?>