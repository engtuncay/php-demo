<?php
class Database {
  public $db;

  function __construct(){
    try {
      $this->db = new PDO("mysql:host=localhost;dbname=api;charset=utf8","root","tor91453");  
    } catch (PDOException $ex) {
      echo ($ex->getMessage());
    }
    
  }
}