<?php

require_once('./AppConfig.php');

//$db->

try {
    // sql to create table
    $sql = "CREATE TABLE CariHesaplar (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

    // use exec() because no results are returned
    $db->exec($sql);
    echo "Table CariHesaplar created successfully";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
