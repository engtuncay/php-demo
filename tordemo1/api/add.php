<?php
//echo("user add process");


// Takes raw data from the request
$json = file_get_contents('php://input');

// Converts it into a PHP object
$data = json_decode($json);

print_r($data);

// if($_POST){
//   print_r($_POST);
// }else{
//   die("post işlemi yapılmamış");
// }



?>