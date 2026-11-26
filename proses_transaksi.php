<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header("location:login.php");
    exit;
}
include "koneksi.php";

function hitungDiskon($harga, $diskon) {
    return $harga - ($harga * ($diskon / 100));
}

if (isset($_POST['harga'])) {
    $harga = (int) $_POST['harga'];
    $diskon = (float) $_POST['diskon'];
    $bayar = (int) $_POST['bayar'];
    $user_id = (int) $_SESSION['id_user'];

    $total = (int) hitungDiskon($harga, $diskon);
    $kembalian = $bayar - $total;

    if ($bayar < $total) {
        echo "<script>alert('Uang tidak cukup!'); window.history.back();</script>";
        exit;
    } else {
        mysqli_query($conn, "INSERT INTO transaksi (total, bayar, kembalian, user_id) 
                             VALUES ('$total', '$bayar', '$kembalian', '$user_id')");
    }
} else {
    header("location:kasir.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Struk Transaksi | Royal Kasir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card p-4 mx-auto" style="max-width: 500px;">
            <h3 class="gold-text mb-3">Transaksi Berhasil</h3>
            <p class="mb-2">Total Belanja: <strong>Rp <?= number_format($total, 0, ',', '.') ?></strong></p>
            <p class="mb-2">Dibayar: <strong>Rp <?= number_format($bayar, 0, ',', '.') ?></strong></p>
            <p class="mb-4">Kembalian: <strong class="gold-text">Rp <?= number_format($kembalian, 0, ',', '.') ?></strong></p>
            <div class="d-flex gap-2">
                <a href="kasir.php" class="btn btn-luxury">Kembali ke Kasir</a>
                <a href="tampil_transaksi.php" class="btn btn-outline-warning">Lihat Riwayat</a>
            </div>
        </div>
    </div>
</body>
</html>
