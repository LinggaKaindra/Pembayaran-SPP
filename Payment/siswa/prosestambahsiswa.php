<?php
include("../koneksi.php");

$id = $_POST["nis"];
$nama = $_POST["nama_siswa"];
$password = $_POST["password"];
$kelas = $_POST["kelas"];
$angkatan = $_POST["angkatan"];


$query = "INSERT INTO tb_siswa VALUES ('$id', '$nama', '$password', '$kelas', '$angkatan')";

$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
  die("Query gagal Dijalankan " . mysqli_error($koneksi));
} else {
  echo "<script>
  alert('Data Berhasil Ditambahkan');
  document.location.href='siswa.php';
  </script>";
}
