<?php
//require_once("./config/database.php");
//$db = new Database();

// Ornek http://phplocalapi:8090/?mode=user&process=add
// $mode = $_GET['mode'];
// $process = $_GET['process'];

$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($requestMethod=='GET'){
 echo "Php Api <br/>";
 return;
}

//echo ('Request Method:'. $requestMethod);

// Takes raw data from the request
$json = file_get_contents('php://input');

// Converts it into a PHP object
$data = json_decode($json);

echo($data->id);


// require_once('./api/'. $mode .'/' . $process. '.php');

// if ($act == 'user') {
//   //echo ("user mode<br/>");

//   if ($process == 'add') {
//     echo ("user add process<br/>");
//   }
// }

// echo '<br/> Mode:'. $mode . ' Process:' . $process;

