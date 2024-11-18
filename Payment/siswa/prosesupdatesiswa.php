<?php

include("../koneksi.php");

$nis = $_POST['nis'];
$nama = $_POST["nama_siswa"];
$password = $_POST["password"];
$kelas = $_POST["kelas"];
$angkatan = $_POST["angkatan"];

$query = "UPDATE tb_siswa SET nama_siswa='$nama', password='$password', kelas='$kelas',angkatan = '$angkatan',bulan='$bulan' WHERE nis='$nis' ";

$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
  die("Query gagal Dijalankan " . mysqli_error($koneksi));
} else {
  echo "<script>
  alert('Data Berhasil Diupdate');
  document.location.href='siswa.php';
  </script>";
}
