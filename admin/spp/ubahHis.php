<?php 
require"../../functions.php";

$id = $_GET["id"];

$spp = query("SELECT * FROM pembayaran WHERE id_pembayaran = '$id'")[0];

if (isset($_POST["submit"])) {
    if (ubahHis($_POST)) {
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
        <input type="hidden" name="id_pembayaran" value="<?= $spp["id_pembayaran"]; ?>">
        <label for="idPetugas">ID Petugas : </label>
        <input type="text" name="idPetugas" id="idPetugas" value="<?= $spp["id_petugas"]; ?>">
        <br>
        <label for="nisn">nisn : </label>
        <input type="text" name="nisn" id="nisn" value="<?= $spp["nisn"]; ?>">
        <br>
        <label for="tglBayar">Tanggal Bayar : </label>
        <input type="date" name="tglBayar" id="tglBayar" value="<?= $spp["tgl_bayar"]; ?>">
        <br>
        <label for="blnDibayar">Bulan Dibayar : </label>
        <input type="text" name="blnDibayar" id="blnDibayar" value="<?= $spp["bulan_dibayar"]; ?>">
        <br>
        <label for="thnDibayar">Tahun Dibayar : </label>
        <input type="text" name="thnDibayar" id="thnDibayar" value="<?= $spp["tahun_dibayar"]; ?>">
        <br>
        <label for="jumlahDibayar">Jumlah Dibayar : </label>
        <input type="text" name="jumlahDibayar" id="jumlahDibayar" value="<?= $spp["jumlah_dibayar"]; ?>">

        <br>
        <button type="submit" name="submit">Kirim</button>
    </form>
    
</body>
</html>