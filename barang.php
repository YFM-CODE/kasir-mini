<?php
session_start();
if (!isset($_SESSION['role'])) {
    header("location:login.php");
    exit;
}
include "koneksi.php";

// Proses Simpan
if (isset($_POST['nama'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $harga = (int) $_POST['harga'];
    $stok = (int) $_POST['stok'];
    mysqli_query($conn, "INSERT INTO barang (nama_barang, harga, stok) VALUES ('$nama', '$harga', '$stok')");
    header("location:barang.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Kelola Barang | Royal Management</title>
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
            <h3 class="gold-text mb-3">Kelola Barang</h3>
            <form method="POST" class="row g-3 mb-4">
                <div class="col-md-5">
                    <label class="form-label small">Nama Barang</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label small">Harga (Rp)</label>
                    <input type="number" name="harga" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label small">Stok</label>
                    <input type="number" name="stok" class="form-control" required>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-luxury w-100">Simpan</button>
                </div>
            </form>

            <table class="table table-dark table-bordered table-hover align-middle">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data = mysqli_query($conn, "SELECT * FROM barang");
                    while ($d = mysqli_fetch_array($data)) {
                        $hargaFormat = number_format($d['harga'], 0, ',', '.');
                        echo "<tr>
                                <td>{$d['nama_barang']}</td>
                                <td>Rp {$hargaFormat}</td>
                                <td>{$d['stok']}</td>
                                <td class='text-center'>
                                    <a href='hapus_barang.php?id={$d['id_barang']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Hapus barang ini?')\">Hapus</a>
                                </td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
            <div class="mt-2">
                <a href="admin.php" class="btn btn-outline-warning btn-sm">Kembali ke Admin</a>
            </div>
        </div>
    </div>
</body>
</html>
