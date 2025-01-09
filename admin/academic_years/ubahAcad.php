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
    <!-- Deklarasi dokumen HTML5 -->
    <meta charset="UTF-8"> 
    <!-- Menentukan karakter encoding dokumen -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <!-- Memastikan kompatibilitas dengan Internet Explorer -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <!-- Memastikan desain responsif pada perangkat berbeda -->
    <link rel="stylesheet" href="../../Assets/CSS/LoginPetugasSiswaStyle.css"> 
    <!-- Menghubungkan file CSS eksternal untuk styling -->
    <title>Ubah Data Tahun Ajaran</title> 
    <!-- Judul halaman -->
</head>
<body>
  <!-- Input tersembunyi untuk menyimpan ID tahun ajaran yang akan diubah -->
  <input type="hidden" name="id" value="<?= $academic[0]["id"]; ?>">

  <div class="wrapper"> 
    <!-- Container utama untuk elemen halaman -->
    <header>Halaman Ubah Data Tahun Ajaran</header> 
    <!-- Judul halaman -->

    <!-- Form untuk mengubah data tahun ajaran -->
    <form action="" method="post">
      <!-- Input tersembunyi kedua untuk ID tahun ajaran -->
      <input type="hidden" name="id" value="<?= $academic[0]["id"]; ?>">

      <!-- Field untuk memasukkan atau mengedit tahun ajaran -->
      <div class="field year">
        <div class="input-area">
          <input type="text" name="year" id="years" autocomplete="off" value="<?= $academic[0]["year"]; ?>">
        </div>
      </div>

      <!-- Dropdown untuk memilih semester -->
      <div class="field semester">
        <div class="select-area">
          <select name="semester" id="semester" value="<?= $academic[0]["semester"]; ?>">
            <option value="1">1</option> <!-- Semester 1 -->
            <option value="2">2</option> <!-- Semester 2 -->
          </select>
        </div>
      </div>

      <!-- Dropdown untuk memilih status aktif/inaktif -->
      <div class="field status">
        <div class="select-area">
          <select name="status" id="status" value="<?= $academic[0]["status"]; ?>">
            <option value="active">Active</option> <!-- Status aktif -->
            <option value="inactive">Inactive</option> <!-- Status tidak aktif -->
          </select>
        </div>
      </div>

      <!-- Tombol untuk mengirim data yang telah diubah -->
      <input type="submit" name="submit" value="Kirim">
    </form>
  </div>
</body>
</html>
