<?php

/**
 * FiPdo Extend PDO
 */
class FiPdo extends \PDO
{
  private $dbName;

  public function __construct($host, $dbname, $username, $password, $charset = 'utf8')
  {
    try {
      parent::__construct('mysql:host=' . $host . ';dbname=' . $dbname, $username, $password);
      $this->dbName = $dbname;
      $this->query('SET CHARACTER SET ' . $charset);
      $this->query('SET NAMES ' . $charset);
      $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (PDOException $e) {
      //$this->showError($e);
    }
  }

  /**  
   * injection engellenmesi lazım
   */
  public function from($tableName)
  {
    $this->sql = 'SELECT * FROM ' . $tableName;
    $this->tableName = $tableName;
    return $this;
  }

}