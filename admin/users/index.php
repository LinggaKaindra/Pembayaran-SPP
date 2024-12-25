<?php
    require "../../functions.php";

    $pengguna = query("SELECT * FROM users");
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

    <h3>Data Pengguna</h3>
    <a href="tambahPeng.php">tambah data pengguna</a>

    
    <table border="2" cellpadding="20" cellspacing="0">
        <tr>
            <td>No.</td>
            <td>username</td>
            <td>email</td>
            <td>role</td>
            <td>action</td>
        </tr>

        <?php $i = 1; ?>
        <?php foreach( $pengguna as $row):?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row["username"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["role"]; ?></td>
                <td><a href="ubahPeng.php?id=<?= $row["id"]; ?>">ubah</a> || <a href="hapusPeng.php?id=<?= $row["id"]; ?>"> Hapus</a></td>
            </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    <!-- akhir siswa -->

    <a href="../index.php">kembali</a>

    
</body>
</html>