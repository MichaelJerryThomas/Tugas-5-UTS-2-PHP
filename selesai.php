<?php
include 'config.php';
$id = $_GET["id"];
$query = "UPDATE todolist SET selesai = 1 WHERE id = $id";
mysqli_query($koneksi, $query);

header("Location: todolist.php");
