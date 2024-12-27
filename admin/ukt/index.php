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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Assets/CSS/tablestyle.css">
    <title>Document</title>
</head>
<body>
    <center>
        

    <h3>Data UKT</h3>
    <a href="tambahUKT.php">tambah data UKT</a>

    <!-- siswa -->
    <div class="table-container">
    <table cellpadding="20">
        <thead>
        <tr>
            <td>No.</td>
            <td>Nama</td>
            <td>Semester</td>
            <td>Tahun ajaran</td>
            <td>Total</td>
            <td>Status</td>
            <td>Action</td>
        </tr>
        </thead>

        <?php $i = 1; ?>
        <?php foreach( $ukt as $row):?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row["name"]; ?></td>
                <td><?= $row["semester"]; ?></td>
                <td><?= $row["year"]; ?></td>
                <td>Rp. <?= number_format($row["amount"]) ?></td>
                <td><?= $row["ukt_status"]; ?></td>
                <td><a href="ubahUKT.php?id=<?= $row["ukt_id"]; ?>">ubah</a> || <a href="hapusUKT.php?id=<?= $row["ukt_id"]; ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"> Hapus</a></td>
            </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    </div>
    <!-- akhir siswa -->

    <a href="../index.php">kembali</a>

    </center>
</body>
</html>