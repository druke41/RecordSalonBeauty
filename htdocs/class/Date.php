<?php

class Date
{
    public PDO $pdo;

    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getDates(string $id_master): Array
    {
        $sql = "SELECT id, date, time FROM date WHERE id_master = :id_master AND busy = :busy";
        $result = $this->pdo->prepare($sql);
        $result->execute([
            ":id_master" => $id_master,
            ":busy" => 0,
        ]);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addDate(string $date, string $time, string $id_master): Void
    {
        $sql = "INSERT INTO `date` (`id`, `date`, `time`, `busy`, `id_master`) VALUES (NULL, :date, :time, 0, :id_master)";
        $result = $this->pdo->prepare($sql);
        $result->execute([
            ":date" => $date,
            ":time" => $time,
            ":id_master" => $id_master,
        ]);
    }

    public function deleteDate(string $idDate, string $id_master): Void
    {
        $sql = "DELETE FROM `date` WHERE `id` = '$idDate'";
        $result = $this->pdo->prepare($sql);
        $result->execute();
    }
}
