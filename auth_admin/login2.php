<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['mahasiswa_id'])) {
    header('Location: login2.php');
    exit;
}

require_once 'config/connect.sample.php'; // jika perlu koneksi database
require_once 'config/function.php';       // jika ada fungsi tambahan

$nama = $_SESSION['nama'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Mahasiswa</title>
    <link rel="stylesheet" href="styles.css"> <!-- opsional -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
        }
        .dashboard-container {
            max-width: 800px;
            margin: 60px auto;
            background-color: white;
            padding: 40px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            border-radius: 10px;
        }
        h1 {
            margin-top: 0;
            color: #333;
        }
        .logout-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #d9534f;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .logout-btn:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>

<div class="dashboard-container">
    <h1>Selamat datang, <?= htmlspecialchars($nama); ?>!</h1>
    <p>Ini adalah halaman dashboard Anda.</p>

    <!-- Tambahkan konten dashboard lainnya di sini -->
    <p><strong>Contoh menu:</strong></p>
    <ul>
        <li><a href="#">Lihat Profil</a></li>
        <li><a href="#">Data Nilai</a></li>
        <li><a href="#">Pengaturan Akun</a></li>
    </ul>

    <a class="logout-btn" href="logout.php">Logout</a>
</div>

</body>
</html>
