<?php

    require '../../functions.php';
    $ukt = query("
            SELECT 
                    ukt.*,
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
    <title>Document</title>
</head>
<body>
    

    <h3>Data UKT</h3>
    <a href="tambahUKT.php">tambah data UKT</a>

    <!-- siswa -->
    <table border="2" cellpadding="20" cellspacing="0">
        <tr>
            <td>No.</td>
            <td>Nama</td>
            <td>Tahun ajaran</td>
            <td>Total</td>
            <td>Status</td>
            <td>Action</td>
        </tr>

        <?php $i = 1; ?>
        <?php foreach( $ukt as $row):?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row["name"]; ?></td>
                <td><?= $row["year"]; ?></td>
                <td>Rp. <?= number_format($row["amount"]) ?></td>
                <td><?= $row["status"]; ?></td>
                <td><a href="ubahUKT.php?id=<?= $row["id"]; ?>">ubah</a> || <a href="hapusUKT.php?id=<?= $row["id"]; ?>"> Hapus</a></td>
            </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    <!-- akhir siswa -->

</body>
</html>