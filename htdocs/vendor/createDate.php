<?php
require_once "connect.php";
require_once "../class/Date.php";

$date = $_POST["date"];
$time = $_POST["time"];
$masterId = $_GET["master_id"];

/** @var $pdo */
$createObj = new Date($pdo);
$createDate = $createObj -> createDate($date, $time, $masterId);
header('Location: ../updateDate.php?master_id='.$masterId);
exit();
