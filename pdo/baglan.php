<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=uyeler', 'root', 'root');
    //printf("Baglantı kuruldu");
} catch (PDOException $e){
    echo $e->getMessage();
}

?>