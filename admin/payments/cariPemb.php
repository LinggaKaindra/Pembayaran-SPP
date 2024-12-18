<?php 

require "../../functions.php";

if (isset($_POST["submit"])) {
    
    if (cariPemb($_POST)) {
        header("location: tambahPemb.php?nim=".$_POST["nim"]);
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <h1>Halaman Registrasi Pembayaran</h1>
    <form action="" method="post">
        <label for="nim">nim : </label>
        <input type="text" name="nim" id="nim" autocomplete="off">
        <br>
        <button type="submit" name="submit">Kirim</button>
    </form>
    
</head>
<body>
    
</body>
</html>