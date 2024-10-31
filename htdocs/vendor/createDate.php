<?php
require_once "connect.php";
require_once "../class/Date.php";

$date = $_POST["date"];
$time = $_POST["time"];
$idMaster = $_GET["master_id"];

/** @var $pdo */
$createObj = new date($pdo);
$createDate = $createObj -> addDate($date, $time, $idMaster);
header('Location: ../updateDate.php?master_id='.$idMaster);
exit();
