<?php
use Fi\Fruit;
include("./Fruit.php"); // include bulamazsa hata vermez, require verir

// namespace ile kullanımı
$fruit1 = new Fi\Fruit();
$fruit1->set_name("çilek");

// ns'siz kullanım
$fruit2 = new Fruit();
$fruit2->set_name("elma");

echo $fruit1->get_name() . "<br>";
echo $fruit2->get_name() . "<br>";



?>

