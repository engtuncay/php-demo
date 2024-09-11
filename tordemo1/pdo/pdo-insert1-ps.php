<?php
require_once './pdo-db-config.php';

try {
    // prepare sql and bind parameters
    $stmt = AppContext::$conn->prepare("INSERT INTO MyGuests (firstname, lastname, email)
  VALUES (:firstname, :lastname, :email)");
    $stmt->bindParam('firstname', $firstname); //$stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam('lastname', $lastname);
    $stmt->bindParam('email', $email);

    // insert a row
    $firstname = "John";
    $lastname = "Doe";
    $email = "john@example.com";
    $stmt->execute();

    // insert another row
    $firstname = "Mary";
    $lastname = "Moe";
    $email = "mary@example.com";
    $stmt->execute();

    // insert another row
//    $firstname = "Julie";
//    $lastname = "Dooley";
//    $email = "julie@example.com";
//    $stmt->execute();

    echo "New records created successfully";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

//$conn = null;
