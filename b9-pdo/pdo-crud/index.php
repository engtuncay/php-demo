<?php
use Engtuncay\Phputils\core\FiCurl;

include("./vendor/autoload.php");

require_once("./pdo-config.php");

//require_once ("./pdo-create-db.php");
//require_once ("./pdo-create-table.php");
//require_once ("./pdo-insert.php");
//require_once ("./pdo-insert-transaction.php");
//require_once ("./pdo-prepared-stm.php");
//require_once ("./pdo-insert1-ps.php");
require_once("./pdo-prepared-stm2.php");

// $result = FiCurl::perform_http_request("GET", "https://jsonplaceholder.typicode.com/posts/1", false);
// 
// echo $result;

// $parameters = array("Content-type" => "application/json; charset=UTF-8");
// $arrData = array();
// $arrData['title'] = "foobar";
// $arrData['body'] = "barb";
// $arrData['userId'] = 1;

// $result2 = FiCurl::perform_http_request("POST", "https://jsonplaceholder.typicode.com/posts", $arrData);

// echo $result2;


