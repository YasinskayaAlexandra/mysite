<?
session_start();
require "connect.php";
$login = $_POST['login'];
$password = $_POST['password'];

if ($login == null || $password == null) {
?>
    <p>Введите данные</p>
    <a href="/src/formauth.php">Вернуться</a>
<?php die();
}

$queryUser = "SELECT * FROM `users` where `users`.`login` = '$login'";
$mbUser = mysqli_query($db, $queryUser);
$mbUser = mysqli_fetch_assoc($mbUser);

if (!$mbUser) { ?>
    <p>Пользователь не найден</p>
    <a href="/src/formauth.php">Вернуться</a>
<?php die();
}

$queryUser = "SELECT * FROM `users` where `users`.`login` = '$login' AND `users`.`password` = '$password'";
$mbUser = mysqli_query($db, $queryUser);
$mbUser = mysqli_fetch_assoc($mbUser);

if (!$mbUser) { ?>
    <p>Неверный логин или пароль</p>
    <a href="/src/formauth.php">Вернуться</a>
<?php die();
}


if ($mbUser) {
    $_SESSION['user'] = [
        'id' => $mbUser['id'],
        'name' => $mbUser['name'],
        'surname' => $mbUser['surname'],
        'login' => $mbUser['login'],
        'role' => $mbUser['role']
    ];
}
header("Location: /index.php");
