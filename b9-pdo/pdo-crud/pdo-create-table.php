<?php

// sql to create table
$sql = "CREATE TABLE MyGuests (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

// use exec() because no results are returned
$pdo->execFiWitEchoErr($sql);

if ($pdo->getBoExecResultNtn())
  echo "Table MyGuests created successfully";
