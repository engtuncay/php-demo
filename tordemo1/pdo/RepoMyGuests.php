<?php
class RepoMyGuests extends AbsTorRepoPdo
{
    public function __construct(string $connProfile)
    {
        parent::__construct(ConfigStore::getConfig($connProfile));
        $this->setConnProfile($connProfile);
    }

    public function selectGuest() : ?Array
    {
        $sql = "SELECT * FROM myguests";

        try {
            $stmt = $this->getConn()->prepare($sql);
            $result = $stmt->execute();
            $rows = $stmt->fetchAll(); // assuming $result == true
            return $rows;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return null;
        }
    }


}