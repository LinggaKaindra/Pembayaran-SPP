<?php 

require "../../functions.php";

if (isset($_POST["submit"])) {
    
    if (tambahPaymentMethod($_POST)) {
        header("location: index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <h1>Halaman Tambah payment_methods</h1>
    <form action="" method="post">
        <label for="name">name : </label>
        <input type="text" name="name" id="name" autocomplete="off">
        <br>
        <button type="submit" name="submit">Kirim</button>
    </form>
    
</head>
<body>
    
</body>
</html>