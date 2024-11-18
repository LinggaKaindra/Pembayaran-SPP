<?php
include "../koneksi.php";

session_start();
$nis = $_POST['nis'];
$id_pembayaran = $_POST['id_pembayaran'];
$namasiswa = $_POST['nama_siswa'];
$namapetugas = $_POST['nama_petugas'];
$waktu_pembayaran = date("Y-m-d");
$angkatan = $_POST['angkatan'];
$query_nominal = mysqli_query($koneksi, "SELECT nominal FROM tb_spp WHERE angkatan = $angkatan");
$nominal_bayar_row = mysqli_fetch_assoc($query_nominal);
$nominal_bayar = $nominal_bayar_row['nominal'];

$total_bayar = $_POST['total_bayar'];

$querybayar = "INSERT INTO tb_pembayaran (id_pembayaran, nama_siswa, nama_petugas, waktu_pembayaran, nominal_bayar, total_bayar) VALUES ('$id_pembayaran', '$namasiswa', '$namapetugas', '$waktu_pembayaran', '$nominal_bayar', '$total_bayar')";

$hasil = mysqli_query($koneksi, $querybayar);

if (!$hasil) {
    die("Query gagal Dijalankan " . mysqli_error($koneksi));
} else {
    echo "<script>
    alert('Pembayaran berhasil');
    window.location.href='../riwayat/riwayat.php';
    </script>";
}
?>
