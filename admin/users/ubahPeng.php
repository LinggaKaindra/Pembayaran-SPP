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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Assets/CSS/LoginPetugasSiswaStyle.css">
    <title>Ubah data Registrasi Pengguna</title>
</head>
<body>
  <input type="hidden" name="id" value="<?= $pengguna[0]["id"]; ?>">
      <div class="wrapper">
        <header>Halaman Registrasi Pengguna</header>
        <form action="" method="post">
          <div class="field username">
            <div class="input-area">
              <input type="text" name="username" id="username" autocomplete="off" value="<?= $pengguna[0]["username"]; ?>">
            </div>
          </div>
          <div class="field email">
            <div class="input-area">
              <input type="email" name="email" id="email" autocomplete="off" value="<?= $pengguna[0]["email"]; ?>">
            </div>
          </div>
          <div class="field password">
            <div class="input-area">
              <input type="password" name="password" id="password" autocomplete="off" value="<?= $pengguna[0]["password"]; ?>">
            </div>
          </div>
          <div class="field role">
            <div class="select-area">
              <select name="level" id="level">
                <option value="admin" >Admin</option>
                <option value="petugas">Petugas</option>
              </select>
            </div>
          </div>
          <input type="submit" name="submit" value="Kirim">
        </form>
      </div>
</body>
</html>