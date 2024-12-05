<?php

include('../koneksi.php');

$nip = $_GET['nip'];
$query = "DELETE FROM tb_petugas WHERE nip='$nip'";

$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
  die("Query gagal Dijalankan " . mysqli_error($koneksi));
} else {
  echo "<script>
  alert('Data Berhasil Delete');
  document.location.href='petugas.php';
  </script>";
}
