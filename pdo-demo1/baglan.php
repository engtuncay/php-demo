<?php

use Teknomavi\Tcmb\Doviz;

require_once('./vendor/autoload.php');
//require_once('../libs/FiPdoExtLocal.php');

use Engtuncay\Phputils\Pdo\FiPdoExt;

try {
    //$db = new PDO( 'mysql:host=localhost;dbname=dersdb', 'root', 'root' );

$db = new FiPdoExt('localhost', 'test', 'root', '');

    printf('Baglantı kuruldu');

    //$db->getPdo->
} catch (PDOException $e) {
    echo $e->getMessage();
}

$dv = new Doviz();
