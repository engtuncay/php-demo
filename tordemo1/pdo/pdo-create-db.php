<?php
require_once("./pdo-db-config.php");
require_once("./pdo-conn2.php");

$sql = "CREATE DATABASE test";
// use exec() because no results are returned

AppContext::$conn->execFiWitEchoErr($sql);


//if(WebSiteConfig::$conn->exec($sql)){}
//echo "Database created successfully<br>";

//// Create connection
//$conn = new mysqli($servername, $username, $password);
//// Check connection
//if ($conn->connect_error) {
//  die("Connection failed: " . $conn->connect_error);
//}
//
//// Create database
//$sql = "CREATE DATABASE myDB";
//if ($conn->query($sql) === TRUE) {
//  echo "Database created successfully";
//} else {
//  echo "Error creating database: " . $conn->error;
//}

$conn->close();
?>
