<?php

try {
  // prepare sql and bind parameters
  $stmt = $pdo->prepare("INSERT INTO MyGuests (firstname,lastname)
  VALUES (:firstname,:lastname)");

  // insert a row
  $firstname = "M";
  $lastname = "Y";
  //$email = "john@example.com";

  $arr = array();
  $arr["firstname"] = $firstname;
  $arr["lastname"] = $lastname;
  $stmt->execute($arr);

  echo "New records created successfully";
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}

//$pdo = null;