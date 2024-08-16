<?php

$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";
// use exec() because no results are returned
$pdo->execFiWitEchoErr($sql);

$last_id = $pdo->lastInsertId();
echo "New record created successfully. Last inserted ID is: " . $last_id;

