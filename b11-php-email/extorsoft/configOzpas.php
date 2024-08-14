<?php
require_once("./vendor/autoload.php");

use engtuncay\phputils\PdoWrapper;

if ($_SERVER['SERVER_NAME'] == 'localhost') {
  $db2 = new PdoWrapper('localhost', 'ozpascom_db', 'root', '');
  // $db2->query("SET NAMES utf8");
  // $pdow = new PdoWrapper("", "", "", "");

  //$pdo = new PdoErbilen("localhost",)
} else {
  // echo 'localhost bağlantı değil';
  //$dbCenk = new PDO('mysql:host=localhost;dbname=ozpascom_db', 'ozpascom_user', '7040024790');
  $db2 = new PdoWrapper('localhost', 'ozpascom_db', 'ozpascom_user', '7040024790');
}

// if($db2->$error



