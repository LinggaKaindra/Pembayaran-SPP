<?php

    session_start();
    require "../../functions.php";
    
    if (!isset($_SESSION["loggedin"])) {
        header("Location: ../login.php");
        exit;
    }

    $id = $_GET['id'];

    $payments = query("SELECT 
                    payments.id AS paymentId,
                    payments.paid_date AS paid_date,
                    payments.amount_paid as amount_paid,
                    payments.receipt_url as receipt_url,
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


    // var_dump($payments);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/StyleSiswa.css">
</head>
<body>
    <div class="container detail">
        <h3>Data Pembayaran</h3>
        <div class="payment-cards">
            <?php foreach ($payments as $row): ?>
                <div class="payment-card">
                    <p><strong>No:</strong> <?= $row["paymentId"]; ?></p>
                    <p><strong>NIM:</strong> <?= $row["nim"]; ?></p>
                    <p><strong>Student Name:</strong> <?= $row["name"]; ?></p>
                    <p><strong>Tahun & Semester:</strong> <?= $row["year"] . '-' . $row["semester"]; ?></p>
                    <p><strong>Fakultas:</strong> <?= $row["faculty"]; ?></p>
                    <p><strong>Payment Method:</strong> <?= $row["method_name"]; ?></p>
                    <p><strong>Payment Date:</strong> <?= $row["paid_date"]; ?></p>
                    <p><strong>Payment Amount:</strong> Rp. <?= number_format($row["amount_paid"]); ?></p>
                    <p><strong>Status:</strong> <?= $row["status"]; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <a href="index.php" class="btn-back">Kembali</a>
    </div>
    
</body>
</html>