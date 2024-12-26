<?php 

require "../../functions.php";

if (isset($_POST["submit"])) {
    
    if (regisPeng($_POST)) {
        header("location: index.php");
    }else{
      echo "<script>alert('Terjadi kesalahan: " . mysqli_error($conn) . "');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Assets/CSS/LoginPetugasSiswaStyle.css">
    <title>Registrasi Petugas</title>
</head>
<body>
      <div class="wrapper">
        <header>Halaman Registrasi Pengguna</header>
        <form action="" method="post">
          <div class="field username">
            <div class="input-area">
              <input type="text" name="username"  id="username" autocomplete="off" placeholder="Username">
            </div>
          </div>
          <div class="field email">
            <div class="input-area">
              <input type="email" name="email" id="email" autocomplete="off" placeholder="Email">
            </div>
          </div>
          <div class="field password">
        <div class="input-area">
                <input type="password" name="password" id="password" autocomplete="off" placeholder="Password">
                <button type="button" id="togglePassword" class="toggle-password">👁️</button>
            </div>
        </div>
          <div class="field role">
            <div class="select-area">
                <select name="level" id="level">
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                </select>
            </div>
          </div>
          <input type="submit" name="submit" value="Kirim">
        </form>
      </div>
    <script src="../../Assets/JS/togglePassword.js"></script>
</body>
</html>