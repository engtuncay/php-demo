<?php

class ConfigStore
{
    public static function getConfig(string $profile) : ?TorConnConfig{
        if ($profile == "main") {
            return self::getMainConfig();
        }
        return null;
    }


    public static function getMainConfig(): TorConnConfig
    {
        $servername = "localhost";
        $username = "root";
        $password = "tor91453";
        $dbName = "myDB";

        $connConfig = new TorConnConfig();
    $connConfig->setUserName($servername);
    $connConfig->setUserName($username);
    $connConfig->setUserPass($password);
    $connConfig->setDbName($dbName);

        return $connConfig;
    }
}