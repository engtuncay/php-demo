<?php
//echo __DIR__;
require_once __DIR__ . "/../vendor/autoload.php";

use Engtuncay\Phputils\pdo\FiConnConfig;
use Engtuncay\Phputils\pdo\FiPdo;
//require_once("../torLib/pdo/TorConnConfig.php");

class AppContext {
    public static FiConnConfig $dbConfig;
    public static FiPdo $conn;
}

AppContext::$conn = new FiPdo("localhost", "test", "root","");

//AppContext::$dbConfig = new FiConnConfig();
//AppContext::$dbConfig->setServerName("localhost");
//AppContext::$dbConfig->setUserName("root");
//AppContext::$dbConfig->setUserPass(""); //tor91453
//AppContext::$dbConfig->setDbName("test");

