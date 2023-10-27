<?php
require_once "./pdo-db-vars.php";

$conn = null;

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password); 
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully<br/>";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  echo "<br/>";
}

?>