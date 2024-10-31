<?php
require_once "vendor/connect.php";
require_once "class/Date.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
    <title>Выбор времени и даты</title>
</head>
<body>

<h1>Выбор времени и даты</h1>

<table>
    <a href="choiseMaster.php">Назад</a>
    <tr>
        <th>Дата</th>
        <th>Время</th>
        <th>Действие</th>
    </tr>
    <?php
    $master_id = $_GET["master_id"];
    /** @var $pdo */
    $addDate = new date($pdo);
    $dates = $addDate ->getDates($master_id);
    foreach ($dates as $date) {
        ?>
        <tr>
            <td><?= $date['date']?></td>
            <td><?= $date['time'] ?></td>
            <td><a class="btn-book" href="vendor/recording.php?master_id=<?=$master_id?>&date_id=<?=$date['id']?>">Записаться</a></td>
        </tr>
        <?php
    }
    ?>
</table>

</body>
</html>
