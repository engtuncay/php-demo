<?php
require_once './pdo-db-config.php';

use Engtuncay\Phputils\core\FiKeybean;

try {

    $stmt = AppContext::$conn->prepare("SELECT * from MyGuests where id=:id Limit 1");

    $fkbParams = new FiKeybean();

    $fkbParams->put("id",1);

    $stmt->execute($fkbParams->getParams());

    // set the resulting array to associative
    $stmt->setFetchMode(PDO::FETCH_ASSOC); //$result =

    $all = $stmt->fetchAll(); // array

    foreach ($all as $row) {
        foreach ($row as $field => $value) {
            echo $field . ' : ' . $value . '<br/>';
        }
    }


//    // prepare sql and bind parameters
//    $stmt = AppContext::$conn->prepare("INSERT INTO MyGuests (firstname, lastname, email)
//  VALUES (:firstname, :lastname, :email)");
//    $stmt->bindParam('firstname', $firstname); //$stmt->bindParam(':firstname', $firstname);
//    $stmt->bindParam('lastname', $lastname);
//    $stmt->bindParam('email', $email);


    //echo "New records created successfully";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

//$conn = null;
