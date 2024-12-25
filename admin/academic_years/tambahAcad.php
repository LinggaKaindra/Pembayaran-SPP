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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Assets/CSS/LoginPetugasSiswaStyle.css">
    <title>Tambah Data Tahun Ajaran</title>
</head>
<body>
      <div class="wrapper">
        <header>Halaman Tambah Data Tahun Ajaran</header>
        <form action="" method="post">
          <div class="field semester">
            <div class="select-area">
              <select name="semester" id="semester">
                <option value="1">1</option>
                <option value="2">2</option>
              </select>
            </div>
          </div>
          <div class="field status">
            <div class="select-area">
              <select name="status" id="status">
                <option value="active">Active</option>
                <option value="inactive">INActive</option>
              </select>
            </div>
          </div>
          <input type="submit" name="submit" value="Kirim">
        </form>
      </div>
</body>
</html>