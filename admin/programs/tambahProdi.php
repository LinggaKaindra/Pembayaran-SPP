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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Assets/CSS/LoginPetugasSiswaStyle.css">
    <title>Tambah Prodi</title>
</head>
<body>
      <div class="wrapper">
        <header>Halaman Tambah Prodi</header>
        <form action="" method="post">
          <div class="field name">
            <div class="input-area">
              <input type="text" name="name" id="name" autocomplete="off" placeholder="Nama">
            </div>
          </div>
          <div class="field faculty">
            <div class="input-area">
              <input type="text" name="jurusan" id="jurusan" autocomplete="off" placeholder="Jurusan">
            </div>
          </div>
          <input type="submit" name="submit" value="Kirim">
        </form>
      </div>
</body>
</html>