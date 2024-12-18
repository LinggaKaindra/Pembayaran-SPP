<?php 


require "../../functions.php";
$id = $_GET["id"];

$method = query("SELECT * FROM payment_methods WHERE id = $id");

if (isset($_POST["submit"])) {
    
    if (ubahPaymentMethod($_POST)) {
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
        <input type="hidden" name="id" value="<?= $method[0]["id"]; ?>">
        <label for="name">name : </label>
        <input type="text" name="name" id="name" autocomplete="off" value="<?= $method[0]["name"]; ?>">
        <br>
        <button type="submit" name="submit">Kirim</button>
    </form>
    
</head>
<body>
    
</body>
</html>