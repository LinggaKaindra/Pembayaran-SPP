<?php
    session_start();
    require "../../functions.php";

    if (!isset($_SESSION["loggedin"])) {
        header("Location: ../loginPetugas.php");
        exit;
    }

    $nim = $_SESSION['nim'];


    $payments = query("SELECT 
                    payments.id AS paymentId,
                    payments.paid_date AS paid_date,
                    payments.amount_paid as amount_paid,
                    ukt.status as status,
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
                WHERE students.nim = $nim
                ");
    $student = query("SELECT students.*, programs.*, students.name as student_name FROM students LEFT JOIN programs on students.program_id = programs.id WHERE nim = $nim")[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
    <!DOCTYPE html>: Menentukan tipe dokumen sebagai HTML5.
    <html lang="en">: Elemen root HTML dengan atribut "lang" untuk menyatakan bahasa dokumen adalah English.
    -->
    <meta charset="UTF-8">
    <!-- <meta charset="UTF-8">: Menentukan encoding karakter sebagai UTF-8. -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="viewport">: Memastikan halaman responsif pada perangkat dengan berbagai ukuran layar. -->
    <title>Data Pembayaran Siswa</title>
    <!-- <title>: Menentukan judul halaman web yang akan ditampilkan di tab browser. -->
    <link rel="stylesheet" href="../../assets/css/StyleSiswa.css">
    <!-- <link rel="stylesheet">: Menghubungkan file CSS eksternal untuk menata halaman. -->
</head>
<body>  
    <!-- <body>: Elemen utama untuk konten visual halaman. -->
    <div class="LowerBar">
        <!-- <div class="LowerBar">: Bagian navigasi bawah yang menampilkan tautan logout. -->
        <ul>
            <li><a href="../../logout.php">Log out</a></li>
            <!-- <a href="../../logout.php">: Tautan untuk keluar dari sesi pengguna. -->
        </ul>
    </div>

    <div class="container">
        <!-- <div class="container">: Container utama untuk konten informasi pengguna. -->
        <div class="row">
            <!-- <div class="row">: Baris untuk membagi layout antara gambar profil dan informasi. -->
            <div class="img gap w-40">
                <!-- <div class="img gap w-40">: Kolom untuk menampilkan gambar profil. -->
                <img src="../../assets/img/blank-profile.png" alt="Profile Picture" class="profile-img" width="150">
                <!-- <img>: Gambar profil dengan atribut alt untuk teks alternatif. -->
            </div>
            <div class="content w-60">
                <!-- <div class="content w-60">: Kolom untuk menampilkan informasi mahasiswa. -->
                <p class="welcome-text">Selamat datang</p>
                <!-- <p class="welcome-text">: Menampilkan teks sambutan. -->
                <p>Name : <?= $student['student_name']; ?></p>
                <!-- Menampilkan nama mahasiswa dari variabel PHP $student. -->
                <p>NIM : <?= $student['nim']; ?></p>
                <!-- Menampilkan NIM mahasiswa dari variabel PHP $student. -->
                <p>Email : <?= $student['email']; ?></p>
                <!-- Menampilkan email mahasiswa dari variabel PHP $student. -->
                <p>Fakultas : <?= $student['faculty']; ?></p>
                <!-- Menampilkan fakultas mahasiswa dari variabel PHP $student. -->
            </div>
        </div>
    </div>

    <div class="container">
        <!-- <div class="container">: Container utama untuk tabel data pembayaran. -->
        <div class="row">
            <!-- <div class="row">: Baris untuk menampilkan tabel data pembayaran. -->
            <h3>Data pembayaran</h3>
            <!-- <h3>: Menampilkan judul bagian tabel "Data pembayaran". -->
            <table>
                <!-- <table>: Elemen tabel untuk menyusun data pembayaran. -->
                <tr>
                    <th>No.</th>
                    <!-- <th>: Header kolom untuk nomor. -->
                    <th>NIM</th>
                    <!-- <th>: Header kolom untuk NIM mahasiswa. -->
                    <th>Student Name</th>
                    <!-- <th>: Header kolom untuk nama mahasiswa. -->
                    <th>Tahun & Semester</th>
                    <!-- <th>: Header kolom untuk tahun dan semester pembayaran. -->
                    <th>Fakultas</th>
                    <!-- <th>: Header kolom untuk fakultas mahasiswa. -->
                    <th>Payment Amount</th>
                    <!-- <th>: Header kolom untuk jumlah pembayaran. -->
                    <th>Status</th>
                    <!-- <th>: Header kolom untuk status pembayaran. -->
                    <th>Action</th>
                    <!-- <th>: Header kolom untuk aksi pada data pembayaran. -->
                </tr>

                <?php $i = 1; ?>
                <!-- Inisialisasi variabel PHP untuk nomor urut tabel. -->
                <?php foreach ($payments as $row): ?>
                    <!-- Looping PHP untuk menampilkan data pembayaran dari array $payments. -->
                    <tr>
                        <td><?= $i; ?></td>
                        <!-- Menampilkan nomor urut. -->
                        <td><?= $row["nim"]; ?></td>
                        <!-- Menampilkan NIM dari array $row. -->
                        <td><?= $row["name"]; ?></td>
                        <!-- Menampilkan nama dari array $row. -->
                        <td><?= $row["year"] . '-' . $row["semester"] ?></td>
                        <!-- Menampilkan tahun dan semester dari array $row. -->
                        <td><?= $row["faculty"]; ?></td>
                        <!-- Menampilkan fakultas dari array $row. -->
                        <td>Rp. <?= number_format($row["amount_paid"]); ?></td>
                        <!-- Menampilkan jumlah pembayaran dalam format angka Indonesia dari array $row. -->
                        <td><?= $row["status"]; ?></td>
                        <!-- Menampilkan status pembayaran dari array $row. -->
                        <td><a href="detailPemb.php?id=<?= $row['paymentId'] ?>">Detail</a></td>
                        <!-- Tautan untuk melihat detail pembayaran berdasarkan ID pembayaran. -->
                    </tr>
                <?php $i++; ?>
                <!-- Increment nomor urut. -->
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    
</body>
</html>
