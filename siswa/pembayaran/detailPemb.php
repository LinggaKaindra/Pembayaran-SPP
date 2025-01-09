<?php

    session_start();
    require "../../functions.php";

    if (!isset($_SESSION["loggedin"])) {
        header("Location: ../loginPetugas.php");
        exit;
    }

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
<html lang="en">
<head>
    <!--
    <!DOCTYPE html>: Menentukan tipe dokumen sebagai HTML5.
    <html lang="en">: Elemen root dokumen HTML dengan atribut "lang" untuk menetapkan bahasa utama (English).
    -->
    <meta charset="UTF-8">
    <!-- <meta charset="UTF-8">: Menentukan karakter encoding dokumen sebagai UTF-8. -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="viewport">: Mengatur tampilan agar responsif pada berbagai ukuran layar. -->
    <title>Detail Pembayaran</title>
    <!-- <title>: Menentukan judul halaman yang ditampilkan di tab browser. -->
    <link rel="stylesheet" href="../../assets/css/StyleSiswa.css">
    <!-- <link rel="stylesheet">: Menyertakan file CSS eksternal untuk mendesain halaman. -->
</head>
<body>
    <!-- <body>: Elemen utama untuk memuat seluruh konten visual halaman web. -->
    <div class="container detail">
        <!-- <div class="container detail">: Container utama untuk konten detail pembayaran. -->
        <h3>Data Pembayaran</h3>
        <!-- <h3>: Menampilkan heading "Data Pembayaran" sebagai judul bagian ini. -->
        <div class="payment-cards">
            <!-- <div class="payment-cards">: Container untuk kartu pembayaran individual. -->
            <?php foreach ($payments as $row): ?>
                <!-- PHP loop untuk menampilkan data pembayaran dari array $payments. -->
                <div class="payment-card">
                    <!-- <div class="payment-card">: Container untuk satu kartu pembayaran. -->
                    <p><strong>No:</strong> <?= $row["paymentId"]; ?></p>
                    <!-- Menampilkan nomor pembayaran dari array $row. -->
                    <p><strong>NIM:</strong> <?= $row["nim"]; ?></p>
                    <!-- Menampilkan NIM mahasiswa dari array $row. -->
                    <p><strong>Student Name:</strong> <?= $row["name"]; ?></p>
                    <!-- Menampilkan nama mahasiswa dari array $row. -->
                    <p><strong>Tahun & Semester:</strong> <?= $row["year"] . '-' . $row["semester"]; ?></p>
                    <!-- Menampilkan tahun dan semester dari array $row. -->
                    <p><strong>Fakultas:</strong> <?= $row["faculty"]; ?></p>
                    <!-- Menampilkan fakultas dari array $row. -->
                    <p><strong>Payment Method:</strong> <?= $row["method_name"]; ?></p>
                    <!-- Menampilkan metode pembayaran dari array $row. -->
                    <p><strong>Payment Date:</strong> <?= $row["paid_date"]; ?></p>
                    <!-- Menampilkan tanggal pembayaran dari array $row. -->
                    <p><strong>Payment Amount:</strong> Rp. <?= number_format($row["amount_paid"]); ?></p>
                    <!-- Menampilkan jumlah pembayaran dalam format angka Indonesia dari array $row. -->
                    <p><strong>Status:</strong> <?= $row["status"]; ?></p>
                    <!-- Menampilkan status pembayaran dari array $row. -->
                </div>
            <?php endforeach; ?>
        </div>

        <?php if($payments[0]["status"] == "confirmed"): ?>
            <!-- Kondisi PHP untuk memeriksa apakah status pembayaran pertama adalah "confirmed". -->
            <button class="btn-print" onclick="window.print()">Print</button>
            <!-- <button>: Tombol untuk mencetak halaman menggunakan fungsi JavaScript window.print(). -->
        <?php endif;?>
        <a href="index.php" class="btn-back">Kembali</a>
        <!-- <a href="index.php">: Tautan untuk kembali ke halaman index. -->
    </div>
</body>
</html>
