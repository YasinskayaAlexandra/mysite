<?php
session_start();
require "connect.php";
if (($_SESSION['user'] ?? '') === '') { ?>
    <p>Авторизируйтесь, пожалуйста, чтобы добавить товар в корзину</p>
    <a href="javascript:history.back()">Вернуться</a>
<? die();
} else {
    $userId = $_SESSION['user']['id'];
    $infoId = $_POST["id"];

    $queryAddCart = "INSERT INTO `myorder` (`id`, `userId`, `infoId`) VALUES (NULL, '$userId', '$infoId')";
    $addCart = mysqli_query($db, $queryAddCart);
};
?>
<p>Товар добавлен</p>
<a href="javascript:history.back()">Вернуться</a>