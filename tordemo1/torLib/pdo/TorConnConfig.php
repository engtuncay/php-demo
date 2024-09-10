<?php
class TorConnConfig
{
  public $serverName;
  public $dbName;
  public $userName;
  public $userPass;

    /**
     * @return mixed
     */
  public function getServerName()
    {
    return $this->serverName;
    }

    /**
     * @param mixed $hostname
     */
  public function setServerName($hostname)
    {
    $this->serverName = $hostname;
    }

    /**
     * @return mixed
     */
  public function getDbName()
    {
    return $this->dbName;
    }

    /**
     * @param mixed $dbname
     */
  public function setDbName($dbname)
    {
    $this->dbName = $dbname;
    }

    /**
     * @return mixed
     */
  public function getUserName()
    {
    return $this->userName;
    }

    /**
     * @param mixed $username
     */
  public function setUserName($username)
    {
    $this->userName = $username;
    }

    /**
     * @return mixed
     */
  public function getUserPass()
    {
    return $this->userPass;
    }

    /**
     * @param mixed $password
     */
  public function setUserPass($password)
    {
    $this->userPass = $password;
    }

}