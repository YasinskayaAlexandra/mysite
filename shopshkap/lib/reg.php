<?
session_start();
require "connect.php";
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$login = $_POST['login'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];

if ($name == null || $surname == null || $email == null || $login == null || $password == null) {
?>
    <p>Не все поля заполнены</p>
    <a href="/src/formreg.php">Вернуться</a>
<? die();
} elseif ($password !== $confirm) {
?>
    <p>Пароль неверен</p>
    <a href="/src/formreg.php">Вернуться</a>
<? die();
}

$queryUser = "SELECT * FROM `users` where `users`.`login` = '$login'";
$mbUser = mysqli_query($db, $queryUser);
$mbUser = mysqli_fetch_assoc($mbUser);

if (!$mbUser) {
    $queryAdd = "INSERT INTO `users` (`id`, `name`, `surname`, `email`, `login`, `password`) 
    VALUES (NULL, '$name', '$surname', '$email', '$login', '$password')";
    $add = mysqli_query($db, $queryAdd);
    header("Location: /src/formauth.php");
} elseif ($mbUser) {
?>
    <p>Такой пользователь уже есть</p>
    <a href="/src/formreg.php">Вернуться</a>
<? die();
}
?>