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
    <title>Document</title>
</head>
<body>
    
    <h1>Selamat datang Admin</h1>
    <br><br>

    <?php
        if ($_SESSION["role"] === 'admin') {
            echo '
                <h4><a href="users/index.php">User</a></h4>
                <h4><a href="students/index.php">Siswa</a></h4>
                <h4><a href="ukt/index.php">UKT</a></h4>
                <h4><a href="payments/index.php">Pembayaran</a></h4>
                <h4><a href="payment_methods/index.php">Metode Pembayaran</a></h4>
                <h4><a href="programs/index.php">Prodi</a></h4>
                <h4><a href="academic_years/index.php">Tahun Ajaran</a></h4>
            ';
        } else {
            echo '
                <h4><a href="students/index.php">Siswa</a></h4>
                <h4><a href="payments/index.php">Pembayaran</a></h4>
            ';
        }
    ?>

    <a href="../logout.php">Log Out</a> 

</body>
</html>