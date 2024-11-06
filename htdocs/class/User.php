<?php

class User
{
    public PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function login(string $login, string $password): Void
    {
        if (empty($login) || empty($password)) {
            $_SESSION['message'] = 'Введите все данные';
            header('Location: ../index.php');
            exit();
        }

        $sql = "SELECT * FROM users WHERE login = :login AND password = :password";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'login' => $login,
            'password' => $password
        ]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $_SESSION["user"] = [
                'id' => $result['id'],
                'full_name' => $result['full_name'],
                'email' => $result['email'],
                'admin' => $result['admin'],
            ];

            if ($result['admin'] == 1) {
                header("Location: ../admin.php");
            } else {
                header("Location: ../index.php");
            }
        } else {

            $_SESSION['message'] = 'Неверный логин или пароль';
            header('Location: ../index.php');
            exit();
        }
    }

    public function registration(string $fullName, string $login, string $email, string $password): Void
    {
        $sql = "INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`, `avatar`, `admin`) VALUES (NULL, :fullName, :login, :email, :password, NULL, NULL)";
        $result = $this->pdo->prepare($sql);
        try{
            $result -> execute([
                'fullName' => $fullName,
                'login' => $login,
                'email' => $email,
                'password' => $password
            ]);
        } catch (PDOException $e){
            $_SESSION['message'] = "Пользователь с такими логином или адресом электронной почты уже существует!";
            header("Location: ../registr.php");
            exit();
        }
    }

}
