<?php 

require "../../functions.php";

if (isset($_POST["submit"])) {
    
    $search = cariPemb($_POST["nim"]);

    // var_dump($search);
}
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

        <h1>Halaman Registrasi Pembayaran</h1>
        <!-- Elemen <h1> untuk menampilkan judul halaman "Halaman Registrasi Pembayaran" -->

        <form action="" method="post">
        <!-- Elemen <form> digunakan untuk mengumpulkan data input pengguna dan mengirimkan melalui metode POST -->
        
            <div class="field idstudent">
                <!-- Elemen <div> untuk membungkus input ID mahasiswa, dengan class "field idstudent" -->
                
                <div class="input-area">
                    <!-- Elemen <div> untuk mengatur tata letak input -->
                    
                    <input type="text" name="nim" id="nim" autocomplete="off" placeholder="Ketikkan NIM">
                    <!-- Input teks untuk memasukkan NIM, dengan placeholder untuk panduan pengguna -->
                </div>
            </div>

            <br>
            <!-- Elemen <br> untuk menambahkan baris kosong (jarak vertikal) antara elemen -->
            
            <input type="submit" name="submit" value="Kirim">
            <!-- Tombol kirim untuk mengirimkan data yang telah diisi pengguna -->
        </form>

        <h1>Halaman Pembayaran</h1>
        <!-- Elemen <h1> untuk menampilkan judul halaman "Halaman Pembayaran" -->

        <?php if (!empty($search)): ?>
        <!-- Kondisi PHP: jika variabel $search tidak kosong, tampilkan tabel pembayaran -->
        
        <div class="table-container">
            <!-- Elemen <div> dengan class "table-container" digunakan untuk membungkus tabel -->
            
            <table cellpadding="20">
                <!-- Elemen <table> untuk menampilkan data pembayaran dalam bentuk tabel -->
                
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
                        
                        <th>Payment Amount</th>
                        <!-- Elemen <th> untuk kolom jumlah pembayaran -->
                        
                        <th>status</th>
                        <!-- Elemen <th> untuk kolom status pembayaran -->
                        
                        <th>action</th>
                        <!-- Elemen <th> untuk kolom tindakan (action) -->
                    </tr>
                </thead>

                <?php $i = 1; ?>
                <!-- Inisialisasi variabel PHP $i untuk penomoran baris -->

                <?php foreach( $search as $row):?>
                <!-- Looping PHP untuk menampilkan setiap baris data dari array $search -->
                
                <tr>
                    <td><?= $i; ?></td>
                    <!-- Menampilkan nomor baris -->
                    
                    <td><?= $row["name"]; ?></td>
                    <!-- Menampilkan nama mahasiswa -->
                    
                    <td><?= $row["year"] .'-'. $row["semester"] ?></td>
                    <!-- Menampilkan tahun dan semester -->
                    
                    <td>Rp. <?= number_format($row["amount"]); ?></td>
                    <!-- Menampilkan jumlah pembayaran dalam format mata uang -->
                    
                    <td><?= $row["status"]; ?></td>
                    <!-- Menampilkan status pembayaran -->

                    <?php 
                        if ($row['status'] == 'unpaid') {
                            echo '
                                <td><a href="tambahPemb.php?id=' . $row['id'] . '&nim=' . $row['nim'] . '">Bayar</a></td>
                            ';
                            // Menampilkan tautan untuk melakukan pembayaran jika status "unpaid"
                        
                        } else {
                            echo '
                                <td><a href="#">#</a></td>
                            ';
                            // Menampilkan placeholder jika status bukan "unpaid"
                        }
                    ?>
                </tr>
                <?php $i++; ?>
                <!-- Increment variabel PHP $i untuk baris berikutnya -->
                
                <?php endforeach; ?>
            </table>
        </div>  
        <?php else: ?>
        <!-- Jika $search kosong, tampilkan pesan berikut -->
        
        <h2>Mohon ketikan nim </h2>
        <!-- Pesan untuk meminta pengguna mengetikkan NIM -->
        <?php endif; ?>  

        <a href="index.php">kembali</a>
        <!-- Tautan untuk kembali ke halaman sebelumnya -->
    </center>
</body>
</html>
