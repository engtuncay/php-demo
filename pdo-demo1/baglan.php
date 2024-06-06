<?php

use Teknomavi\Tcmb\Doviz;

require("./vendor/autoload.php");

use Engtuncay\Phputils\PdoWrapper;

try {
  //$db = new PDO('mysql:host=localhost;dbname=dersdb', 'root', 'root');
  $db = new PdoWrapper("localhost", "test", "root", "");
  printf("Baglantı kuruldu");

  //$db->getPdo->
} catch (PDOException $e){
    echo $e->getMessage();
}

$dv = new Doviz();

?>