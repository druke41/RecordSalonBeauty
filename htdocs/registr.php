<?php
session_start();
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
    <title>Авторизация и регистрация</title>
</head>
<body>
<form action="vendor/registrHandle.php" method="POST" enctype="multipart/form-data">
    <label>ФИО</label>
    <input type="text" placeholder="Введите свое фио" name="fullName">
    <label>Логин</label>
    <input type="text" placeholder="Введите логин" name="login">
    <label>Почта</label>
    <input type="email" placeholder="Введите свою почту" name="email">
    <label>Пароль</label>
    <input type="password" placeholder="Введите пароль" name="password">
    <label>Подтверждение пароля</label>
    <input type="password" placeholder="Подтвердите пароль" name="passwordConfirm">
    <button type="submit">Зарегистрироваться</button>
    <p>
        У вас уже есть аккаунт? - <a href="index.php">авторизируйтесь!</a>
    </p>
<?php
    if (isset($_SESSION['message'])) {

        echo '<p class="msg">' . $_SESSION['message'] . '</p>';
    }
    unset($_SESSION['message']);
    ?>
</form>
</body>
</html>
