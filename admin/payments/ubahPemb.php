<?php 

session_start();

$petugas_id = $_SESSION["id"];
require "../../functions.php";

$id = $_GET["id"];

if (isset($_POST["submit"])) {  
    if (ubahPemb($_POST)) {
        if ($_POST["status"] == "failed") {
            changeStatusFailed($_POST["ukt_id"]);
            header("location: index.php");
        } 
    }
}

$payment = query("SELECT 
                    payments.id AS payment_id,  -- Alias kolom id dari payments
                    ukt.id AS ukt_id,  -- Alias kolom id dari ukt
                    payment_methods.id AS method_id,  -- Alias kolom id dari payment_methods
                    payment_methods.name AS method_name,  -- Alias kolom id dari payment_methods
                    students.id AS student_id,  -- Alias kolom id dari students
                    academic_years.id AS academic_year_id,  -- Alias kolom id dari academic_years
                    payments.*, 
                    ukt.*, 
                    payment_methods.*, 
                    students.*, 
                    academic_years.*,
                    programs.*
                FROM 
                    payments
                LEFT JOIN 
                    ukt ON payments.ukt_id = ukt.id
                LEFT JOIN 
                    payment_methods ON payments.method_id = payment_methods.id
                LEFT JOIN 
                    students ON ukt.student_id = students.id
                LEFT JOIN 
                    academic_years ON ukt.academic_year_id = academic_years.id
                LEFT JOIN
                    programs ON students.program_id = programs.id
                WHERE payments.id = $id 
                ");

$payment_methods = query("SELECT * FROM payment_methods");

?>

<!DOCTYPE html>
<!-- Deklarasi tipe dokumen HTML5 untuk memastikan kompatibilitas dengan standar HTML5 -->
<html lang="en">
<!-- Tag pembuka HTML, atribut lang="en" menunjukkan bahwa bahasa dokumen adalah Bahasa Inggris -->

<head>
    <!-- Elemen <head> berisi metadata dokumen dan elemen-elemen yang tidak langsung ditampilkan di halaman -->
    
    <meta charset="UTF-8">
    <!-- Menentukan karakter encoding dokumen sebagai UTF-8 untuk mendukung berbagai karakter -->
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Menyertakan header untuk kompatibilitas browser, diatur ke IE=edge agar menggunakan mesin rendering terbaru -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Mengatur agar halaman dapat disesuaikan dengan lebar layar perangkat, penting untuk desain responsif -->
    
    <link rel="stylesheet" href="../../Assets/CSS/LoginPetugasSiswaStyle.css">
    <!-- Menyertakan file CSS eksternal untuk memberikan gaya pada halaman -->
    
    <title>Ubah Data Registrasi Pembayaran</title>
    <!-- Judul halaman yang akan ditampilkan di tab browser -->
</head>

<body>
    <!-- Elemen <body> berisi konten utama halaman yang akan ditampilkan kepada pengguna -->

    <div class="wrapper">
        <!-- Elemen <div> dengan class "wrapper" untuk membungkus seluruh konten -->

        <header>Halaman Ubah Data Registrasi Pembayaran</header>
        <!-- Elemen <header> untuk menampilkan judul bagian "Halaman Ubah Data Registrasi Pembayaran" -->

        <form action="" method="post">
            <!-- Elemen <form> digunakan untuk mengirimkan data input ke server, dengan atribut action="" (URL target) dan method="post" -->

            <input type="hidden" name="id" value="<?= $id ?>">
            <!-- Elemen <input> dengan type="hidden" untuk menyembunyikan data "id" yang akan dikirimkan melalui form -->

            <input type="hidden" name="ukt_id" value="<?= $payment[0]['ukt_id'] ?>">
            <!-- Elemen <input> dengan type="hidden" untuk menyembunyikan data "ukt_id" -->

            <input type="hidden" name="petugas_id" value="<?= $petugas_id ?>">
            <!-- Elemen <input> dengan type="hidden" untuk menyembunyikan data "petugas_id" -->

            <div class="field studentid">
                <!-- Elemen <div> dengan class "field studentid" untuk membungkus input teks -->
                <div class="input-area">
                    <!-- Elemen <div> dengan class "input-area" untuk mengatur area input -->
                    <input type="text" name="nim" id="nim" autocomplete="off" value="<?= $payment[0]['nim']; ?>">
                    <!-- Input teks untuk "nim" mahasiswa, dengan nilai diambil dari variabel PHP -->
                </div>
            </div>

            <div class="field name">
                <div class="input-area">
                    <input type="text" name="name" id="name" autocomplete="off" value="<?= $payment[0]['name']; ?>" disabled>
                    <!-- Input teks untuk "name" mahasiswa, nilai diambil dari variabel PHP, dan atribut disabled membuatnya tidak dapat diedit -->
                </div>
            </div>

            <div class="field faculty">
                <div class="input-area">
                    <input type="text" name="facultas" id="facultas" autocomplete="off" value="<?= $payment[0]['faculty']; ?>" disabled>
                    <!-- Input teks untuk "faculty", nilai diambil dari variabel PHP, dan tidak dapat diedit -->
                </div>
            </div>

            <div class="field year">
                <div class="input-area">
                    <input type="text" name="tahun_ajaran" id="tahun" autocomplete="off" value="<?= $payment[0]['year']; ?>" disabled>
                    <!-- Input teks untuk "tahun ajaran", nilai diambil dari variabel PHP, dan tidak dapat diedit -->
                </div>
            </div>

            <div class="field semester">
                <div class="input-area">
                    <input type="text" name="semester" id="semester" autocomplete="off" value="<?= $payment[0]['semester']; ?>" disabled>
                    <!-- Input teks untuk "semester", nilai diambil dari variabel PHP, dan tidak dapat diedit -->
                </div>
            </div>

            <div class="field amount">
                <div class="input-area">
                    <input type="text" name="amount" id="amount" autocomplete="off" value="Rp. <?= $payment[0]['amount']; ?>" disabled>
                    <!-- Input teks untuk "amount" pembayaran, nilai diambil dari variabel PHP, dan tidak dapat diedit -->
                </div>
            </div>

            <div class="field method">
                <div class="input-area">
                    <input type="text" name="amount" id="amount" autocomplete="off" value="<?= $payment[0]['method_name']; ?>" disabled>
                    <!-- Input teks untuk "method_name" metode pembayaran, nilai diambil dari variabel PHP, dan tidak dapat diedit -->
                </div>
            </div>

            <div class="field status">
                <!-- Elemen <div> untuk membungkus elemen <select> -->
                <div class="select-area">
                    <!-- Elemen <div> dengan class "select-area" untuk mengatur area dropdown -->
                    <select name="status" id="status">
                        <!-- Elemen <select> untuk memilih status pembayaran -->
                        <option value="failed">failed</option>
                        <!-- Elemen <option> untuk menentukan status pembayaran sebagai "failed" -->
                    </select>
                </div>
            </div>

            <input type="submit" name="submit" value="Ubah">
            <!-- Tombol submit untuk mengirimkan form dengan label "Ubah" -->
        </form>
    </div>
</body>
</html>
