<?php
require_once "connect.php";
require_once "../class/Masters.php";

$masterName = $_POST['masterName'];
$masterSpecialization = $_POST['masterSpecialization'];

/** @var  $pdo */
$master = new masters($pdo);
$master->createMaster($masterName, $masterSpecialization);
header("location: ../admin.php");
exit();
