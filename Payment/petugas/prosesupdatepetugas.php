<?php

include("../koneksi.php");

$nip = $_POST['nip'];
$nama = $_POST["nama_petugas"];
$password = $_POST["password"];
$lvl = $_POST["lvl_user"];

$query = "UPDATE tb_petugas SET nama_petugas='$nama', password='$password', lvl_user='$lvl' WHERE nip='$nip' ";

$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
  die("Query gagal Dijalankan " . mysqli_error($koneksi));
} else {
  echo "<script>
  alert('Data Berhasil Diupdate');
  document.location.href='petugas.php';
  </script>";
}
