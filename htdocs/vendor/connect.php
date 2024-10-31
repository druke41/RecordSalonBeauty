<?php
$host = '127.0.0.1';
$userName = 'root';
$pass = '';
$dbname = 'record';

$pdo = new PDO("mysql:host=$host;dbname=$dbname;", $userName, $pass);
