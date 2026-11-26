<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin | Royal Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark border-bottom border-warning">
        <div class="container">
            <span class="navbar-brand gold-text fw-bold">ROYAL MANAGEMENT</span>
            <a href="logout.php" class="btn btn-outline-warning btn-sm">Logout</a>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="card p-4">
            <h2 class="gold-text mb-3">Halaman Admin</h2>
            <p class="text-secondary">Selamat datang di panel manajemen Royal Kasir.</p>
            <div class="mt-3 d-flex gap-2">
                <a href="barang.php" class="btn btn-luxury">Kelola Barang</a>
                <a href="tampil_transaksi.php" class="btn btn-outline-warning">Riwayat Transaksi</a>
                <a href="logout.php" class="btn btn-outline-light">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>
