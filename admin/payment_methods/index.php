<?php

    session_start();

    if (!isset($_SESSION["loggedin"])) {
        header("Location: ../loginPetugas.php");
        exit;
    }
    require '../../functions.php';
    $method = query("SELECT * FROM payment_methods");

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
        

    <h3>Data payment_methods</h3>
    <a href="tambahPaymentMethod.php">tambah data payment_methods</a>

    <!-- siswa -->
     <div class="table-container">
     <table cellpadding="20">
        <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Action</th>
        </tr>
        </thead>

        <?php $i = 1; ?>
        <?php foreach( $method as $row):?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row["name"]; ?></td>
                <td><a href="ubahPaymentMethod.php?id=<?= $row["id"]; ?>">ubah</a> || <a href="hapusPaymentMethod.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"> Hapus</a></td>
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