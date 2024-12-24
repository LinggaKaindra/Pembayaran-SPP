<?php

    require '../../functions.php';
    $method = query("SELECT * FROM payment_methods");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <h3>Data payment_methods</h3>
    <a href="tambahPaymentMethod.php">tambah data payment_methods</a>

    <!-- siswa -->
    <table border="2" cellpadding="20" cellspacing="0">
        <tr>
            <td>No.</td>
            <td>Nama</td>
            <td>Action</td>
        </tr>

        <?php $i = 1; ?>
        <?php foreach( $method as $row):?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row["name"]; ?></td>
                <td><a href="ubahPaymentMethod.php?id=<?= $row["id"]; ?>">ubah</a> || <a href="hapusPaymentMethod.php?id=<?= $row["id"]; ?>"> Hapus</a></td>
            </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    <!-- akhir siswa -->

    <a href="../index.php">kembali</a>

</body>
</html>