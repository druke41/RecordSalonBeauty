<?php
session_start();
require_once 'class/Session.php';
require_once 'class/Records.php';
require_once 'vendor/connect.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
    <title>Авторизация и регистрация</title>
</head>

<body>
<?php
$session = new session();
if ($session->getUser() === null) {
    ?>
    <form action="vendor/auth.php" method="post">
        <label>Логин</label>
        <input type="text" placeholder="Введите логин" name="login">
        <label>Пароль</label>
        <input type="password" placeholder="Введите пароль" name="password">
        <button type="submit">Войти</button>
        <p>
            У вас нет аккаунта? - <a href="registr.php">зарегистрируйтесь!</a>
        </p>
        <?php
        if (isset($_SESSION['message'])) {
            echo '<p class="msg">' . $_SESSION['message'] . '</p>';
        }
        unset($_SESSION['message']);
        ?>
    </form>
    <?php
} else { ?>
    <h2><?=$session->getUserName()?></h2>
    <a href="choiseMaster.php">Записаться к мастеру</a>
    <a class="isk" href="vendor/exit.php">Выход</a>

    <table>
        <tr>
            <th>Мастер</th>
            <th>Специализация</th>
            <th>Дата</th>
            <th>Время</th>
        </tr>
        <?php
        $idUser = $_SESSION['user']['id'];
        /** @var $pdo */
        $userRecords = new records($pdo);
        $mainRecord = $userRecords->getUserById($idUser);
        foreach ($mainRecord as $record) {
            $masterInfo = $userRecords->getRecordsFromMaster($record['id_master']);
            $dateInfo = $userRecords->getRecordsFromDate($record['id_date']);
            ?>
            <tr>
                <td><?= $masterInfo['name']; ?></td>
                <td><?= $masterInfo['spec'] ?></td>
                <td><?= $dateInfo['date'] ?></td>
                <td><?= $dateInfo['time'] ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
    <?php
}
?>
</body>
</html>
