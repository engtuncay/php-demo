<?php

try {
  // begin the transaction
  $pdo->beginTransaction();
  // our SQL statements
  $pdo->exec("INSERT INTO MyGuests (firstname, lastname, email)
  VALUES ('John', 'Doe', 'john@example.com')");
  $pdo->exec("INSERT INTO MyGuests (firstname, lastname, email)
  VALUES ('Mary', 'Moe', 'mary@example.com')");
  $pdo->exec("INSERT INTO MyGuests (firstname, lastname, email)
  VALUES ('Julie', 'Dooley', 'julie@example.com')");
  // commit the transaction
  $pdo->commit();
  echo "New records created successfully";
} catch (PDOException $e) {
  // roll back the transaction if something failed
  $pdo->rollback();
  echo "Error: " . $e->getMessage();
}