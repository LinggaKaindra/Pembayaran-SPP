<?php 

require "../../functions.php";


$student = query("SELECT * FROM students");
$academic_year = query("SELECT * FROM academic_years");


if (isset($_POST["submit"])) {
    
    if (tambahUKT($_POST)) {
        header("location: index.php");
    }
}

?>

<!DOCTYPE html>
<!-- Deklarasi tipe dokumen HTML5 untuk memastikan browser menggunakan standar HTML5 -->
<html lang="en">
<!-- Tag pembuka HTML dengan atribut lang="en" menunjukkan bahwa bahasa dokumen adalah Bahasa Inggris -->

<head>
    <!-- Elemen <head> berisi metadata dan elemen-elemen yang tidak langsung terlihat di halaman -->
    <meta charset="UTF-8">
    <!-- Menentukan karakter encoding dokumen sebagai UTF-8 untuk mendukung berbagai jenis karakter -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Memastikan kompatibilitas dengan berbagai versi browser, terutama Internet Explorer -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Mengatur halaman agar responsif, lebar halaman sesuai dengan lebar perangkat pengguna -->
    <link rel="stylesheet" href="../../Assets/CSS/LoginPetugasSiswaStyle.css">
    <!-- Menyertakan file CSS eksternal untuk memberikan gaya pada halaman -->
    <title>Tambah Data UKT</title>
    <!-- Menentukan judul halaman yang akan tampil di tab browser -->
</head>

<body>
    <!-- Elemen <body> berisi semua konten utama halaman yang akan ditampilkan di browser -->
    
    <div class="wrapper">
        <!-- Elemen <div> dengan class "wrapper" digunakan untuk membungkus konten utama halaman -->
        
        <header>Tambah Data UKT</header>
        <!-- Elemen <header> menampilkan judul halaman sebagai header -->
        
        <form action="" method="post">
            <!-- Elemen <form> digunakan untuk mengirim data ke server dengan metode POST -->
            
            <div class="field studentid">
                <!-- Elemen <div> dengan class "field studentid" untuk membungkus input pilihan data mahasiswa -->
                <div class="select-area">
                    <!-- Elemen <div> dengan class "select-area" untuk membungkus elemen <select> -->
                    <select name="student_id" id="student_id">
                        <!-- Elemen <select> digunakan untuk membuat dropdown pilihan mahasiswa -->
                        <?php foreach ($student as $row): ?>
                        <!-- Looping PHP untuk menampilkan setiap data mahasiswa dalam array $student -->
                        <option value="<?php echo $row['id']; ?>">
                            <!-- Elemen <option> digunakan untuk membuat item dropdown -->
                            <?= $row['nim'] ?>
                            <!-- Menampilkan NIM mahasiswa dari array PHP -->
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="field year">
                <!-- Elemen <div> dengan class "field year" untuk membungkus input pilihan tahun akademik -->
                <div class="select-area">
                    <select name="academic_year_id" id="academic_year_id">
                        <!-- Elemen <select> digunakan untuk membuat dropdown pilihan tahun akademik -->
                        <?php foreach ($academic_year as $row): ?>
                        <!-- Looping PHP untuk menampilkan setiap data tahun akademik dalam array $academic_year -->
                        <option value="<?php echo $row['id']; ?>">
                            <!-- Elemen <option> digunakan untuk membuat item dropdown -->
                            <?= $row['year'] . "- semester " . $row['semester'] ?>
                            <!-- Menampilkan tahun dan semester akademik dari array PHP -->
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="field amount">
                <!-- Elemen <div> dengan class "field amount" untuk membungkus input jumlah biaya UKT -->
                <div class="input-area">
                    <!-- Elemen <div> dengan class "input-area" untuk membungkus elemen input -->
                    <input type="number" name="amount" id="amount" autocomplete="off" placeholder="Amount">
                    <!-- Elemen <input> digunakan untuk menerima input angka jumlah UKT -->
                </div>
            </div>

            <div class="field status">
                <!-- Elemen <div> dengan class "field status" untuk membungkus input status pembayaran -->
                <div class="select-area">
                    <select name="status" id="status">
                        <!-- Elemen <select> digunakan untuk membuat dropdown pilihan status pembayaran -->
                        <option value="unpaid">
                            <!-- Elemen <option> digunakan untuk membuat item dropdown -->
                            unpaid
                            <!-- Menampilkan status default pembayaran -->
                        </option>
                    </select>
                </div>
            </div>

            <input type="submit" name="submit" value="Kirim">
            <!-- Elemen <input> digunakan sebagai tombol untuk mengirim data form -->
        </form>
    </div>
</body>
</html>
