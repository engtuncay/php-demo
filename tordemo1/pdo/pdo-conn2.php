<?php
//echo __DIR__; //Y:\xampp\htdocs\php-demo\tordemo1\pdo
require_once __DIR__ . "/../vendor/autoload.php";
require_once "./pdo-db-config.php";

use Engtuncay\Phputils\Pdo\FiPdo;

//$torDbConfig = AppContext::$dbConfig;

//AppContext::$conn = new FiPdo($torDbConfig->getServerName(), $torDbConfig->getDbName(), $torDbConfig->getUserName(), $torDbConfig->getUserPass());

if (AppContext::$conn->getBoConnection()) {
    echo "Connected successfully <br/>";
} else {
    echo "Connection failed: " . AppContext::$conn->getErrorMessage();
}
