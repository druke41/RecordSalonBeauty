<?php
session_start();

require_once "connect.php";
require_once "../class/Records.php";

$id_master = $_GET['master_id'];
$id_date = $_GET['date_id'];
$id_client = $_SESSION['user']['id'];

/** @var  $pdo */
$record = new records($pdo);
$recordRes = $record->record($id_master, $id_client, $id_date);
$recordBusy = $record->updateBusy($id_date);
header("location:../index.php");
exit();

