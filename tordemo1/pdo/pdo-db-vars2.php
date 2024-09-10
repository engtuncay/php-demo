<?php
//echo __DIR__;
use Engtuncay\Phputils\pdo\FiConnConfig;

//require_once("../torLib/pdo/TorConnConfig.php");

class WebSiteConfig {
    public static FiConnConfig $torDbConfig;
}

WebSiteConfig::$torDbConfig = new FiConnConfig();
WebSiteConfig::$torDbConfig->setServerName("localhost");
WebSiteConfig::$torDbConfig->setUserName("root");
WebSiteConfig::$torDbConfig->setUserPass(""); //tor91453
WebSiteConfig::$torDbConfig->setDbName("test");

?>