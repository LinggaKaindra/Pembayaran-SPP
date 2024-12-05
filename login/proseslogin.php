<?php
session_start();

include "../koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$queryadmin = mysqli_query($koneksi, "SELECT * FROM tb_petugas WHERE nama_petugas = '$username' AND password = '$password'") or die(mysqli_error($koneksi));
$querypetugas = mysqli_query($koneksi, "SELECT * FROM tb_petugas WHERE nama_petugas = '$username' AND password = '$password'") or die(mysqli_error($koneksi));
$querysiswa = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE nama_siswa = '$username' AND password = '$password'") or die(mysqli_error($koneksi));



    if (mysqli_num_rows($queryadmin) > 0) {
        $data = mysqli_fetch_assoc($queryadmin);
        $_SESSION['username'] = $data['nama_petugas'];
        $_SESSION['lvl_user'] = $data['lvl_user'];
         header("Location:../index.php");
    } 
    
    else if (mysqli_num_rows($querypetugas) > 0) {
        $data = mysqli_fetch_assoc($querypetugas);
        $_SESSION['username'] = $data['nama_petugas'];
        $_SESSION['lvl_user'] = $data['lvl_user'];
         header("Location:../index.php");
    }
    
    else if (mysqli_num_rows($querysiswa) > 0) {
        $data = mysqli_fetch_assoc($querysiswa);
        $_SESSION['username'] = $data['nama_siswa'];
         header("Location:../index.php");
    }

    else {
    echo "<script>alert('gagal login');window.location.href='login.php'</script>";
    }
