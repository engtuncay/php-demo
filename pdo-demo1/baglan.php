<?php

use Teknomavi\Tcmb\Doviz;

require_once('./vendor/autoload.php');


require_once('../libs/FiPdoExtend.php');

use Engtuncay\Phputils\FiPdoExtend;

try {
    //$db = new PDO( 'mysql:host=localhost;dbname=dersdb', 'root', 'root' );
    $db = new FiPdoExtend('localhost', 'test', 'root', '');
    printf('Baglantı kuruldu');

    //$db->getPdo->
} catch (PDOException $e) {
    echo $e->getMessage();
}

$dv = new Doviz();
