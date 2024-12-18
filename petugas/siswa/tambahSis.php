<?php 
require"../../functions.php";

if (isset($_POST["submit"])) {
    
    if (regisSiswa($_POST)) {
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
    <title>Halaman Register</title>
</head>
<body>

    <h1>Halaman Register Siswa</h1>

    <form action="" method="post">
        <label for="nisn">Nisn : </label>
        <input type="text" name="nisn" id="nisn" autocomplete="off">
        <br>
        <label for="nis">Nis : </label>
        <input type="text" name="nis" id="nis" autocomplete="off">
        <br>
        <label for="nama">Nama : </label>
        <input type="text" name="nama" id="nama" autocomplete="off">
        <br>
        <label for="idkelas">Pilih Kelas : </label>
        <select name="idkelas" id="idkelas">
            <option value="1">10 RPL2</option>
            <option value="2">11 RPL2</option>
            <option value="3">12 RPL2</option>
        </select>
        <br>
        <label for="alamat">Alamat : </label>
        <input type="text" name="alamat" id="alamat">
        <br>
        <label for="notelp">No Telp. : </label>
        <input type="text" name="notelp" id="notelp" autocomplete="off">
        <br>
        <button type="submit" name="submit">Kirim</button>
    </form>
    
</body>
</html>