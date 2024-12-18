<?php 
 require "../../functions.php";

 $id = $_GET["id"];

 $siswa = query("SELECT * FROM siswa WHERE id_spp = '$id'")[0];

if (isset($_POST["submit"])) {
    
    if (ubahSiswa($_POST) > 0) {
        header("location: ../petugas.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Ubah Data Siswa</h1>

    <form action="" method="post">
        <input type="hidden" name="id_spp" value="<?= $siswa["id_spp"]; ?>">
        <label for="nisn">Nisn : </label>
        <input type="text" name="nisn" id="nisn" autocomplete="off" value="<?= $siswa["nisn"]; ?>">
        <br>
        <label for="nis">Nis : </label>
        <input type="text" name="nis" id="nis" autocomplete="off" value="<?= $siswa["nis"]; ?>">
        <br>
        <label for="nama">Nama : </label>
        <input type="text" name="nama" id="nama" autocomplete="off" value="<?= $siswa["nama"]; ?>">
        <br>
        <label for="idkelas">Pilih Kelas : </label>
        <select name="idkelas" id="idkelas">
            <option value="1">10 RPL2</option>
            <option value="2">11 RPL2</option>
            <option value="3">12 RPL2</option>
        </select>
        <br>
        <label for="alamat">Alamat : </label>
        <input type="text" name="alamat" id="alamat" value="<?= $siswa["alamat"]; ?>">
        <br>
        <label for="notelp">No Telp. : </label>
        <input type="text" name="notelp" id="notelp" autocomplete="off" value="<?= $siswa["no_telp"]; ?>">
        <br>
        <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>