<?php 

require "../../functions.php";

if (isset($_POST["submit"])) {
    
    if (tambahPaymentMethod($_POST)) {
        header("location: index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
    Tag <head> digunakan untuk mendefinisikan metadata dokumen HTML.
    -->
    <meta charset="UTF-8">
    <!--
    Tag <meta charset="UTF-8"> digunakan untuk mengatur karakter encoding dokumen ke UTF-8.
    -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--
    Tag <meta http-equiv="X-UA-Compatible"> digunakan untuk memastikan kompatibilitas browser.
    -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--
    Tag <meta name="viewport"> digunakan untuk membuat tampilan responsif pada berbagai perangkat.
    -->
    <link rel="stylesheet" href="../../Assets/CSS/LoginPetugasSiswaStyle.css">
    <!--
    Tag <link> digunakan untuk menghubungkan file CSS eksternal untuk styling halaman.
    -->
    <title>Tambah Metode Pembayaran</title>
    <!--
    Tag <title> mendefinisikan judul dokumen yang akan ditampilkan pada tab browser.
    -->
</head>
<body>
    <!--
    Tag <body> digunakan untuk menampung semua elemen yang akan ditampilkan di halaman web.
    -->
    <div class="wrapper">
        <!--
        Div dengan class "wrapper" digunakan untuk membungkus seluruh konten formulir dengan styling khusus.
        -->
        <header>Halaman Tambah Metode Pembayaran</header>
        <!--
        Elemen <header> digunakan untuk menampilkan judul utama halaman.
        -->
        <form action="" method="post">
            <!--
            Elemen <form> digunakan untuk membuat formulir. Atribut action="" mengarah ke halaman saat ini, 
            dan method="post" digunakan untuk mengirimkan data secara POST.
            -->
            <div class="field method">
                <!--
                Div dengan class "field method" digunakan untuk membungkus input terkait metode pembayaran.
                -->
                <div class="input-area">
                    <!--
                    Div dengan class "input-area" digunakan untuk styling area input.
                    -->
                    <input type="text" name="name" id="name" autocomplete="off" placeholder="Metode">
                    <!--
                    Elemen <input> dengan tipe "text" digunakan untuk memasukkan nama metode pembayaran.
                    - name="name": Atribut "name" menentukan nama variabel yang akan dikirim melalui POST.
                    - id="name": Atribut "id" digunakan untuk mengidentifikasi input secara unik.
                    - autocomplete="off": Menonaktifkan saran input dari browser.
                    - placeholder="Metode": Menampilkan teks placeholder untuk membantu pengguna.
                    -->
                </div>
            </div>
            <input type="submit" name="submit" value="Kirim">
            <!--
            Elemen <input> dengan tipe "submit" digunakan untuk mengirimkan formulir.
            - name="submit": Atribut "name" menentukan nama variabel tombol submit.
            - value="Kirim": Teks pada tombol submit.
            -->
        </form>
    </div>
</body>
</html>
