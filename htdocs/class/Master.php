<?php

class Master
{
    public PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getMasters(): Array
    {
        $sql = "SELECT * FROM masters";
        $result = $this->pdo->prepare($sql);
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createMaster(string $masterName, string $masterSpecialization): Void
    {
        $sql = "INSERT INTO `masters` (`id`, `name`, `spec`) VALUES (NULL, '$masterName', '$masterSpecialization')";
        $result = $this->pdo->prepare($sql);
        $result->execute();
    }
}
