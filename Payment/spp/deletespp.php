<?php

include('../koneksi.php');

$angkatan = $_GET['angkatan'];
$query = "DELETE FROM tb_spp WHERE angkatan='$angkatan'";

$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
  die("Query gagal Dijalankan " . mysqli_error($koneksi));
} else {
  echo "<script>
  alert('Data Berhasil Delete');
  document.location.href='spp.php';
  </script>";
}
