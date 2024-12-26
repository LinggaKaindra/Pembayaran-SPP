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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Assets/CSS/LoginPetugasSiswaStyle.css">
    <title>Ubah Data Prodi</title>
</head>
<body>
  <div class="wrapper">
    <header>Halaman Ubah Prodi</header>
    <form action="" method="post">
          <input type="hidden" name="id" value="<?= $prodi[0]["id"]; ?>">
          <div class="field name">
            <div class="input-area">
              <input type="text" name="name" id="nama" autocomplete="off" value="<?= $prodi[0]["name"]; ?>">
            </div>
          </div>
          <div class="field faculty">
            <div class="input-area">
              <input type="text" name="jurusan" id="jurusan" autocomplete="off" value="<?= $prodi[0]["faculty"]; ?>">
            </div>
          </div>
          <input type="submit" name="submit" value="Kirim">
        </form>
      </div>
</body>
</html>