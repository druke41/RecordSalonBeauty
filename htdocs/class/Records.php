<?php

class records
{
    public PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUserById(string $idUser): Array
    {
        $sql = "SELECT * FROM records WHERE id_client = :id";
        $result = $this->pdo->prepare($sql);
        $result->execute([
            ":id" => $idUser
        ]);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getRecordsFromMaster(string $id): Array
    {
        $sql = "SELECT * FROM masters WHERE id = :id";
        $result = $this->pdo->prepare($sql);
        $result->execute([
            ":id" => $id
        ]);
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    public function getRecordsFromDate(string $id): Array
    {
        $sql = "SELECT * FROM date WHERE id = :id";
        $result = $this->pdo->prepare($sql);
        $result->execute([
            ":id" => $id,
        ]);
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    public function record(string $id_master, string $id_client, string $id_date): Void
    {
        $sql = "INSERT INTO `records` (`id`, `id_master`, `id_client`, `id_date`) VALUES (NULL, :id_master, :id_client, :id_date)";
        $result = $this->pdo->prepare($sql);
        $result->execute([
            ":id_master" => $id_master,
            ":id_client" => $id_client,
            ":id_date" => $id_date,
        ]);
    }
    public function updateBusy(string $id_date): Void
    {
        $sql = "UPDATE `date` SET `busy` = '1' WHERE `date`.`id` = :id_date";
        $result = $this->pdo->prepare($sql);
        $result->execute([
            ":id_date" => $id_date,
        ]);
    }
}
