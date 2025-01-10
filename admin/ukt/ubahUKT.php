<?php 



require "../../functions.php";
$id = $_GET["id"];

$ukt = query("SELECT ukt.*, ukt.id as uktID, students.* FROM ukt INNER JOIN students ON ukt.student_id = students.id WHERE ukt.id = $id")[0];
$student = query("SELECT * FROM students");
$academic_year = query("SELECT * FROM academic_years");

if (isset($_POST["submit"])) {
    
    if (ubahUKT($_POST)) {
        header("location: index.php");
    }
}

?>

</body>
</html>
<!DOCTYPE html>
<!-- Deklarasi tipe dokumen HTML5 -->
<html lang="en">
<!-- Elemen <html> digunakan untuk membungkus seluruh dokumen HTML. Atribut lang="en" menunjukkan bahwa bahasa dokumen adalah Bahasa Inggris -->

<head>
    <!-- Elemen <head> berisi metadata halaman dan elemen-elemen yang tidak ditampilkan di halaman secara langsung -->
    <meta charset="UTF-8">
    <!-- Menentukan karakter encoding dokumen sebagai UTF-8 agar mendukung berbagai jenis karakter -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Memastikan kompatibilitas dengan berbagai versi browser, terutama Internet Explorer -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Mengatur halaman agar responsif, menyesuaikan lebar halaman dengan perangkat pengguna -->
    <link rel="stylesheet" href="../../Assets/CSS/LoginPetugasSiswaStyle.css">
    <!-- Menyertakan file CSS eksternal untuk memberikan gaya pada halaman -->
    <title>Ubah Data UKT</title>
    <!-- Menentukan judul halaman yang akan muncul di tab browser -->
</head>

<body>
    <!-- Elemen <body> berisi semua konten utama halaman yang akan ditampilkan di browser -->
    
    <div class="wrapper">
        <!-- Elemen <div> dengan class "wrapper" digunakan untuk membungkus konten utama halaman -->
        
        <header>Ubah Data UKT</header>
        <!-- Elemen <header> digunakan untuk menampilkan judul halaman sebagai header -->
        
        <form action="" method="post">
            <!-- Elemen <form> digunakan untuk mengirim data ke server dengan metode POST -->
            
            <input type="hidden" name="id" value="<?= $ukt["uktID"]; ?>">
            <!-- Elemen <input> dengan type="hidden" untuk menyimpan nilai ID UKT yang akan diubah -->
            
            <div class="field studentid">
                <!-- Elemen <div> dengan class "field studentid" digunakan untuk membungkus input data mahasiswa -->
                <div class="select-area">
                    <!-- Elemen <div> dengan class "select-area" digunakan untuk membungkus dropdown pilihan mahasiswa -->
                    <select name="student_id" id="student_id">
                        <!-- Elemen <select> digunakan untuk membuat dropdown pilihan mahasiswa -->
                        <option name="student_id" value="<?php echo $ukt['student_id']; ?>" selected>
                            <!-- Elemen <option> dengan atribut selected untuk menampilkan mahasiswa yang sudah dipilih -->
                            <?= $ukt['nim'] ?>
                            <!-- Menampilkan NIM mahasiswa yang telah terdaftar -->
                        </option>
                    </select>
                </div>
            </div>

            <div class="field year">
                <!-- Elemen <div> dengan class "field year" digunakan untuk membungkus dropdown tahun akademik -->
                <div class="select-area">
                    <select name="academic_year_id" id="academic_year_id">
                        <!-- Elemen <select> digunakan untuk membuat dropdown pilihan tahun akademik -->
                        <?php foreach ($academic_year as $row): ?>
                        <!-- Looping PHP untuk menampilkan setiap data tahun akademik dalam array $academic_year -->
                        <option value="<?php echo $row['id']; ?>">
                            <!-- Elemen <option> digunakan untuk membuat item dropdown -->
                            <?= $row['year'] . "- semester " . $row['semester'] ?>
                            <!-- Menampilkan tahun akademik dan semester dari array PHP -->
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="field amount">
                <!-- Elemen <div> dengan class "field amount" digunakan untuk membungkus input jumlah UKT -->
                <div class="input-area">
                    <!-- Elemen <div> dengan class "input-area" digunakan untuk membungkus elemen input -->
                    <input type="text" name="amount" id="amount" autocomplete="off" value="<?= $ukt["amount"]; ?>">
                    <!-- Elemen <input> digunakan untuk menerima input jumlah UKT yang akan diubah -->
                </div>
            </div>

            <div class="field status">
                <!-- Elemen <div> dengan class "field status" digunakan untuk membungkus dropdown status pembayaran -->
                <div class="select-area">
                    <select name="status" id="status">
                        <!-- Elemen <select> digunakan untuk membuat dropdown pilihan status pembayaran -->
                        <option value="unpaid">unpaid</option>
                        <!-- Elemen <option> untuk menampilkan status pembayaran belum lunas -->
                        <option value="paid">paid</option>
                        <!-- Elemen <option> untuk menampilkan status pembayaran sudah lunas -->
                    </select>
                </div>
            </div>

            <input type="submit" name="submit" value="Kirim">
            <!-- Elemen <input> digunakan sebagai tombol untuk mengirim data form -->
        </form>
    </div>
</body>
</html>
