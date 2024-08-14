<?php
$host = "localhost";
$user = "root";
$pass = "asr571";
$db = "demo";
 
try {
 $db = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $db->query("SET CHARACTER SET utf8");
 //echo "Bağlantı başarılı";
}catch(PDOException $e) {
 die( $e->getMessage());
}
