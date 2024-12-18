<?php 


require "../../functions.php";
$id = $_GET["id"];

$academic = query("SELECT * FROM academic_years WHERE id = $id");

if (isset($_POST["submit"])) {
    
    if (ubahTahun($_POST)) {
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
        <input type="hidden" name="id" value="<?= $academic[0]["id"]; ?>">
        <label for="years">years : </label>
        <input type="text" name="year" id="years" autocomplete="off" value="<?= $academic[0]["year"]; ?>">
        <br>
        <label for="semester">semester : </label>
        <select name="semester" id="semester" value="<?= $academic[0]["semester"]; ?>">
                <option value="1">1</option>
                <option value="2">2</option>
        </select>
        <br>
        <label for="status">Status</label>
        <select name="status" id="status"   value="<?= $academic[0]["status"]; ?>">
                <option value="active">Active</option>
                <option value="inactive">INActive</option>
        </select>
        <button type="submit" name="submit">Kirim</button>
    </form>
    
</head>
<body>
    
</body>
</html>