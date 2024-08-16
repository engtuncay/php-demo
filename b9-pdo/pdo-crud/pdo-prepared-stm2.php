<?php
use Engtuncay\Phputils\core\FiKeyBean;

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

  $fkbParams = new FiKeyBean();
  $fkbParams->put("firstname", $firstname);
  $fkbParams->put("lastname", $lastname);
  $stmt->execute($fkbParams->getArrParams());

  echo "New records created successfully";
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}

//$pdo = null;