<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$query = "DELETE FROM alat_medis WHERE id = $id";

if (mysqli_query($koneksi, $query)) {
    header("Location: index.php");
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>

<link rel="stylesheet" href="style.css">


