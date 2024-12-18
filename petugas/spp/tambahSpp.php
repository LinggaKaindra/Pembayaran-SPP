<?php 
require"../../functions.php";

if (isset($_POST["submit"])) {
    
    if (tambahHis($_POST)) {
        header("location: ../index.php");
    }
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pembayaran SPP</title>
</head>
<body>

    <h1>Halaman Pembayaran SPP</h1>

    <form action="" method="post">
        <label for="idPetugas">ID Petugas : </label>
        <input type="text" name="idPetugas" id="idPetugas">
        <br>
        <label for="nisn">nisn : </label>
        <input type="text" name="nisn" id="nisn">
        <br>
        <label for="tglBayar">Tanggal Bayar : </label>
        <input type="date" name="tglBayar" id="tglBayar">
        <br>
        <label for="blnDibayar">Bulan Dibayar : </label>
        <input type="text" name="blnDibayar" id="blnDibayar">
        <br>
        <label for="thnDibayar">Tahun Dibayar : </label>
        <input type="text" name="thnDibayar" id="thnDibayar">
        <br>
        <label for="jumlahDibayar">Jumlah Dibayar : </label>
        <input type="text" name="jumlahDibayar" id="jumlahDibayar">

        <br>
        <button type="submit" name="submit">Kirim</button>
    </form>
    
</body>
</html>