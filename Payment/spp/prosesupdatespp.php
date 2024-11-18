<?php

include("../koneksi.php");

$angkatan = $_POST['angkatan'];
$nominal = $_POST["nominal"];

$query = "UPDATE tb_spp SET angkatan='$angkatan', nominal='$nominal'  WHERE angkatan='$angkatan' ";

$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
  die("Query gagal Dijalankan " . mysqli_error($koneksi));
} else {
  echo "<script>
  alert('Data Berhasil Diupdate');
  document.location.href='spp.php';
  </script>";
}
