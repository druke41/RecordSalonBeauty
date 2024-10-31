<?php
require_once "vendor/connect.php";
require_once "class/Date.php"
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
    <title>Выбор времени и даты</title>
</head>
<body>

<h1>Добавление записи</h1>

<table>
    <tr>
        <th>Дата</th>
        <th>Время</th>
        <th>Действие</th>
    </tr>
    <?php
    $idMaster = $_GET['master_id'];
    /** @var $pdo */
    $dates = new Date($pdo);
    $getDate = $dates->getDates($idMaster);
    foreach ($getDate as $date) {
        ?>
        <tr>
            <td><?= $date['date'] ?></td>
            <td><?= $date['time'] ?></td>
            <td><a class="btn-book" href="vendor/deleteDate.php?date_id=<?= $date['id'] ?>&master_id=<?= $idMaster ?>">Отменить запись</a></td>
        </tr>
        <?php
    }
    ?>
</table>
<br>
<form action="vendor/createDate.php?master_id=<?= $idMaster ?>" method="post">
    <label>Выбор даты</label>
    <input type="date" name="date">
    <label>Выбор времени</label>
    <input type="time" name="time">
    <br>
    <br>
    <button>Добавить</button>
</form>
<br>
<a href="admin.php">Назад</a>
</body>
</html>
