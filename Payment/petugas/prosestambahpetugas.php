<?php
include("../koneksi.php");

$id = $_POST["nip"];
$nama = $_POST["nama_petugas"];
$kategor = $_POST["password"];
$lvl = $_POST['lvl_user']; 

$query = "INSERT INTO tb_petugas VALUES ('$id', '$nama', '$kategor', '$lvl')";

$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
  die("Query gagal Dijalankan " . mysqli_error($koneksi));
} else {
  echo "<script>
  alert('Data Berhasil Ditambahkan');
  document.location.href='petugas.php';
  </script>";
}
