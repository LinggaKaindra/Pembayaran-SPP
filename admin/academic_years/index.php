<?php

    session_start();

    if (!isset($_SESSION["loggedin"])) {
        header("Location: ../loginPetugas.php");
        exit;
    }
    require '../../functions.php';
    $academics = query("SELECT * FROM academic_years");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
    <!DOCTYPE html>: Menentukan tipe dokumen sebagai HTML5.
    <html lang="en">: Elemen root dokumen HTML, dengan atribut "lang" untuk menetapkan bahasa utama (English).
    -->
    <meta charset="UTF-8">
    <!-- <meta charset="UTF-8">: Menentukan karakter encoding dokumen sebagai UTF-8. -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="viewport">: Mengatur tampilan agar responsif pada berbagai ukuran layar. -->
    <link rel="stylesheet" href="../../Assets/CSS/tablestyle.css">
    <!-- <link rel="stylesheet">: Menyertakan file CSS eksternal untuk mendesain tabel pada halaman. -->
    <title>Document</title>
    <!-- <title>: Menentukan judul halaman yang ditampilkan di tab browser. -->
</head>
<body>
    <!-- <body>: Elemen utama untuk memuat seluruh konten visual halaman web. -->
    <center>
        <!-- <center>: Memusatkan konten di dalam elemen ini. -->

        <h3>Data Tahun Ajaran</h3>
        <!-- <h3>: Menampilkan heading "Data Tahun Ajaran" sebagai judul utama halaman. -->

        <a href="tambahAcad.php">tambah data Tahun Ajaran</a>
        <!-- <a href="tambahAcad.php">: Tautan untuk menuju halaman tambah data tahun ajaran. -->

        <!-- Menampilkan data tahun ajaran dalam bentuk tabel -->
        <div class="table-container">
            <!-- <div class="table-container">: Container untuk elemen tabel. -->
            <table cellpadding="20">
                <!-- <table>: Elemen untuk membuat tabel data dengan padding sel 20px. -->
                <thead>
                    <!-- <thead>: Bagian kepala tabel yang berisi judul kolom. -->
                    <tr>
                        <!-- <tr>: Baris tabel untuk judul kolom. -->
                        <th>No.</th>
                        <!-- <th>: Kolom untuk nomor urut. -->
                        <th>Year</th>
                        <!-- <th>: Kolom untuk menampilkan tahun ajaran. -->
                        <th>Semester</th>
                        <!-- <th>: Kolom untuk menampilkan semester. -->
                        <th>status</th>
                        <!-- <th>: Kolom untuk menampilkan status (aktif/tidak aktif). -->
                        <th>Action</th>
                        <!-- <th>: Kolom untuk tindakan (ubah atau hapus). -->
                    </tr>
                </thead>

                <?php $i = 1; ?>
                <!-- Inisialisasi nomor urut dengan nilai awal 1. -->
                <?php foreach( $academics as $row):?>
                    <!-- Iterasi untuk setiap elemen dalam array $academics. -->
                    <tr>
                        <!-- <tr>: Baris baru dalam tabel untuk data tahun ajaran. -->
                        <td><?= $i; ?></td>
                        <!-- <td>: Menampilkan nomor urut. -->
                        <td><?= $row["year"]; ?></td>
                        <!-- <td>: Menampilkan tahun ajaran. -->
                        <td><?= $row["semester"]; ?></td>
                        <!-- <td>: Menampilkan semester. -->
                        <td><?= $row["status"]; ?></td>
                        <!-- <td>: Menampilkan status tahun ajaran. -->
                        <td>
                            <a href="ubahAcad.php?id=<?= $row["id"]; ?>">ubah</a> 
                            <!-- <a href="ubahAcad.php">: Tautan untuk mengubah data tahun ajaran. -->
                            || 
                            <a href="hapusAcad.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"> Hapus</a>
                            <!-- JS <a href="hapusAcad.php">: Tautan untuk menghapus data tahun ajaran dengan konfirmasi. -->
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <!-- Increment nomor urut. -->
                <?php endforeach; ?>
            </table>
        </div>

        <a href="../index.php">kembali</a>
        <!-- <a href="../index.php">: Tautan untuk kembali ke halaman utama. -->

    </center>
</body>
</html>
