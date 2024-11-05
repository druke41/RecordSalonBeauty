<?php
session_start();

require_once "../class/User.php";
require_once "connect.php";

$login = $_POST["login"];
$password = md5($_POST["password"]);

/** @var  $pdo */
$userAuth = new User($pdo);
$userAuth->login($login, $password);
