<?php
session_start();

require_once "../class/User.php";
require_once "connect.php";

$login = $_POST["login"];
$password = md5($_POST["password"]);

/** @var  $pdo */
$user_auth = new User($pdo);
$user_auth->login($login, $password);
