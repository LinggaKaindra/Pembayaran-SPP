<?php 

require "../../functions.php";
$id = $_GET["id"];

$pengguna = query("SELECT * FROM users WHERE id = $id");

if (isset($_POST["submit"])) {
    
    if (ubahPeng($_POST)) {
        header("location: index.php");
    }
}

// var_dump($petugas);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <h1>Halaman Registrasi Pengguna</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $pengguna[0]["id"]; ?>">
        <label for="username">Username : </label>
        <input type="text" name="username" id="username" autocomplete="off" value="<?= $pengguna[0]["username"]; ?>">
        <br>
        <label for="email">email : </label>
        <input type="email" name="email" id="email" autocomplete="off" value="<?= $pengguna[0]["email"]; ?>">
        <br>
        <label for="password">Password : </label>
        <input type="password" name="password" id="password" autocomplete="off" value="<?= $pengguna[0]["password"]; ?>">
        <br>
        <label for="level">Role : </label>
        <select name="level" id="level">
            <option value="admin" >Admin</option>
            <option value="petugas">Petugas</option>
        </select>
        <br>
        <button type="submit" name="submit">Kirim</button>
    </form>
    
</head>
<body>
    
</body>
</html>