<?php 

require "../../functions.php";

if (isset($_POST["submit"])) {
    
    if (regisPeng($_POST)) {
        header("location: index.php");
    }else{
      echo "<script>alert('Terjadi kesalahan: " . mysqli_error($conn) . "');</script>";
    }
}

?>

<!DOCTYPE html>
<!-- Deklarasi tipe dokumen HTML5 -->
<html lang="en">
<!-- Elemen <html> adalah elemen root dokumen HTML. Atribut lang="en" menunjukkan bahwa dokumen menggunakan Bahasa Inggris -->

<head>
    <!-- Elemen <head> berisi metadata halaman dan elemen yang tidak langsung ditampilkan di halaman -->
    <meta charset="UTF-8">
    <!-- Menentukan karakter encoding dokumen sebagai UTF-8 untuk mendukung berbagai karakter -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Menginstruksikan browser untuk menggunakan mode kompatibilitas terbaru -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Mengatur agar halaman responsif dengan lebar sesuai perangkat pengguna -->
    <link rel="stylesheet" href="../../Assets/CSS/LoginPetugasSiswaStyle.css">
    <!-- Menyisipkan file CSS eksternal untuk memberikan gaya pada halaman -->
    <title>Registrasi Petugas</title>
    <!-- Menentukan judul halaman yang akan ditampilkan di tab browser -->
</head>

<body>
    <!-- Elemen <body> berisi konten utama yang akan ditampilkan di browser -->
    <div class="wrapper">
        <!-- Elemen <div> dengan class "wrapper" digunakan untuk membungkus seluruh konten form -->
        <header>Halaman Registrasi Pengguna</header>
        <!-- Elemen <header> digunakan untuk menampilkan judul halaman -->

        <form action="" method="post">
            <!-- Elemen <form> digunakan untuk mengirimkan data registrasi pengguna -->
            <div class="field username">
                <!-- Elemen <div> dengan class "field username" digunakan untuk membungkus input username -->
                <div class="input-area">
                    <!-- Elemen <div> dengan class "input-area" digunakan untuk membungkus elemen input -->
                    <input type="text" name="username" id="username" autocomplete="off" placeholder="Username">
                    <!-- Elemen <input> digunakan untuk memasukkan username -->
                </div>
            </div>

            <div class="field email">
                <!-- Elemen <div> dengan class "field email" digunakan untuk membungkus input email -->
                <div class="input-area">
                    <input type="email" name="email" id="email" autocomplete="off" placeholder="Email">
                    <!-- Elemen <input> digunakan untuk memasukkan email -->
                </div>
            </div>

            <div class="field password">
                <!-- Elemen <div> dengan class "field password" digunakan untuk membungkus input password -->
                <div class="input-area">
                    <input type="password" name="password" id="password" autocomplete="off" placeholder="Password">
                    <!-- Elemen <input> digunakan untuk memasukkan password -->
                    <button type="button" id="togglePassword" class="toggle-password">👁️</button>
                    <!-- Elemen <button> digunakan untuk menampilkan atau menyembunyikan password -->
                </div>
            </div>

            <div class="field role">
                <!-- Elemen <div> dengan class "field role" digunakan untuk membungkus pemilihan role -->
                <div class="select-area">
                    <!-- Elemen <div> dengan class "select-area" digunakan untuk membungkus elemen select -->
                    <select name="level" id="level">
                        <!-- Elemen <select> digunakan untuk memilih peran (role) pengguna -->
                        <option value="admin">Admin</option>
                        <!-- Elemen <option> untuk peran admin -->
                        <option value="petugas">Petugas</option>
                        <!-- Elemen <option> untuk peran petugas -->
                    </select>
                </div>
            </div>

            <input type="submit" name="submit" value="Kirim">
            <!-- Elemen <input> dengan tipe "submit" digunakan untuk mengirimkan form -->
        </form>
    </div>

    <script src="../../Assets/JS/togglePassword.js"></script>
    <!-- Elemen <script> digunakan untuk menyisipkan file JavaScript eksternal untuk fitur toggle password -->
</body>
</html>
