<?php
//echo __DIR__; //Y:\xampp\htdocs\php-demo\tordemo1\pdo
require_once __DIR__ . "/../vendor/autoload.php";
require_once "./pdo-db-vars2.php";

use Engtuncay\Phputils\Pdo\FiPdo;

$torDbConfig = WebSiteConfig::$torDbConfig;

$conn = new FiPdo($torDbConfig->getServerName(), $torDbConfig->getDbName(), $torDbConfig->getUserName(), $torDbConfig->getUserPass());

if ($conn->boConnection) {
    echo "Connected successfully";
} else {
    echo "Connection failed: " . $conn->getErrorMessage();
}

