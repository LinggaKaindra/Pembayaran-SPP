<?php 
session_start();

if (!isset($_SESSION["loggedin"])) {
    header("Location: ../login.php");
    exit;
}

require "../functions.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../NavbarStyle.css">
    <title>Document</title>
</head>
<body>
    <div class="UpperBar">
        <label class="Logo">Selamat datang Admin</label>
    </div>
    <?php
        if ($_SESSION["role"] === 'admin') {
            echo '
                <div class="LowerBar">
                    <ul>
                        <li><a href="users/index.php">User</a></li>
                        <li><a href="students/index.php">Siswa</a></li>
                        <li><a href="ukt/index.php">UKT</a></li>
                        <li><a href="payments/index.php">SPP</a></li>
                        <li><a href="payment_methods/index.php">Metode Pembayaran</a></li>
                        <li><a href="programs/index.php">Prodi</a></li>
                        <li><a href="academic_years/index.php">Tahun Ajaran</a></li>
                        <li><a href="../logout.php">Log out</a></li>
                    </ul>
                </div>
            ';
        } else {
            echo '
                <div class="LowerBar">
                    <ul>
                        <li><a href="students/index.php">Siswa</a></li>
                        <li><a href="payments/index.php">Pembayaran</a></li>
                        <li><a href="../logout.php">Log out</a></li>
                    </ul>
                </div>
            ';
        }
    ?>
</body>
</html>