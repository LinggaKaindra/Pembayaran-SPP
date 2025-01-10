<?php

    session_start();

    if (!isset($_SESSION["loggedin"])) {
        header("Location: ../loginPetugas.php");
        exit;
    }
    require '../../functions.php';
    $method = query("SELECT * FROM payment_methods");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--    Tag <head> digunakan untuk mendefinisikan metadata dokumen HTML.    -->
    <meta charset="UTF-8">
    <!--    Tag <meta charset="UTF-8"> digunakan untuk mengatur karakter encoding dokumen.    -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--    Tag <meta name="viewport"> digunakan untuk memastikan bahwa dokumen diatur agar responsif pada berbagai perangkat.    -->
    <link rel="stylesheet" href="../../Assets/CSS/tablestyle.css">
    <!--    Tag <link> digunakan untuk menghubungkan file CSS eksternal untuk styling tabel pada halaman.    -->
    <title>Document</title>
    <!--    Tag <title> digunakan untuk menampilkan judul dokumen di tab browser.    -->
</head>
<body>
    <!--    Tag <body> digunakan untuk menampung semua konten yang akan ditampilkan pada halaman web.    -->
    <center>
        <!--        Elemen <center> digunakan untuk memusatkan konten dalam dokumen.        -->
        <h3>Data payment_methods</h3>
        <!--        Elemen <h3> digunakan untuk memberikan judul bagian "Data payment_methods".        -->

        <a href="tambahPaymentMethod.php">tambah data payment_methods</a>
        <!--
        Elemen <a> digunakan untuk membuat tautan ke halaman "tambahPaymentMethod.php" untuk menambahkan data.
        -->

        <!-- siswa -->
        <!--
        Bagian ini menampilkan data payment_methods dalam bentuk tabel.
        -->
        <div class="table-container">
        <!--
        Div dengan class "table-container" digunakan untuk membungkus tabel agar styling dapat diterapkan.
        -->
        <table cellpadding="20">
            <!--
            Elemen <table> digunakan untuk membuat tabel. Atribut cellpadding digunakan untuk memberi jarak dalam sel.
            -->
            <thead>
            <!--
            Elemen <thead> digunakan untuk mendefinisikan header tabel.
            -->
            <tr>
                <!--
                Elemen <tr> digunakan untuk mendefinisikan baris tabel.
                -->
                <th>No.</th>
                <!--
                Elemen <th> digunakan untuk mendefinisikan header kolom "No.".
                -->
                <th>Nama</th>
                <!--
                Elemen <th> digunakan untuk mendefinisikan header kolom "Nama".
                -->
                <th>Action</th>
                <!--
                Elemen <th> digunakan untuk mendefinisikan header kolom "Action".
                -->
            </tr>
            </thead>

            <?php $i = 1; ?>
            <!--
            PHP digunakan untuk menginisialisasi variabel $i untuk nomor urut.
            -->
            <?php foreach( $method as $row):?>
            <!--
            PHP loop foreach digunakan untuk iterasi setiap elemen array $method.
            -->
                <tr>
                    <!--
                    Elemen <tr> mendefinisikan baris baru dalam tabel untuk setiap data.
                    -->
                    <td><?= $i; ?></td>
                    <!--
                    Elemen <td> digunakan untuk menampilkan nomor urut dari variabel $i.
                    -->
                    <td><?= $row["name"]; ?></td>
                    <!--
                    Elemen <td> digunakan untuk menampilkan nama metode pembayaran dari array $row.
                    -->
                    <td>
                        <!--
                        Kolom "Action" berisi tautan untuk mengubah atau menghapus data.
                        -->
                        <a href="ubahPaymentMethod.php?id=<?= $row["id"]; ?>">ubah</a> 
                        <!--
                        Tautan untuk mengarahkan pengguna ke halaman ubah data.
                        -->
                        || 
                        <a href="hapusPaymentMethod.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"> Hapus</a>
                        <!--
                        Tautan untuk menghapus data dengan konfirmasi menggunakan JS.
                        -->
                    </td>
                </tr>
                <?php $i++; ?>
                <!--
                Increment nomor urut untuk iterasi berikutnya.
                -->
            <?php endforeach; ?>
        </table>
        </div>
        
        <!-- akhir siswa -->
        <!--
        Penutup bagian data tabel payment_methods.
        -->

        <a href="../index.php">kembali</a>
        <!--
        Tautan untuk kembali ke halaman utama (index).
        -->

    </center>
</body>
</html>
