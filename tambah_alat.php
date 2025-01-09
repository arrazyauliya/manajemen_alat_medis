<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_alat = $_POST['nama_alat'];
    $jenis = $_POST['jenis'];
    $lokasi = $_POST['lokasi'];
    $status = $_POST['status'];
    $tanggal_pengadaan = $_POST['tanggal_pengadaan'];

    $query = "INSERT INTO alat_medis (nama_alat, jenis, lokasi, status, tanggal_pengadaan) 
              VALUES ('$nama_alat', '$jenis', '$lokasi', '$status', '$tanggal_pengadaan')";
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Alat Medis</title>
</head>
<body>
    <h2>Tambah Alat Medis</h2>
    <form method="POST">
        <input type="text" name="nama_alat" placeholder="Nama Alat" required><br>
        <input type="text" name="jenis" placeholder="Jenis Alat" required><br>
        <input type="text" name="lokasi" placeholder="Lokasi" required><br>
        <select name="status" required>
            <option value="aktif">Aktif</option>
            <option value="rusak">Rusak</option>
            <option value="perbaikan">Dalam Perbaikan</option>
        </select><br>
        <input type="date" name="tanggal_pengadaan" required><br>
        <button type="submit">Tambah</button>
    </form>
    <a href="index.php">Kembali</a>
</body>
</html>

<link rel="stylesheet" href="style.css">
