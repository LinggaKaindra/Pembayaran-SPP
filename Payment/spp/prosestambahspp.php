<?php
include("../koneksi.php");

$angkatan = $_POST["angkatan"];
$nominal = $_POST["nominal"];

$query = "INSERT INTO tb_spp VALUES ('$angkatan', '$nominal')";

$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
  die("Query gagal Dijalankan " . mysqli_error($koneksi));
} else {
  echo "<script>
  alert('Data Berhasil Ditambahkan');
  document.location.href='spp.php';
  </script>";
}
