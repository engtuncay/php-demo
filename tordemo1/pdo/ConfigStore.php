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
        $connConfig->setUsername($servername);
        $connConfig->setUsername($username);
        $connConfig->setPassword($password);
        $connConfig->setDbname($dbName);

        return $connConfig;
    }
}