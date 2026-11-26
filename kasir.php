<?php
session_start();
if (!isset($_SESSION['role'])) {
    header("location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Kasir | Royal Management</title>
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
            <h2 class="gold-text mb-4">Halaman Kasir</h2>
            <form method="POST" action="proses_transaksi.php">
                <div class="mb-3">
                    <label class="form-label">Harga Barang (Rp)</label>
                    <input type="number" name="harga" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Diskon (%)</label>
                    <input type="number" name="diskon" class="form-control" value="0" min="0" max="100">
                </div>
                <div class="mb-3">
                    <label class="form-label">Bayar (Rp)</label>
                    <input type="number" name="bayar" class="form-control" required>
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-luxury">Proses Transaksi</button>
                    <a href="tampil_transaksi.php" class="btn btn-outline-warning">Lihat Riwayat</a>
                    <a href="logout.php" class="btn btn-outline-light">Logout</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
