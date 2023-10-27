<?php
require_once "./pdo-db-vars.php";

$conn = null;

try {
  // conn. text'e baglanılacak db'de eklenebilir. örnek : "mysql:host=$servername;dbname=myDB"
  $conn = new PDO("mysql:host=$servername", $username, $password); 
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>