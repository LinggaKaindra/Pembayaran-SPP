<?php 


require "../../functions.php";
$id = $_GET["id"];

$prodi = query("SELECT * FROM programs WHERE id = $id");

if (isset($_POST["submit"])) {
    
    if (ubahProd($_POST)) {
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

    <h1>Halaman Ubah Prodi</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $prodi[0]["id"]; ?>">
        <label for="nama">nama : </label>
        <input type="text" name="nama" id="nama" autocomplete="off" value="<?= $prodi[0]["name"]; ?>">
        <br>
        <label for="jurusan">jurusan : </label>
        <input type="text" name="jurusan" id="jurusan" autocomplete="off" value="<?= $prodi[0]["faculty"]; ?>">
        <br>
        <button type="submit" name="submit">Kirim</button>
    </form>
    
</head>
<body>
    
</body>
</html>