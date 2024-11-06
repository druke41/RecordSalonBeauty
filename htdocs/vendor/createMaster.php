<?php
require_once "connect.php";
require_once "../class/Master.php";

$masterName = $_POST['masterName'];
$masterSpecialization = $_POST['masterSpecialization'];

/** @var  $pdo */
$master = new Master($pdo);
$master->createMaster($masterName, $masterSpecialization);
header("location: ../admin.php");
exit();
