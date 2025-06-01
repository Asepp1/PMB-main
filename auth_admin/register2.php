<?php
require_once 'config/connect.sample.php';

if (isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO mahasiswa (nama, email, username, password) VALUES (?, ?, ?, ?)");
    $result = $stmt->execute([$nama, $email, $username, $password]);

    if ($result) {
        header("Location: login2.php?register=success");
    } else {
        echo "Gagal mendaftar!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrasi Mahasiswa</title>
</head>
<body>
    <h2>Form Registrasi</h2>
    <form method="POST" action="">
        <label>Nama Lengkap:</label><br>
        <input type="text" name="nama" required><br>
        <label>Email:</label><br>
        <input type="email" name="email" required><br>
        <label>Username:</label><br>
        <input type="text" name="username" required><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit" name="register">Daftar</button>
    </form>
</body>
</html>
