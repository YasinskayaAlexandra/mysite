<?php
require "connect.php";
$id = $_POST['id'];

$queryDelete = "DELETE FROM `myorder` where `myorder`.`id` = '$id'";
$delete = mysqli_query($db, $queryDelete);
header("Location: /src/profile.php");
