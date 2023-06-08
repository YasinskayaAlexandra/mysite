<?php
session_start();
require "connect.php";
$name = $_POST['name'];
$about = $_POST['about'];
$price = $_POST['price'];
$gencat = $_POST['gencat'];
$category = $_POST['category'];
$sale = $_POST['sale'];
$file = $_FILES['prodfoto'];
$fileName = time() . '_' . $file['name'];
$path = '../img/prodimg/' . $fileName;
$file1 = $_FILES['prodfoto1'];
$fileName1 = time() . '_' . $file1['name'];
$path1 = '../img/prodimg/' . $fileName1;
$file2 = $_FILES['prodfoto2'];
$fileName2 = time() . '_' . $file2['name'];
$path2 = '../img/prodimg/' . $fileName2;
$file3 = $_FILES['prodfoto3'];
$fileName3 = time() . '_' . $file3['name'];
$path3 = '../img/prodimg/' . $fileName3;

if ($name == null || $about == null || $price == null) {
    die('Не все поля не заполнены');
}

$queryAdd = "INSERT INTO `products`
(`id`, `name`, `about`, `price`, `gencat`, `category`, `sale`, `prodfoto`, `prodfoto1`, `prodfoto2`, `prodfoto3`) VALUES 
(NULL, '$name', '$about', '$price', '$gencat', '$category', '$sale', '$path', '$path1', '$path2', '$path3')";
$add = mysqli_query($db, $queryAdd);

if (move_uploaded_file($file['tmp_name'], $path)) {
    $queryAddFoto = "UPDATE `products` SET `prodfoto`= '$path' where `products`.`id` = '$id'";
    $addFoto = mysqli_query($db, $queryAddFoto);
    if (!$addFoto) {
        die("not update");
    }
}
if (move_uploaded_file($file1['tmp_name'], $path1)) {
    $queryAddFoto = "UPDATE `products` SET `prodfoto1`= '$path1' where `products`.`id` = '$id'";
    $addFoto = mysqli_query($db, $queryAddFoto);
    if (!$addFoto) {
        die("not update");
    }
}

if (move_uploaded_file($file2['tmp_name'], $path2)) {
    $queryAddFoto = "UPDATE `products` SET `prodfoto2`= '$path2' where `products`.`id` = '$id'";
    $addFoto = mysqli_query($db, $queryAddFoto);
    if (!$addFoto) {
        die("not update");
    }
}

if (move_uploaded_file($file3['tmp_name'], $path3)) {
    $queryAddFoto = "UPDATE `products` SET `prodfoto3`= '$path3' where `products`.`id` = '$id'";
    $addFoto = mysqli_query($db, $queryAddFoto);
    if (!$addFoto) {
        die("not update");
    }
    header("Location: /admin.php");
}
