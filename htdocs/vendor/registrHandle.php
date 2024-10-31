<?php
session_start();

require_once "connect.php";
require_once "../class/User.php";

$fullName = $_POST['fullName'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$passwordConfirm = md5($_POST['passwordConfirm']);

/** @var  $pdo */
$userRegistration = new User($pdo);

if ($password == $passwordConfirm) {
    $userRegistration->registration($fullName, $login, $email, $password);
    header("location: ../index.php");
    exit();
} else {
    $_SESSION['message'] = "Пароли не совпадают";
    header("location: ../registr.php");
    exit();
}

