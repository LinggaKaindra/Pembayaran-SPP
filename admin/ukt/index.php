<?php

    session_start();

    if (!isset($_SESSION["loggedin"])) {
        header("Location: ../loginPetugas.php");
        exit;
    }

    require '../../functions.php';
    $ukt = query("
            SELECT 
                    ukt.*,
                    ukt.id as ukt_id,
                    ukt.status as ukt_status,
                    students.*,
                    academic_years.*
                FROM 
                    ukt
                INNER JOIN students ON ukt.student_id = students.id
                INNER JOIN academic_years ON ukt.academic_year_id = academic_years.id;
            ");

?>

<!DOCTYPE html>
<!-- Deklarasi tipe dokumen HTML5 untuk memastikan browser merender halaman menggunakan standar HTML5 -->
<html lang="en">
<!-- Tag pembuka HTML dengan atribut lang="en" yang menunjukkan bahasa dokumen adalah Bahasa Inggris -->

<head>
    <!-- Elemen <head> berisi metadata dan elemen-elemen yang tidak langsung terlihat di halaman -->
    <meta charset="UTF-8">
    <!-- Menentukan karakter encoding dokumen sebagai UTF-8 untuk mendukung berbagai jenis karakter -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Mengatur agar halaman responsif, lebar halaman sesuai dengan perangkat yang digunakan -->
    <link rel="stylesheet" href="../../Assets/CSS/tablestyle.css">
    <!-- Menyertakan file CSS eksternal untuk memberikan gaya pada halaman -->
    <title>Data UKT</title>
    <!-- Judul halaman yang akan tampil di tab browser -->
</head>

<body>
    <!-- Elemen <body> berisi semua konten utama halaman yang akan ditampilkan -->

    <center>
        <!-- Elemen <center> digunakan untuk memusatkan konten di halaman -->

        <h3>Data UKT</h3>
        <!-- Header dengan elemen <h3> yang menampilkan teks "Data UKT" -->

        <a href="tambahUKT.php">tambah data UKT</a>
        <!-- Link untuk menavigasi ke halaman tambah data UKT -->

        <!-- siswa -->
        <!-- Mulai bagian tabel data UKT -->
        <div class="table-container">
            <!-- Elemen <div> dengan class "table-container" untuk membungkus tabel -->
            <table cellpadding="20">
                <!-- Elemen <table> untuk membuat tabel dengan atribut cellpadding="20" yang memberikan jarak antar sel -->

                <thead>
                    <!-- Elemen <thead> untuk membuat header tabel -->
                    <tr>
                        <!-- Elemen <tr> untuk mendefinisikan baris pada header tabel -->
                        <td>No.</td>
                        <!-- Kolom untuk nomor urut -->
                        <td>Nama</td>
                        <!-- Kolom untuk nama -->
                        <td>Semester</td>
                        <!-- Kolom untuk semester -->
                        <td>Tahun ajaran</td>
                        <!-- Kolom untuk tahun ajaran -->
                        <td>Total</td>
                        <!-- Kolom untuk total biaya UKT -->
                        <td>Status</td>
                        <!-- Kolom untuk status UKT -->
                        <td>Action</td>
                        <!-- Kolom untuk aksi (ubah/hapus) -->
                    </tr>
                </thead>

                <?php $i = 1; ?>
                <!-- Variabel PHP $i diinisialisasi dengan nilai 1 sebagai nomor urut -->

                <?php foreach( $ukt as $row): ?>
                <!-- Looping PHP untuk menampilkan setiap data dalam array $ukt -->
                    <tr>
                        <!-- Elemen <tr> untuk membuat baris tabel -->
                        <td><?= $i; ?></td>
                        <!-- Menampilkan nomor urut -->
                        <td><?= $row["name"]; ?></td>
                        <!-- Menampilkan nama dari array PHP -->
                        <td><?= $row["semester"]; ?></td>
                        <!-- Menampilkan semester dari array PHP -->
                        <td><?= $row["year"]; ?></td>
                        <!-- Menampilkan tahun ajaran dari array PHP -->
                        <td>Rp. <?= number_format($row["amount"]) ?></td>
                        <!-- Menampilkan total biaya UKT dalam format angka yang diformat -->
                        <td><?= $row["ukt_status"]; ?></td>
                        <!-- Menampilkan status UKT -->
                        <td>
                            <!-- Kolom untuk aksi -->
                            <a href="ubahUKT.php?id=<?= $row["ukt_id"]; ?>">ubah</a> 
                            <!-- Link untuk mengubah data -->
                            || 
                            <a href="hapusUKT.php?id=<?= $row["ukt_id"]; ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"> Hapus</a>
                            <!-- Link untuk menghapus data dengan konfirmasi -->
                        </td>
                    </tr>
                <?php $i++; ?>
                <!-- Increment variabel $i setelah setiap iterasi -->
                <?php endforeach; ?>
            </table>
        </div>
        <!-- akhir siswa -->
        <!-- Akhir bagian tabel data UKT -->

        <a href="../index.php">kembali</a>
        <!-- Link untuk kembali ke halaman sebelumnya -->

    </center>
</body>
</html>
