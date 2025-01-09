<?php 

require "../../functions.php";

if (isset($_POST["submit"])) {
    
    if (tambahTahun($_POST)) {
        header("location: index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
    <!DOCTYPE html>: Menentukan tipe dokumen sebagai HTML5.
    <html lang="en">: Elemen root dokumen HTML, dengan atribut "lang" untuk menetapkan bahasa utama (English).
    -->
    <meta charset="UTF-8">
    <!-- <meta charset="UTF-8">: Menentukan karakter encoding dokumen sebagai UTF-8. -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta http-equiv="X-UA-Compatible">: Memastikan kompatibilitas dokumen dengan versi terbaru dari Internet Explorer. -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="viewport">: Mengatur tampilan agar responsif pada berbagai ukuran layar. -->
    <link rel="stylesheet" href="../../Assets/CSS/LoginPetugasSiswaStyle.css">
    <!-- <link rel="stylesheet">: Menyertakan file CSS eksternal untuk mendesain halaman. -->
    <title>Tambah Data Tahun Ajaran</title>
    <!-- <title>: Menentukan judul halaman yang ditampilkan di tab browser. -->
</head>
<body>
    <!-- <body>: Elemen utama untuk memuat seluruh konten visual halaman web. -->
    <div class="wrapper">
        <!-- <div class="wrapper">: Container utama untuk seluruh elemen pada halaman. -->
        <header>Halaman Tambah Data Tahun Ajaran</header>
        <!-- <header>: Menampilkan judul atau header utama halaman. -->
        <form action="" method="post">
            <!-- <form>: Elemen untuk membuat formulir input data dengan metode pengiriman POST. -->
            <div class="field semester">
                <!-- <div class="field semester">: Container untuk elemen input semester. -->
                <div class="field year">
                    <!-- <div class="field year">: Container untuk elemen input tahun ajaran. -->
                    <div class="input-area">
                        <!-- <div class="input-area">: Area untuk elemen input teks. -->
                        <input type="text" name="year" id="year" autocomplete="off" placeholder="Year">
                        <!-- <input type="text">: Input teks untuk memasukkan tahun ajaran. -->
                    </div>
                </div>
            </div>
            <div class="field semester">
                <!-- <div class="field semester">: Container untuk elemen input semester. -->
                <div class="select-area">
                    <!-- <div class="select-area">: Area untuk elemen dropdown. -->
                    <select name="semester" id="semester">
                        <!-- <select>: Dropdown untuk memilih semester. -->
                        <option value="#">Semester</option>
                        <!-- <option>: Opsi default "Semester". -->
                        <option value="1">1</option>
                        <!-- <option>: Opsi untuk semester 1. -->
                        <option value="2">2</option>
                        <!-- <option>: Opsi untuk semester 2. -->
                    </select>
                </div>
            </div>
            <div class="field status">
                <!-- <div class="field status">: Container untuk elemen status aktif/tidak aktif. -->
                <div class="select-area">
                    <!-- <div class="select-area">: Area untuk elemen dropdown status. -->
                    <select name="status" id="status">
                        <!-- <select>: Dropdown untuk memilih status. -->
                        <option value="active">Active</option>
                        <!-- <option>: Opsi untuk status "Active". -->
                        <option value="inactive">INActive</option>
                        <!-- <option>: Opsi untuk status "INActive". -->
                    </select>
                </div>
            </div>
            <input type="submit" name="submit" value="Kirim">
            <!-- <input type="submit">: Tombol untuk mengirimkan data formulir. -->
        </form>
    </div>
</body>
</html>
