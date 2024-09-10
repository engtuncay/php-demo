<?php
//echo __DIR__;
require_once("../torLib/pdo/TorConnConfig.php");

class WebSiteConfig {
    public static TorConnConfig $torDbConfig;
}

WebSiteConfig::$torDbConfig = new TorConnConfig();
WebSiteConfig::$torDbConfig->setServerName("localhost");
WebSiteConfig::$torDbConfig->setUserName("root");
WebSiteConfig::$torDbConfig->setUserPass(""); //tor91453
WebSiteConfig::$torDbConfig->setDbName("myDB");

?>