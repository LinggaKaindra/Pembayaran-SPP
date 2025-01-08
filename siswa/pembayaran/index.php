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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pembayaran Siswa</title>
    <link rel="stylesheet" href="../../assets/css/StyleSiswa.css">
</head>
<body>  
    
    <div class="LowerBar">
        <ul>
            <li><a href="../../logout.php">Log out</a></li>
        </ul>
    </div>

    <div class="container">
        <div class="row">
            <div class="img gap w-40">
                <img src="../../assets/img/blank-profile.png" alt="Profile Picture" class="profile-img" width="150">
            </div>
            <div class="content w-60">
                <p class="welcome-text">Selamat datang</p>
                <p>Name : <?= $student['student_name']; ?></p>
                <p>NIM : <?= $student['nim']; ?></p>
                <p>Email : <?= $student['email']; ?></p>
                <p>Fakultas : <?= $student['faculty']; ?></p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <h3>Data pembayaran</h3>
            <table>
                <tr>
                    <th>No.</th>
                    <th>NIM</th>
                    <th>Student Name</th>
                    <th>Tahun & Semester</th>
                    <th>Fakultas</th>
                    <th>Payment Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

                <?php $i = 1; ?>
                <?php foreach ($payments as $row): ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $row["nim"]; ?></td>
                        <td><?= $row["name"]; ?></td>
                        <td><?= $row["year"] . '-' . $row["semester"] ?></td>
                        <td><?= $row["faculty"]; ?></td>
                        <td>Rp. <?= number_format($row["amount_paid"]); ?></td>
                        <td><?= $row["status"]; ?></td>
                        <td><a href="detailPemb.php?id=<?= $row['paymentId'] ?>">Detail</a></td>
                    </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    
</body>
</html>