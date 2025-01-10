<?php 

require "../../functions.php";

if (isset($_POST["submit"])) {
    
    if (tambahProdi($_POST)) {
        header("location: index.php");
    }
}

?>

<!DOCTYPE html>
<!-- Deklarasi tipe dokumen HTML5 untuk memastikan browser merender halaman menggunakan standar HTML5 -->
<html lang="en">
<!-- Tag pembuka HTML dengan atribut lang="en" yang menunjukkan bahasa dokumen adalah Bahasa Inggris -->

<head>
    <!-- Elemen <head> berisi metadata dan elemen-elemen yang tidak langsung terlihat di halaman -->
    <meta charset="UTF-8">
    <!-- Menentukan karakter encoding dokumen sebagai UTF-8 untuk mendukung berbagai jenis karakter -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mengatur kompatibilitas dengan browser lama, khususnya Internet Explorer -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Mengatur agar halaman responsif, lebar halaman sesuai dengan perangkat yang digunakan -->
    <link rel="stylesheet" href="../../Assets/CSS/LoginPetugasSiswaStyle.css">
    <!-- Menyertakan file CSS eksternal untuk memberikan gaya pada halaman -->
    <title>Tambah Prodi</title>
    <!-- Judul halaman yang akan tampil di tab browser -->
</head>

<body>
    <!-- Elemen <body> berisi semua konten utama halaman yang akan ditampilkan -->

    <div class="wrapper">
        <!-- Elemen <div> dengan class "wrapper" untuk membungkus seluruh konten form -->

        <header>Halaman Tambah Prodi</header>
        <!-- Header halaman yang menampilkan judul "Halaman Tambah Prodi" -->

        <form action="" method="post">
            <!-- Elemen <form> untuk membuat formulir dengan metode POST, data akan dikirimkan ke server -->
            
            <div class="field name">
                <!-- Elemen <div> dengan class "field name" untuk membungkus input nama -->
                <div class="input-area">
                    <!-- Elemen <div> dengan class "input-area" untuk menata input -->
                    <input type="text" name="name" id="name" autocomplete="off" placeholder="Nama">
                    <!-- Input teks untuk memasukkan nama program studi, memiliki atribut:
                         - name="name" untuk identifikasi data di backend
                         - id="name" sebagai pengenal unik
                         - autocomplete="off" untuk menonaktifkan pengisian otomatis
                         - placeholder="Nama" untuk teks placeholder -->
                </div>
            </div>

            <div class="field faculty">
                <!-- Elemen <div> dengan class "field faculty" untuk membungkus input jurusan -->
                <div class="input-area">
                    <!-- Elemen <div> dengan class "input-area" untuk menata input -->
                    <input type="text" name="jurusan" id="jurusan" autocomplete="off" placeholder="Jurusan">
                    <!-- Input teks untuk memasukkan jurusan, memiliki atribut:
                         - name="jurusan" untuk identifikasi data di backend
                         - id="jurusan" sebagai pengenal unik
                         - autocomplete="off" untuk menonaktifkan pengisian otomatis
                         - placeholder="Jurusan" untuk teks placeholder -->
                </div>
            </div>

            <input type="submit" name="submit" value="Kirim">
            <!-- Tombol kirim untuk mengirimkan data:
                 - type="submit" untuk jenis tombol
                 - name="submit" untuk identifikasi tombol di backend
                 - value="Kirim" sebagai teks pada tombol -->
        </form>
    </div>
</body>
</html>
