<?php
session_start();
$i = $_GET["kunci"];

$_SESSION["daftar"][$i] = [
    "nama" => $_POST["nama"],
    "umur" => $_POST["umur"]
];

header("Location: dashboard.php");
?>