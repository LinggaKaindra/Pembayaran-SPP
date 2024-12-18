<?php
    require '../../functions.php';

    $siswa = query("SELECT *
                FROM students
                INNER JOIN programs ON students.program_id = programs.id;
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

  <h3>Data Siswa</h3>
    <a href="tambahSis.php">tambah data siswa</a>

    <!-- siswa -->
    <table border="2" cellpadding="20" cellspacing="0">
        <tr>
            <td>No.</td>
            <td>NIM</td>
            <td>Nama</td>
            <td>Email</td>
            <td>No Telepon</td>
            <td>Kelas</td>
            <td>aksi</td>
        </tr>

        <?php $i = 1; ?>
        <?php foreach( $siswa as $row):?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row["nim"]; ?></td>
                <td><?= $row["name"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["phone"]; ?></td> 
                <td><?= $row["faculty"]; ?></td> 
                <td><a href="ubahSis.php?id=<?= $row["id"]; ?>">ubah</a> || <a href="hapusSis.php?id=<?= $row["id"]; ?>"> Hapus</a></td>
            </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    <!-- akhir siswa
    
</body>
</html>