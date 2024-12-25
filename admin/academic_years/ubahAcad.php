<?php 


require "../../functions.php";
$id = $_GET["id"];

$academic = query("SELECT * FROM academic_years WHERE id = $id");

if (isset($_POST["submit"])) {
    
    if (ubahTahun($_POST)) {
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
    <title>Ubah Data Tahun Ajaran</title>
</head>
<body>
  <input type="hidden" name="id" value="<?= $academic[0]["id"]; ?>">
      <div class="wrapper">
        <header>Halaman Ubah Data Tahun Ajaran</header>
        <form action="" method="post">
          <div class="field year">
            <div class="input-area">
              <input type="text" name="year" id="years" autocomplete="off" value="<?= $academic[0]["year"]; ?>">
            </div>
          </div>
          <div class="field semester">
            <div class="select-area">
              <select name="semester" id="semester" value="<?= $academic[0]["semester"]; ?>">
                <option value="1">1</option>
                <option value="2">2</option>
              </select>
            </div>
          </div>
          <div class="field status">
            <div class="select-area">
              <select name="status" id="status"   value="<?= $academic[0]["status"]; ?>">
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