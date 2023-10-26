<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=uyeler', 'root', '');
    //printf("Baglantı kuruldu");
} catch (PDOException $e){
    echo $e->getMessage();
}

?>