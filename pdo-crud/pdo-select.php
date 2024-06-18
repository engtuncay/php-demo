<?php

try {

  $stmt = $pdo->prepare("SELECT id, firstname, lastname FROM MyGuests");
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  foreach ($stmt->fetchAll() as $row) {
    foreach ($row as $field => $value) {
      echo $field . ' => ' . $value . '<br/>';
    }
  }

  // foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
  //   echo $v;
  // }

} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}

$pdo = null;

//echo "</table>";