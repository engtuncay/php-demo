<?php
class TorPdoConnFactory
{

    public static function makeConnection(TorConnConfig $config): ?PDO
    {
        $hostname = $config->getHostname();
        $dbname = $config->getDbname();
        $username = $config->getUsername();
        $password = $config->getPassword();

        try {

            $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return null;
        }
    }

}