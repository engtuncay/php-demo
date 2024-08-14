<?php

// CREATE DATABASE mydatabase CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
// CREATE DATABASE mydatabase CHARACTER SET utf8 COLLATE utf8_general_ci;
// CREATE DATABASE mydb CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
$sql = "CREATE DATABASE test CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
// use exec() because no results are returned
$pdo->execFiWitEchoErr($sql);

//$conn = null;