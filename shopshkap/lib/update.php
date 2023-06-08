<?php
session_start();
require "connect.php";
$id = $_POST['id'];
$name = $_POST['name'];
$about = $_POST['about'];
$price = $_POST['price'];
$gencat = $_POST['gencat'];
$category = $_POST['category'];
$sale = $_POST['sale'];
$file = $_FILES['prodfoto'];
$fileName = time() . '_' . $file['name'];
$path = '../img/prodimg/' . $fileName;

$queryUpdate = "UPDATE `products` SET 
`name` = '$name', 
`about` = '$about', 
`price` = '$price', 
`gencat` = '$gencat', 
`category` = '$category', 
`sale` = '$sale' WHERE `products`.`id` = '$id'";
$update = mysqli_query($db, $queryUpdate);


header("Location: /admin.php");
if (move_uploaded_file($file['tmp_name'], $path)) {
    $queryAddFoto = "UPDATE `products` SET `prodfoto`= '$path' where `products`.`id` = '$id'";
    $addFoto = mysqli_query($db, $queryAddFoto);
    if (!$addFoto) {
        die("not update");
    }
}
