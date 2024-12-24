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
    <link rel="stylesheet" href="../Assets/CSS/LoginPetugasSiswaStyle.css">
    <title>Registrasi Petugas</title>
</head>
<body>
      <div class="wrapper">
        <header>Halaman Registrasi Petugas</header>
        <form action="" method="post">
          <div class="field username">
            <div class="input-area">
              <input type="text" name="username"  id="username" autocomplete="off" placeholder="Username">
            </div>
          </div>
          <div class="field officer">
            <div class="input-area">
              <input type="text" name="namaPetugas"  id="namaPetugas" autocomplete="off" placeholder="Nama Petugas">
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
            </div>
          </div>
          <input type="submit" value="Kirim">
          <a href="loginPetugas.php">Sudah punya akun?</a>
        </form>
      </div>
</body>
</html>