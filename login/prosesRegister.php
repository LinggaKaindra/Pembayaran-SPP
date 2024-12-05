<?php
session_start();
include "../koneksi.php";


$username = $_POST['username'];
$password = $_POST['password'];
var_dump($username);
var_dump($password);
// Cek apakah form sudah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    
    // Validasi input
    if (empty($username) || empty($password) || empty($role)) {
        $_SESSION['error'] = "Semua field harus diisi!";
        header("Location: register.php");
        exit;
    }

    // Cek apakah username sudah ada
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['error'] = "Username sudah terdaftar!";
        header("Location: register.php");
        exit;
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Simpan data ke database
    $query = "INSERT INTO users (username, password, role) VALUES ('$username', '$hashedPassword', 'petugas')";
    if (mysqli_query($koneksi, $query)) {
        $_SESSION['success'] = "Registrasi berhasil! Silakan login.";
        header("Location: login.php");
    } else {
        $_SESSION['error'] = "Gagal registrasi: " . mysqli_error($koneksi);
        header("Location: register.php");
    }
    exit;
}
?>
