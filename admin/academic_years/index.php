<?php

    require '../../functions.php';
    $academics = query("SELECT * FROM academic_years");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <h3>Data Prodi</h3>
    <a href="tambahAcad.php">tambah data Prodi</a>

    <!-- siswa -->
    <table border="2" cellpadding="20" cellspacing="0">
        <tr>
            <td>No.</td>
            <td>Year</td>
            <td>Semester</td>
            <td>status</td>
            <td>Action</td>
        </tr>

        <?php $i = 1; ?>
        <?php foreach( $academics as $row):?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row["year"]; ?></td>
                <td><?= $row["semester"]; ?></td>
                <td><?= $row["status"]; ?></td>
                <td><a href="ubahAcad.php?id=<?= $row["id"]; ?>">ubah</a> || <a href="hapusAcad.php?id=<?= $row["id"]; ?>"> Hapus</a></td>
            </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    <!-- akhir siswa -->

</body>
</html>