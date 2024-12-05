<?php 
include "koneksi.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Index</title>
      <link rel="stylesheet" href="IndexNavbarStyle.css">
   </head>
   <body>
   <?php
         if (@$_SESSION['lvl_user'] == 'admin') {
      ?>
      <nav>
         <label class="logo">Selamat Datang~!</label>
         <ul>
        <li><a href="siswa/siswa.php">Siswa</a></li>
        <li><a href="petugas/petugas.php">Petugas</a></li>
        <li><a href="pembayaran/pembayaran.php">Pembayaran</a></li>
        <li><a href="spp/spp.php">SPP</a></li>
        <li><a href="riwayat/riwayat.php">Riwayat</a></li>
        <li><a href="logout.php">logout</a></li>
        </ul>
      </nav>
      <?php
         } elseif (@$_SESSION['lvl_user'] == 'petugas') {
      ?>
      <nav>
         <label class="logo">Selamat Datang~!</label>
         <ul>
        <li><a href="pembayaran/pembayaran.php">Pembayaran</a></li>
        <li><a href="riwayat/riwayat.php">Riwayat</a></li>
        <li><a href="logout.php">logout</a></li>
        </ul>
      </nav>
      <?php
         } elseif (@$_SESSION['nama_siswa'] == '') {
   ?>
      <nav>
         <label class="logo">Selamat Datang~!</label>
         <ul>
        <li><a href="riwayat/riwayat.php">Riwayat</a></li>
        <li><a href="logout.php">logout</a></li>
        </ul>
      </nav>
      <?php
         }
   ?>
   </body>
</html>
