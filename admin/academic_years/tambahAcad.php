<?php 

require "../../functions.php";

if (isset($_POST["submit"])) {
    
    if (tambahTahun($_POST)) {
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
        <label for="years">years : </label>
        <input type="text" name="year" id="years" autocomplete="off">
        <br>
        <label for="semester">semester : </label>
        <select name="semester" id="semester">
                <option value="1">1</option>
                <option value="2">2</option>
        </select>
        <br>
        <label for="status">Status</label>
        <select name="status" id="status">
                <option value="active">Active</option>
                <option value="inactive">INActive</option>
        </select>
        <button type="submit" name="submit">Kirim</button>
    </form>
    
</head>
<body>
    
</body>
</html>