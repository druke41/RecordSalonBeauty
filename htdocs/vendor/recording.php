<?php
session_start();

require_once "connect.php";
require_once "../class/Record.php";

$masterId = $_GET['master_id'];
$dateId = $_GET['date_id'];
$clientId = $_SESSION['user']['id'];

/** @var  $pdo */
$record = new Record($pdo);
$recordRes = $record->record($masterId, $clientId, $dateId);
$recordBusy = $record->updateBusy($dateId);
header("location:../index.php");
exit();

