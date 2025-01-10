<?php
   session_start();

   if (!isset($_SESSION["loggedin"])) {
       header("Location: ../loginPetugas.php");
       exit;
   }
    require '../../functions.php';
    $prodi = query("SELECT * FROM programs");

?>

<!DOCTYPE html>
<!-- Deklarasi tipe dokumen HTML5 untuk memastikan browser merender halaman menggunakan standar HTML5 -->
<html lang="en">
<!-- Tag pembuka HTML dengan atribut lang="en" yang menunjukkan bahwa bahasa dokumen adalah Bahasa Inggris -->

<head>
    <!-- Elemen <head> berisi metadata dan elemen-elemen yang tidak langsung terlihat di halaman -->

    <meta charset="UTF-8">
    <!-- Menentukan karakter encoding dokumen sebagai UTF-8 untuk mendukung berbagai jenis karakter -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Mengatur tampilan halaman agar responsif terhadap berbagai perangkat, lebar diatur sesuai perangkat -->

    <link rel="stylesheet" href="../../Assets/CSS/tablestyle.css">
    <!-- Menyertakan file CSS eksternal untuk memberikan gaya pada tabel dan elemen lainnya -->

    <title>Document</title>
    <!-- Judul halaman yang akan tampil di tab browser -->
</head>

<body>
    <!-- Elemen <body> berisi semua konten utama halaman yang akan ditampilkan -->

    <center>
        <!-- Elemen <center> digunakan untuk memusatkan konten di halaman -->

        <h3>Data Prodi</h3>
        <!-- Judul tabel yang memberikan informasi bahwa ini adalah data program studi -->

        <a href="tambahProdi.php">tambah data Prodi</a>
        <!-- Tautan untuk menambahkan data program studi, mengarah ke halaman "tambahProdi.php" -->

        <div class="table-container">
            <!-- Elemen <div> dengan class "table-container" untuk membungkus tabel dan memberikan gaya -->

            <table cellpadding="20">
                <!-- Elemen <table> untuk membuat tabel dengan atribut cellpadding="20" untuk memberikan jarak antar sel -->

                <thead>
                    <!-- Elemen <thead> untuk mendefinisikan bagian header tabel -->
                    <tr>
                        <!-- Baris tabel untuk header -->
                        <th>No.</th>
                        <!-- Kolom pertama: nomor urut -->
                        <th>Nama</th>
                        <!-- Kolom kedua: nama program studi -->
                        <th>Jurusan</th>
                        <!-- Kolom ketiga: nama jurusan/fakultas -->
                        <th>Action</th>
                        <!-- Kolom keempat: tindakan (ubah atau hapus) -->
                    </tr>
                </thead>

                <?php $i = 1; ?>
                <!-- Inisialisasi variabel PHP $i untuk penomoran tabel -->

                <?php foreach ($prodi as $row): ?>
                <!-- Iterasi menggunakan PHP untuk setiap elemen di array $prodi -->
                    <tr>
                        <!-- Baris data tabel -->
                        <td><?= $i; ?></td>
                        <!-- Kolom nomor urut yang ditentukan oleh variabel $i -->
                        <td><?= $row["name"]; ?></td>
                        <!-- Kolom nama program studi yang diambil dari elemen "name" dalam array $row -->
                        <td><?= $row["faculty"]; ?></td>
                        <!-- Kolom jurusan/fakultas yang diambil dari elemen "faculty" dalam array $row -->
                        <td>
                            <a href="ubahProdi.php?id=<?= $row["id"]; ?>">ubah</a> 
                            <!-- Tautan untuk mengubah data program studi, dengan ID dikirimkan melalui parameter GET -->
                            || 
                            <a href="hapusProdi.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')">Hapus</a>
                            <!-- Tautan untuk menghapus data program studi, dengan konfirmasi sebelum menghapus -->
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <!-- Menambahkan nilai $i untuk nomor urut berikutnya -->
                <?php endforeach; ?>
            </table>
        </div>

        <a href="../index.php">kembali</a>
        <!-- Tautan untuk kembali ke halaman utama, mengarah ke "../index.php" -->

    </center>
</body>
</html>
