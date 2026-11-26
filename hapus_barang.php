<?php
session_start();
if (!isset($_SESSION['role'])) {
    header("location:login.php");
    exit;
}
include "koneksi.php";
$id = (int) $_GET['id'];
mysqli_query($conn, "DELETE FROM barang WHERE id_barang='$id'");
header("location:barang.php");
?>
