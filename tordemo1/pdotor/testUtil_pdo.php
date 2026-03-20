<?php

use Engtuncay\Phputils8\FiDbs\FiQuery;
use Engtuncay\Phputils8\FiPdos\FiPdo;

require_once __DIR__ . "/../vendor/autoload.php";

// .env dosyası okunur
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ );
$dotenv->load();

// Örnek: .env dosyasındaki bir değişkene erişmek
$db_host = $_ENV['database.default.host'] ?? null;
$db_name = $_ENV['database.default.database'] ?? null;
$db_user = $_ENV['database.default.username'] ?? null;
$db_pass = $_ENV['database.default.password'] ?? null;

$pdo = new FiPdo($db_host, $db_name, $db_user, $db_pass);

// $sql = "ALTER TABLE settings ADD es1ApiUser  varchar(255);
// ALTER TABLE settings ADD es1ApiPass  varchar(255);";

$sql = "SELECT * FROM settings";

$fiQuery = new FiQuery($sql);

$fdr = $pdo->selectFkb($fiQuery);

echo var_dump($fdr->getFkbValue());








//$pdo->connect();




