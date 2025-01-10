<?php
   session_start();

   if (!isset($_SESSION["loggedin"])) {
       header("Location: ../loginPetugas.php");
       exit;
   }
    require "../../functions.php";

    $pengguna = query("SELECT * FROM users");
?>

<!DOCTYPE html>
<!-- Deklarasi tipe dokumen HTML5 -->
<html lang="en">
<!-- Elemen <html> adalah elemen root dari dokumen HTML. Atribut lang="en" menunjukkan bahwa bahasa dokumen adalah Bahasa Inggris -->

<head>
    <!-- Elemen <head> berisi metadata halaman dan elemen-elemen yang tidak langsung ditampilkan di halaman -->
    <meta charset="UTF-8">
    <!-- Menentukan karakter encoding dokumen sebagai UTF-8 untuk mendukung berbagai jenis karakter -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Mengatur halaman agar responsif, menyesuaikan lebar halaman dengan perangkat pengguna -->
    <link rel="stylesheet" href="../../Assets/CSS/tablestyle.css">
    <!-- Menyertakan file CSS eksternal untuk memberikan gaya pada elemen tabel -->
    <title>Data Pengguna</title>
    <!-- Menentukan judul halaman yang akan muncul di tab browser -->
</head>

<body>
    <!-- Elemen <body> berisi konten utama halaman yang akan ditampilkan di browser -->
    <center>
        <!-- Elemen <center> digunakan untuk meratakan konten di tengah halaman -->
        <h3>Data Pengguna</h3>
        <!-- Elemen <h3> digunakan untuk menampilkan judul bagian sebagai heading dengan ukuran tertentu -->
        <a href="tambahPeng.php">tambah data pengguna</a>
        <!-- Elemen <a> digunakan untuk membuat tautan ke halaman tambah data pengguna -->
        
        <div class="table-container">
            <!-- Elemen <div> dengan class "table-container" digunakan untuk membungkus tabel agar lebih terstruktur -->
            <table cellpadding="20">
                <!-- Elemen <table> digunakan untuk menampilkan data dalam bentuk tabel. Atribut cellpadding memberikan jarak dalam sel -->
                <thead>
                    <!-- Elemen <thead> digunakan untuk membungkus baris header tabel -->
                    <tr>
                        <!-- Elemen <tr> digunakan untuk mendefinisikan satu baris dalam tabel -->
                        <th>No.</th>
                        <!-- Elemen <th> digunakan untuk mendefinisikan header kolom "No." -->
                        <th>username</th>
                        <!-- Elemen <th> digunakan untuk mendefinisikan header kolom "username" -->
                        <th>email</th>
                        <!-- Elemen <th> digunakan untuk mendefinisikan header kolom "email" -->
                        <th>role</th>
                        <!-- Elemen <th> digunakan untuk mendefinisikan header kolom "role" -->
                        <th>action</th>
                        <!-- Elemen <th> digunakan untuk mendefinisikan header kolom "action" -->
                    </tr>
                </thead>

                <?php $i = 1; ?>
                <!-- PHP: Inisialisasi variabel $i dengan nilai 1 untuk nomor urut -->
                <?php foreach( $pengguna as $row): ?>
                <!-- PHP: Looping melalui array $pengguna untuk menampilkan setiap baris data -->
                <tr>
                    <!-- Elemen <tr> mendefinisikan baris baru dalam tabel -->
                    <td><?= $i; ?></td>
                    <!-- Elemen <td> menampilkan data nomor urut -->
                    <td><?= $row["username"]; ?></td>
                    <!-- Elemen <td> menampilkan username dari array $pengguna -->
                    <td><?= $row["email"]; ?></td>
                    <!-- Elemen <td> menampilkan email dari array $pengguna -->
                    <td><?= $row["role"]; ?></td>
                    <!-- Elemen <td> menampilkan peran (role) dari array $pengguna -->
                    <td>
                        <a href="ubahPeng.php?id=<?= $row["id"]; ?>">ubah</a>
                        <!-- Elemen <a> digunakan untuk tautan ke halaman ubah data pengguna dengan ID tertentu -->
                        ||
                        <a href="hapusPeng.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"> Hapus</a>
                        <!-- Elemen <a> digunakan untuk tautan hapus data dengan konfirmasi sebelum penghapusan -->
                    </td>
                </tr>
                <?php $i++; ?>
                <!-- PHP: Increment nilai $i untuk nomor urut -->
                <?php endforeach; ?>
            </table>
        </div>

        <a href="../index.php">kembali</a>
        <!-- Elemen <a> digunakan untuk tautan kembali ke halaman utama -->

    </center>
</body>
</html>
