<?php
require "connect.php";
$id = $_POST['id'];

$queryDelete = "DELETE FROM `products` where `products`.`id` = '$id'";
$delete = mysqli_query($db, $queryDelete);
header("Location: /admin.php");
