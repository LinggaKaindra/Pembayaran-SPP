<?php 

require "../../functions.php";

if (isset($_POST["submit"])) {
    
    if (regisPeng($_POST)) {
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

    <h1>Halaman Registrasi Pengguna</h1>
    <form action="" method="post">
        <label for="username">Username : </label>
        <input type="text" name="username" id="username" autocomplete="off">
        <br>
        <label for="email">email : </label>
        <input type="email" name="email" id="email" autocomplete="off">
        <br>
        <label for="password">Password : </label>
        <input type="password" name="password" id="password" autocomplete="off">
        <br>
        <label for="level">Role : </label>
        <select name="level" id="level">
            <option value="admin">Admin</option>
            <option value="petugas">Petugas</option>
        </select>
        <br>
        <button type="submit" name="submit">Kirim</button>
    </form>
    
</head>
<body>
    
</body>
</html>