<?php
session_start();
require_once 'vendor/connect.php';
require_once "class/Masters.php";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
    <title>Выбор мастера</title>
</head>
<body>

<h1>Выбор мастера</h1>

<table>
    <tr>
        <th>Имя мастера</th>
        <th>Специализация</th>
        <th>Действие</th>
    </tr>
    <?php
    /** @var $pdo */
    $masters = new masters($pdo);
    $masterRes = $masters->getMasters();
    foreach ($masterRes as $master) {
        ?>
        <tr>
            <td><?= $master['name'] ?></td>
            <td><?= $master['spec'] ?></td>
            <td><a href="choiceDate.php?master_id=<?=$master['id']?>">Выбор даты</a></td>
        </tr>
        <?php
    }
    ?>
</table>

</body>
</html>
