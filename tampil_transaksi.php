<?php
session_start();
if (!isset($_SESSION['role'])) {
    header("location:login.php");
    exit;
}
include "koneksi.php";
$kembaliUrl = ($_SESSION['role'] === 'admin') ? 'admin.php' : 'kasir.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Riwayat Transaksi | Royal Kasir</title>
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
            <h3 class="gold-text mb-3">Riwayat Transaksi</h3>
            <table class="table table-dark table-bordered table-hover align-middle">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Bayar</th>
                        <th>Kembali</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data = mysqli_query($conn, "SELECT * FROM transaksi ORDER BY tanggal DESC");
                    while ($d = mysqli_fetch_array($data)) {
                        $totalFmt = number_format($d['total'], 0, ',', '.');
                        $bayarFmt = number_format($d['bayar'], 0, ',', '.');
                        $kembalianFmt = number_format($d['kembalian'], 0, ',', '.');
                        echo "<tr>
                                <td>{$d['tanggal']}</td>
                                <td>Rp {$totalFmt}</td>
                                <td>Rp {$bayarFmt}</td>
                                <td>Rp {$kembalianFmt}</td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
            <div class="mt-2">
                <a href="<?= $kembaliUrl ?>" class="btn btn-outline-warning btn-sm">Kembali</a>
            </div>
        </div>
    </div>
</body>
</html>
