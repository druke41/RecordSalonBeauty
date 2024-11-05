<?php
session_start();
require_once "vendor/connect.php";
require_once "class/Session.php";
require_once "class/Master.php";
$session = new Session();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Админка</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<h2><?= $session->getUserName() ?></h2>
<a class="isk" href="vendor/exit.php">Выход</a>
<table>
    <tr>
        <th>Мастер</th>
        <th>Действие</th>
    </tr>
    <?php
    /** @var $pdo */
    $masters = new Master($pdo);
    $getMasters = $masters->getMasters();
    foreach ($getMasters as $master) {
        ?>
        <tr>
            <td><?= $master['name'] ?></td>
            <td><a href="updateDate.php?master_id=<?= $master['id'] ?>">Перейти</a></td>
        </tr>
        <?php
    }
    ?>
</table>
<br>
<form action="vendor/createMaster.php" method="post">
    <p>Добавить мастера</p>
    <label>ФИО</label>
    <input type="text" name="masterName">
    <label>Специализация</label>
    <input type="text" name="masterSpecialization">
    <button>Добавить мастера</button>
</form>
</body>
</html>
