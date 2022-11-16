<?php



include "./connect.php";

if (!isset($_POST["target"])) {
    die("unckown target ");
}
$conn = connect();
$target = $_POST["target"];
$req = "DELETE FROM reser WHERE id='$target' ";
if ($conn->query($req)) {
    header("Location: datas.php");
} else {
    die("there's something wrong  !");
}
