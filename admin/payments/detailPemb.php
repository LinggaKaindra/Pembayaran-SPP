<?php
    require "../../functions.php";

    $id = $_GET['id'];

    $payments = query("SELECT 
                    payments.id AS paymentId,
                    payments.paid_date AS paid_date,
                    payments.amount_paid as amount_paid,
                    payments.status as status,
                    ukt.id AS uktId,
                    payment_methods.name AS method_name,
                    students.*,  -- Menambahkan data dari tabel students
                    programs.faculty,
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
                INNER JOIN 
                    programs ON students.program_id = programs.id
                WHERE payments.id = $id
                ");

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
    
    <title>Document</title>
    <!-- Judul halaman yang akan ditampilkan di tab browser -->
</head>

<body>
    <!-- Elemen <body> berisi konten utama halaman yang akan ditampilkan kepada pengguna -->

    <center>
        <!-- Elemen <center> digunakan untuk meratakan konten secara horizontal di tengah halaman -->

        <h3>Data pembayaran</h3>
        <!-- Elemen <h3> untuk menampilkan judul bagian "Data pembayaran" -->

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
                        
                        <th>NIM</th>
                        <!-- Elemen <th> untuk kolom NIM mahasiswa -->
                        
                        <th>Student Name</th>
                        <!-- Elemen <th> untuk kolom nama mahasiswa -->
                        
                        <th>Tahun & Semester</th>
                        <!-- Elemen <th> untuk kolom tahun dan semester -->
                        
                        <th>Fakultas</th>
                        <!-- Elemen <th> untuk kolom fakultas -->
                        
                        <th>Payment Method</th>
                        <!-- Elemen <th> untuk kolom metode pembayaran -->
                        
                        <th>Payment Date</th>
                        <!-- Elemen <th> untuk kolom tanggal pembayaran -->
                        
                        <th>Payment Amount</th>
                        <!-- Elemen <th> untuk kolom jumlah pembayaran -->
                        
                        <th>status</th>
                        <!-- Elemen <th> untuk kolom status pembayaran -->
                    </tr>
                </thead>

                <?php $i = 1; ?>
                <!-- Inisialisasi variabel PHP $i untuk penomoran baris -->

                <?php foreach( $payments as $row): ?>
                <!-- Looping PHP untuk menampilkan setiap baris data dari array $payments -->
                
                <tr>
                    <td><?= $i; ?></td>
                    <!-- Menampilkan nomor baris -->
                    
                    <td><?= $row["nim"]; ?></td>
                    <!-- Menampilkan NIM mahasiswa -->
                    
                    <td><?= $row["name"]; ?></td>
                    <!-- Menampilkan nama mahasiswa -->
                    
                    <td><?= $row["year"] .'-'. $row["semester"] ?></td>
                    <!-- Menampilkan tahun dan semester -->
                    
                    <td><?= $row["faculty"]; ?></td>
                    <!-- Menampilkan fakultas -->
                    
                    <td><?= $row["method_name"]; ?></td>
                    <!-- Menampilkan nama metode pembayaran -->
                    
                    <td><?= $row["paid_date"]; ?></td>
                    <!-- Menampilkan tanggal pembayaran -->
                    
                    <td>Rp. <?= number_format($row["amount_paid"]); ?></td>
                    <!-- Menampilkan jumlah pembayaran dalam format mata uang -->
                    
                    <td><?= $row["status"]; ?></td>
                    <!-- Menampilkan status pembayaran -->
                </tr>
                <?php $i++; ?>
                <!-- Increment variabel PHP $i untuk baris berikutnya -->

                <?php endforeach; ?>
            </table>
        </div>

        <a href="#" onclick="window.print()">Print</a>
        <!-- Tautan untuk mencetak halaman, dengan fungsi JavaScript untuk memicu aksi cetak -->

        <span> || </span>
        <!-- Elemen <span> sebagai pemisah visual antar tautan -->

        <a href="index.php">Kembali</a>
        <!-- Tautan untuk kembali ke halaman utama -->
    </center>
</body>
</html>
