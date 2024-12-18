<?php 

require "../../functions.php";

if (isset($_POST["submit"])) {
    
    if (tambahProdi($_POST)) {
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

    <h1>Halaman Tambah Prodi</h1>
    <form action="" method="post">
        <label for="nama">nama : </label>
        <input type="text" name="nama" id="nama" autocomplete="off">
        <br>
        <label for="jurusan">jurusan : </label>
        <input type="text" name="jurusan" id="jurusan" autocomplete="off">
        <br>
        <button type="submit" name="submit">Kirim</button>
    </form>
    
</head>
<body>
    
</body>
</html>