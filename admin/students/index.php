<?php
    require '../../functions.php';

    $siswa = query("SELECT students.*, students.id as studentId, programs.*
                FROM students
                INNER JOIN programs ON students.program_id = programs.id;
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
    
  <h3>Data Siswa</h3>
    <a href="tambahSis.php">tambah data siswa</a>

    <!-- siswa -->
    <div class="table-container">
    <table cellpadding="20">
        <thead>
        <tr>
            <th>No.</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No Telepon</th>
            <th>Kelas</th>
            <th>aksi</th>
        </tr>
        </thead>

        <?php $i = 1; ?>
        <?php foreach( $siswa as $row):?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row["nim"]; ?></td>
                <td><?= $row["name"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["phone"]; ?></td> 
                <td><?= $row["faculty"]; ?></td> 
                <td><a href="ubahSis.php?id=<?= $row["studentId"]; ?>">ubah</a> || <a href="hapusSis.php?id=<?= $row["studentId"]; ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"> Hapus</a></td>
            </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    </div>
    
    <a href="../index.php">kembali</a>
    
</center>
</body>
</html>