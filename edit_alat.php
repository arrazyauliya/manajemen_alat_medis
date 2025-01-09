<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$query = "SELECT * FROM alat_medis WHERE id = $id";
$result = mysqli_query($koneksi, $query);
$alat = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_alat = $_POST['nama_alat'];
    $jenis = $_POST['jenis'];
    $lokasi = $_POST['lokasi'];
    $status = $_POST['status'];
    $tanggal_pengadaan = $_POST['tanggal_pengadaan'];

    $query = "UPDATE alat_medis SET 
                nama_alat = '$nama_alat', 
                jenis = '$jenis', 
                lokasi = '$lokasi', 
                status = '$status', 
                tanggal_pengadaan = '$tanggal_pengadaan'
              WHERE id = $id";
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
    <title>Edit Alat Medis</title>
</head>
<body>
    <h2>Edit Alat Medis</h2>
    <form method="POST">
        <input type="text" name="nama_alat" value="<?= $alat['nama_alat']; ?>" required><br>
        <input type="text" name="jenis" value="<?= $alat['jenis']; ?>" required><br>
        <input type="text" name="lokasi" value="<?= $alat['lokasi']; ?>" required><br>
        <select name="status" required>
            <option value="aktif" <?= $alat['status'] == 'aktif' ? 'selected' : ''; ?>>Aktif</option>
            <option value="rusak" <?= $alat['status'] == 'rusak' ? 'selected' : ''; ?>>Rusak</option>
            <option value="perbaikan" <?= $alat['status'] == 'perbaikan' ? 'selected' : ''; ?>>Dalam Perbaikan</option>
        </select><br>
        <input type="date" name="tanggal_pengadaan" value="<?= $alat['tanggal_pengadaan']; ?>" required><br>
        <button type="submit">Simpan</button>
    </form>
    <a href="index.php">Kembali</a>
</body>
</html>

<link rel="stylesheet" href="style.css">


