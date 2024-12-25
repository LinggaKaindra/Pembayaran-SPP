<?php

    require '../../functions.php';
    $prodi = query("SELECT * FROM programs");

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
        

    <h3>Data Prodi</h3>
    <a href="tambahProdi.php">tambah data Prodi</a>

    <!-- siswa -->
    <div class="table-container">
    <table cellpadding="20">
        <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Action</th>
        </tr>
        </thead>

        <?php $i = 1; ?>
        <?php foreach( $prodi as $row):?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row["name"]; ?></td>
                <td><?= $row["faculty"]; ?></td>
                <td><a href="ubahProdi.php?id=<?= $row["id"]; ?>">ubah</a> || <a href="hapusProdi.php?id=<?= $row["id"]; ?>"> Hapus</a></td>
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