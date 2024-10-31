<?php
require_once 'connect.php';
require_once '../class/Date.php';


$idDate = $_GET['date_id'];
$masterId = $_GET['master_id'];
/** @var  $pdo */
$date = new Date($pdo);
$result = $date->deleteDate($idDate,$masterId);
header('Location: ../updateDate.php?master_id=' . $masterId);
exit();
