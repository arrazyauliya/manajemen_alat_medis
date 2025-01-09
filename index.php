<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Fetch data alat medis
$query = "SELECT * FROM alat_medis";
$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manajemen Alat Medis</title>
</head>
<body>
    <h2>Selamat Datang, <?= $_SESSION['username']; ?>!</h2>
    
    <h3>Data Alat Medis</h3>
    <a href="tambah_alat.php">Tambah Alat</a>
    <table border="1">
        <tr>
            <th>Nama Alat</th>
            <th>Jenis</th>
            <th>Lokasi</th>
            <th>Status</th>
            <th>Tanggal Pengadaan</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $row['nama_alat']; ?></td>
            <td><?= $row['jenis']; ?></td>
            <td><?= $row['lokasi']; ?></td>
            <td><?= $row['status']; ?></td>
            <td><?= $row['tanggal_pengadaan']; ?></td>
            <td>
                <a href="edit_alat.php?id=<?= $row['id']; ?>">Edit</a>
                <a href="hapus_alat.php?id=<?= $row['id']; ?>" onclick="return confirm('Hapus alat ini?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <!-- Logout di bagian bawah -->
    <a href="logout.php">Logout</a>
</body>
</html>

<link rel="stylesheet" href="style.css">