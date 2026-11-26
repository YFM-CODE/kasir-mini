<div align="center">

# 👑 ROYAL KASIR — Aplikasi Kasir Mini

**Sistem Informasi Kasir & Manajemen Barang Berbasis Web dengan Tema Luxury Dark & Gold**

[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![Bootstrap](https://img.shields.io/badge/Bootstrap_5.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com/)
[![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/HTML)
[![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/CSS)
[![Status](https://img.shields.io/badge/Status-Active-D4AF37?style=for-the-badge)](#)
[![License](https://img.shields.io/badge/License-MIT-1a1a1a?style=for-the-badge)](#lisensi)

</div>

---

## 📖 Tentang Proyek

**Royal Kasir (Kasir Mini)** adalah aplikasi Point of Sale (POS) / kasir berbasis web sederhana menggunakan **PHP Native**, **MySQL/MariaDB**, dan **Bootstrap 5** dengan desain antarmuka elegan bertema *Luxury Dark & Gold*. Aplikasi ini mendukung pemisahan hak akses (*Multi-Role*) antara **Admin** dan **Kasir**.

---

## ✨ Fitur Utama

- 🔐 **Autentikasi Multi-Role (`Admin` & `Kasir`)** — Pengarahan halaman otomatis sesuai peran pengguna saat login beserta proteksi session.
- 📦 **Manajemen Data Barang (`Admin`)** — Menambahkan barang baru (nama, harga, stok), menampilkan daftar inventaris, dan menghapus data barang.
- 💳 **Transaksi Kasir & Kalkulasi Diskon (`Kasir`)** — Menghitung total belanja secara otomatis berdasarkan persentase diskon (`%`), memvalidasi kecukupan nominal pembayaran, serta menghitung uang kembalian.
- 🧾 **Struk & Riwayat Transaksi** — Mencatat setiap transaksi ke dalam database lengkap dengan *timestamp* dan menyajikannya dalam tabel riwayat transaksi.
- 🎨 **Tema UI Luxury Gold & Dark** — Menggunakan kombinasi warna gelap (`#121212`) dengan aksen emas (`#D4AF37`) dan tipografi *Playfair Display*.

---

## 🗂️ Struktur File Proyek

```text
kasir-mini/
├── index.php              # Halaman sambutan utama (Landing Page)
├── login.php              # Halaman form login pengguna
├── proses_login.php       # Pemrosesan autentikasi & pembuatan session role
├── logout.php             # Penghapusan session & keluar dari sistem
├── admin.php              # Dashboard khusus role Admin
├── barang.php             # Halaman CRUD tambah, tampil, & kelola stok barang
├── hapus_barang.php       # Endpoint penghapusan data barang berdasarkan ID
├── kasir.php              # Halaman form input transaksi untuk role Kasir
├── proses_transaksi.php   # Kalkulasi diskon, kembalian, & cetak struk pembayaran
├── tampil_transaksi.php   # Tabel riwayat seluruh transaksi
├── koneksi.php            # Konfigurasi koneksi database MySQL (mini_kasirr)
├── style.css              # Stylesheet utama bertema Luxury Dark & Gold
├── kasir-mini.sql         # Skema database & data awal (seeding)
└── README.md              # Dokumentasi proyek
```

---

## ⚙️ Persyaratan Sistem

- **PHP** >= 7.4 / 8.x (XAMPP / Laragon / WAMP / PHP Built-in Server)
- **MySQL** atau **MariaDB**
- **Web Browser** modern (Chrome, Edge, Firefox)

---

## 🚀 Panduan Instalasi & Menjalankan Aplikasi

### 1. Clone Repository
```bash
git clone https://github.com/YFM-CODE/kasir-mini.git
cd kasir-mini
```

### 2. Import Database
1. Pastikan service **MySQL / MariaDB** pada XAMPP/Laragon sudah aktif.
2. Buat database atau langsung import file `kasir-mini.sql` melalui **phpMyAdmin**, **HeidiSQL**, atau terminal:
   ```bash
   mysql -u root < kasir-mini.sql
   ```
   > File `kasir-mini.sql` secara otomatis akan membuat database `mini_kasirr`, keempat tabel (`users`, `barang`, `transaksi`, `detail_transaksi`), beserta akun default dan contoh data barang.

### 3. Periksa Konfigurasi Koneksi
Pastikan pengaturan di `koneksi.php` sesuai dengan kredensial MySQL lokal Anda:
```php
$conn = mysqli_connect("localhost", "root", "", "mini_kasirr");
```

### 4. Jalankan Aplikasi
- **Menggunakan PHP Built-in Server:**
  ```bash
  php -S 127.0.0.1:8000
  ```
  Lalu buka `http://127.0.0.1:8000` di browser.
- **Menggunakan XAMPP (`htdocs`):**
  Letakkan folder `kasir-mini` di dalam `htdocs`, nyalakan Apache, lalu akses `http://localhost/kasir-mini`.

---

## 🔑 Akun Demo Default

Gunakan akun berikut untuk masuk ke dalam sistem melalui halaman `login.php`:

| Role | Username | Password | Hak Akses Utama |
| :--- | :--- | :--- | :--- |
| **Admin** | `admin` | `admin123` | Dashboard Admin, Kelola Barang (Tambah/Hapus), & Lihat Riwayat Transaksi |
| **Kasir** | `kasir` | `kasir123` | Input Transaksi Penjualan, Kalkulasi Diskon/Kembalian, & Riwayat Transaksi |

---

## 🗄️ Skema Tabel Database (`mini_kasirr`)

- **`users`** — Menyimpan data akun pengguna (`id_user`, `username`, `password`, `role`).
- **`barang`** — Menyimpan daftar barang (`id_barang`, `nama_barang`, `harga`, `stok`).
- **`transaksi`** — Menyimpan kepala riwayat transaksi (`id_transaksi`, `tanggal`, `total`, `bayar`, `kembalian`, `user_id`).
- **`detail_transaksi`** — Struktur tabel rincian item transaksi (`id_detail`, `transaksi_id`, `barang_id`, `jumlah`, `harga`, `subtotal`).

---

## 📄 Lisensi

Proyek ini dilisensikan di bawah **MIT License** — bebas digunakan untuk keperluan pembelajaran dan pengembangan lebih lanjut.
