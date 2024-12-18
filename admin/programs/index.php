<?php

    require '../../functions.php';
    $prodi = query("SELECT * FROM programs");

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
    <a href="tambahProdi.php">tambah data Prodi</a>

    <!-- siswa -->
    <table border="2" cellpadding="20" cellspacing="0">
        <tr>
            <td>No.</td>
            <td>Nama</td>
            <td>Jurusan</td>
            <td>Action</td>
        </tr>

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
    <!-- akhir siswa -->

</body>
</html>