<?php 

require"../functions.php";

    if (isset($_POST["submit"])) {
        
        if(regisPeng($_POST)){
            header("location: index.php");
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Petugas</title>
</head>
<body>

    <h1>Halaman Registrasi Petugas</h1>

    <form action="" method="post">
        <label for="username">Username : </label>
        <input type="text" name="username" id="username" autocomplete="off">
        <br>
        <label for="namaPetugas">Nama Petugas : </label>
        <input type="text" name="namaPetugas" id="namaPetugas" autocomplete="off">
        <br>
        <label for="email">Email : </label>
        <input type="email" name="email" id="email" autocomplete="off">
        <br>
        <label for="password">Password : </label>
        <input type="password" name="password" id="password" autocomplete="off">
        <br>
        <p><a href="index.php">Sudah punya akun?</a></p>
        <button type="submit" name="submit">Kirim</button>
    </form>
    
</body>
</html>