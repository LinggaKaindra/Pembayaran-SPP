<?php 

session_start();

if (!isset($_SESSION["loggedin"])) {
    header("Location: ../loginPetugas.php");
    exit;
}


require "../../functions.php";

$nim = $_GET["nim"];
$petugas_id = $_SESSION["id"];
$ukt_id = $_GET["id"];

if (isset($_POST["submit"])) {   
    if (tambahPemb($_POST)) {
        if (changeStatusUKT($ukt_id)) {
            header("location: index.php");
        }
    }
}

$ukt = query("SELECT ukt.*, ukt.id as ukt_id, students.nim, students.name, academic_years.year, academic_years.semester FROM ukt INNER JOIN academic_years ON ukt.academic_year_id = academic_years.id INNER JOIN students ON ukt.student_id = students.id WHERE ukt.id = $ukt_id ");
$student = query("SELECT * FROM students INNER JOIN programs on students.program_id = programs.id WHERE nim = $nim");
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
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Mengatur agar halaman dapat disesuaikan dengan lebar layar perangkat, penting untuk desain responsif -->
    
    <title>Tambah Data Registrasi Pembayaran</title>
    <!-- Judul halaman yang akan ditampilkan di tab browser -->
    
    <link rel="stylesheet" href="../../Assets/CSS/LoginPetugasSiswaStyle.css">
    <!-- Menyertakan file CSS eksternal untuk memberikan gaya pada halaman -->
</head>

<body>
    <!-- Elemen <body> berisi konten utama halaman yang akan ditampilkan kepada pengguna -->

    <div class="wrapper">
        <!-- Elemen <div> dengan class "wrapper" untuk membungkus seluruh konten -->

        <header>Halaman Registrasi Pembayaran</header>
        <!-- Elemen <header> untuk menampilkan judul bagian "Halaman Registrasi Pembayaran" -->

        <form action="" method="post">
            <!-- Elemen <form> digunakan untuk mengirimkan data input ke server, dengan atribut action="" (URL target) dan method="post" -->

            <input type="hidden" name="ukt_id" value="<?= $ukt_id ?>">
            <!-- Elemen <input> dengan type="hidden" untuk menyembunyikan data "ukt_id" yang akan dikirimkan melalui form -->

            <input type="hidden" name="petugas_id" value="<?= $petugas_id ?>">
            <!-- Elemen <input> dengan type="hidden" untuk menyembunyikan data "petugas_id" yang akan dikirimkan melalui form -->

            <div class="field name">
                <!-- Elemen <div> dengan class "field name" untuk membungkus input teks -->

                <div class="input-area">
                    <!-- Elemen <div> dengan class "input-area" untuk mengatur area input -->
                    <input type="text" name="nim" id="nim" autocomplete="off" value="<?= $nim; ?>">
                    <!-- Input teks untuk "nim" mahasiswa, dengan nilai diambil dari variabel PHP -->
                </div>
            </div>

            <div class="field name">
                <div class="input-area">
                    <input type="text" name="name" id="name" autocomplete="off" value="<?= $ukt[0]['name']; ?>" disabled>
                    <!-- Input teks untuk "name" mahasiswa, nilai diambil dari variabel PHP, dan atribut disabled membuatnya tidak dapat diedit -->
                </div>
            </div>

            <div class="field name">
                <div class="input-area">
                    <input type="text" name="facultas" id="facultas" autocomplete="off" value="<?= $student[0]['faculty']; ?>" disabled>
                    <!-- Input teks untuk "faculty", nilai diambil dari variabel PHP, dan tidak dapat diedit -->
                </div>
            </div>

            <div class="field name">
                <div class="input-area">
                    <input type="text" name="tahun_ajaran" id="tahun" autocomplete="off" value="<?= $ukt[0]['year']; ?>" disabled>
                    <!-- Input teks untuk "tahun ajaran", nilai diambil dari variabel PHP, dan tidak dapat diedit -->
                </div>
            </div>

            <div class="field name">
                <div class="input-area">
                    <input type="text" name="semester" id="semester" autocomplete="off" value="<?= $ukt[0]['semester']; ?>" disabled>
                    <!-- Input teks untuk "semester", nilai diambil dari variabel PHP, dan tidak dapat diedit -->
                </div>
            </div>

            <div class="field name">
                <div class="input-area">
                    <input type="text" name="amount" id="amount" autocomplete="off" value="Rp. <?= $ukt[0]['amount']; ?>">
                    <!-- Input teks untuk "amount" pembayaran, nilai diambil dari variabel PHP -->
                </div>
            </div>

            <div class="field">
                <!-- Elemen <div> untuk membungkus elemen <select> -->
                
                <div class="select-area">
                    <!-- Elemen <div> dengan class "select-area" untuk mengatur area dropdown -->

                    <select name="payment_method_id" id="payment_method_id">
                        <!-- Elemen <select> untuk memilih metode pembayaran -->

                        <?php foreach ($payment_methods as $row): ?>
                        <!-- Looping PHP untuk menampilkan setiap metode pembayaran dalam dropdown -->

                        <option value="<?php echo $row['id']; ?>"><?= $row['name'] ?></option>
                        <!-- Elemen <option> untuk setiap metode pembayaran, dengan nilai diambil dari variabel PHP -->
                        
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <input type="submit" name="submit"></input>
            <!-- Tombol submit untuk mengirimkan form -->
        </form>
    </div>
</body>
</html>
