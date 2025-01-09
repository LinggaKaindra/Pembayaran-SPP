<!DOCTYPE html>
<!-- <!DOCTYPE html>: Menentukan jenis dokumen HTML yang digunakan (HTML5). -->
<html lang="en">
<!-- <html lang="en">: Elemen utama dari dokumen HTML, dengan atribut lang (Language) untuk mendefinisikan bahasa (English). -->
<head>
    <!-- <head></head>: Tag yang digunakan untuk menampung tag meta dan title -->
    <meta charset="UTF-8">
    <!-- <meta charset="UTF-8">: Mengatur karakter encoding dokumen ke UTF-8. -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta http-equiv="X-UA-Compatible">: Menginstruksikan browser untuk menggunakan mode kompatibilitas Edge. -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="viewport">: Mengatur tampilan halaman agar responsif pada perangkat yang berbeda. -->
    <link rel="stylesheet" href="Assets/CSS/LoginPetugasSiswaStyle.css">
    <!-- <link rel="stylesheet">: Menghubungkan file index.php dengan file CSS eksternal untuk memberi styling pada halaman web. -->
    <title>Pilihan</title>
    <!-- <title>: Menentukan judul halaman yang ditampilkan pada tab browser. -->
</head>
<body>
    <!-- <body>: Elemen yang memuat konten pada halaman web. -->
    <div class="wrapper">
        <!-- <div class="wrapper">: Container utama yang membungkus seluruh elemen konten halaman. -->
        <h1>Lanjutkan sebagai?</h1>
        <!-- <h1>: Elemen heading tingkat 1 untuk judul utama halaman. -->
        
        <div class="field officer">
            <!-- <div class="field officer">: Bagian untuk opsi "Petugas", dengan kelas "field" dan "officer" untuk styling. -->
            <div class="input-area">
                <!-- <div class="input-area">: Membungkus elemen input. -->
                <a href="admin/loginPetugas.php">
                    <!-- <a href="admin/loginPetugas.php">: Tautan untuk mengarahkan pengguna ke halaman login petugas. -->
                    <input type="button" value="Petugas">
                    <!-- <input type="button">: Tombol yang berfungsi sebagai pemicu tautan. -->
                </a>
            </div>
        </div>

        <div class="field student">
            <!-- <div class="field student">: Bagian untuk opsi "Siswa", dengan kelas "field" dan "student" untuk styling. -->
            <div class="input-area">
                <!-- <div class="input-area">: Container untuk elemen input dalam opsi ini. -->
                <a href="siswa/index.php">
                    <!-- <a href="siswa/loginSiswa.php">: Tautan untuk mengarahkan pengguna ke halaman login siswa. -->
                    <input type="button" value="Siswa">
                    <!-- <input type="button">: Tombol yang berfungsi sebagai pemicu tautan. -->
                </a>
            </div>
        </div>
    </div>
</body>
</html>