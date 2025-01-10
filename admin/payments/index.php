<?php
   session_start();

   if (!isset($_SESSION["loggedin"])) {
       header("Location: ../loginPetugas.php");
       exit;
   }
    require "../../functions.php";

    $payments = query("SELECT 
                    payments.id AS paymentId,
                    payments.paid_date AS paid_date,
                    payments.amount_paid as amount_paid,
                    payments.status as status,
                    ukt.id AS uktId,
                    payment_methods.name AS method_name,
                    students.*,  -- Menambahkan data dari tabel students
                    academic_years.year, academic_years.semester  -- Menambahkan data dari tabel academic_years
                FROM 
                    payments 
                INNER JOIN 
                    ukt ON payments.ukt_id = ukt.id
                INNER JOIN 
                    payment_methods ON payments.method_id = payment_methods.id
                INNER JOIN 
                    students ON ukt.student_id = students.id  -- Menambahkan join ke tabel students
                INNER JOIN 
                    academic_years ON ukt.academic_year_id = academic_years.id  -- Menambahkan join ke tabel academic_years
                ");


    // var_dump($payments);
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
    
    <link rel="stylesheet" href="../../Assets/CSS/tablestyle.css">
    <!-- Menyertakan file CSS eksternal untuk memberikan gaya pada halaman -->
    
    <title>Data pembayaran</title>
    <!-- Judul halaman yang akan ditampilkan di tab browser -->
</head>

<body>
    <!-- Elemen <body> berisi konten utama halaman yang akan ditampilkan kepada pengguna -->

    <center>
        <!-- Elemen <center> digunakan untuk meratakan konten secara horizontal di tengah halaman -->

        <h3>Data pembayaran</h3>
        <!-- Elemen <h3> untuk menampilkan judul bagian "Data pembayaran" -->

        <a href="cariPemb.php">tambah data pembayaran</a>
        <!-- Tautan untuk menuju halaman "cariPemb.php" untuk menambah data pembayaran -->

        <div class="table-container">
            <!-- Elemen <div> dengan class "table-container" sebagai pembungkus tabel -->

            <table cellpadding="20">
                <!-- Elemen <table> digunakan untuk menampilkan data pembayaran dalam bentuk tabel -->
                
                <thead>
                    <!-- Elemen <thead> untuk membungkus baris header tabel -->
                    
                    <tr>
                        <!-- Elemen <tr> untuk mendefinisikan baris dalam tabel -->
                        
                        <th>No.</th>
                        <!-- Elemen <th> untuk kolom nomor -->
                        
                        <th>Student Name</th>
                        <!-- Elemen <th> untuk kolom nama mahasiswa -->
                        
                        <th>Tahun & Semester</th>
                        <!-- Elemen <th> untuk kolom tahun dan semester -->
                        
                        <th>Payment Method</th>
                        <!-- Elemen <th> untuk kolom metode pembayaran -->
                        
                        <th>Payment Date</th>
                        <!-- Elemen <th> untuk kolom tanggal pembayaran -->
                        
                        <th>Payment Amount</th>
                        <!-- Elemen <th> untuk kolom jumlah pembayaran -->
                        
                        <th>status</th>
                        <!-- Elemen <th> untuk kolom status pembayaran -->
                        
                        <th>action</th>
                        <!-- Elemen <th> untuk kolom tindakan -->
                    </tr>
                </thead>

                <?php $i = 1; ?>
                <!-- Inisialisasi variabel PHP $i untuk penomoran baris -->

                <?php foreach( $payments as $row): ?>
                <!-- Looping PHP untuk menampilkan setiap baris data dari array $payments -->
                
                <tr>
                    <td><?= $i; ?></td>
                    <!-- Menampilkan nomor baris -->
                    
                    <td><?= $row["name"]; ?></td>
                    <!-- Menampilkan nama mahasiswa -->
                    
                    <td><?= $row["year"] .'-'. $row["semester"] ?></td>
                    <!-- Menampilkan tahun dan semester -->
                    
                    <td><?= $row["method_name"]; ?></td>
                    <!-- Menampilkan nama metode pembayaran -->
                    
                    <td><?= $row["paid_date"]; ?></td>
                    <!-- Menampilkan tanggal pembayaran -->
                    
                    <td>Rp. <?= number_format($row["amount_paid"]); ?></td>
                    <!-- Menampilkan jumlah pembayaran dalam format mata uang -->
                    
                    <td><?= $row["status"]; ?></td>
                    <!-- Menampilkan status pembayaran -->
                    
                    <td>
                        <a href="detailPemb.php?id=<?= $row["paymentId"]; ?>">Detail</a> || 
                        <!-- Tautan untuk melihat detail pembayaran, mengarahkan ke "detailPemb.php" -->
                        
                        <a href="ubahPemb.php?id=<?= $row["paymentId"]; ?>">ubah</a>
                        <!-- Tautan untuk mengubah data pembayaran, mengarahkan ke "ubahPemb.php" -->
                    </td>
                </tr>
                <?php $i++; ?>
                <!-- Increment variabel PHP $i untuk baris berikutnya -->

                <?php endforeach; ?>
            </table>
        </div>

        <a href="../index.php">kembali</a>
        <!-- Tautan untuk kembali ke halaman utama -->
    </center>
</body>
</html>
