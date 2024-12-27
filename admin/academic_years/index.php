<?php

    session_start();

    if (!isset($_SESSION["loggedin"])) {
        header("Location: ../loginPetugas.php");
        exit;
    }
    require '../../functions.php';
    $academics = query("SELECT * FROM academic_years");

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
        

    <h3>Data Tahun Ajaran</h3>
    <a href="tambahAcad.php">tambah data Tahun Ajaran</a>

    <!-- siswa -->
    <div class="table-container">
    <table cellpadding="20">
        <thead>
        <tr>
            <th>No.</th>
            <th>Year</th>
            <th>Semester</th>
            <th>status</th>
            <th>Action</th>
        </tr>
        </thead>

        <?php $i = 1; ?>
        <?php foreach( $academics as $row):?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row["year"]; ?></td>
                <td><?= $row["semester"]; ?></td>
                <td><?= $row["status"]; ?></td>
                <td><a href="ubahAcad.php?id=<?= $row["id"]; ?>">ubah</a> || <a href="hapusAcad.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"> Hapus</a></td>
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