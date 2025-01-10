<?php 

session_start();

$conn = mysqli_connect("localhost", "root", "", "spp_2");

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Ambil pengguna berdasarkan username
    $sql = "SELECT * FROM students WHERE email = '$email' or nim = '$email'";
    $result = mysqli_query($conn, $sql);

    // Periksa apakah username ditemukan
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($password, $row["password"])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['nim'] = $row['nim'];
            $_SESSION['name'] = $row['name'];
            header("Location: pembayaran/index.php");
        } else {
          echo "<script>alert('Password salah!')</script>";
        }
    } else {
      echo "<script>alert('Email tidak ditemukan !')</script>";
    }
}



?>
<!DOCTYPE html>
<!-- Deklarasi tipe dokumen HTML5 -->
<html lang="en">
<!-- Elemen <html> adalah elemen root dokumen HTML. Atribut lang="en" menunjukkan bahwa dokumen menggunakan Bahasa Inggris -->

<head>
    <!-- Elemen <head> berisi metadata halaman dan elemen yang tidak langsung ditampilkan di halaman -->
    <meta charset="UTF-8">
    <!-- Menentukan karakter encoding dokumen sebagai UTF-8 untuk mendukung berbagai karakter -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Menginstruksikan browser untuk menggunakan mode kompatibilitas terbaru -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Mengatur agar halaman responsif dengan lebar sesuai perangkat pengguna -->
    <link rel="stylesheet" href="../Assets/CSS/LoginPetugasSiswaStyle.css">
    <!-- Menyisipkan file CSS eksternal untuk memberikan gaya pada halaman -->
    <title>Login Siswa</title>
    <!-- Menentukan judul halaman yang akan ditampilkan di tab browser -->
</head>

<body>
    <!-- Elemen <body> berisi konten utama yang akan ditampilkan di browser -->
    <div class="wrapper">
        <!-- Elemen <div> dengan class "wrapper" digunakan untuk membungkus seluruh konten form -->
        <header>Halaman Login Siswa</header>
        <!-- Elemen <header> digunakan untuk menampilkan judul halaman -->

        <form action="" method="post">
            <!-- Elemen <form> digunakan untuk mengirimkan data login siswa -->

            <div class="field email">
                <!-- Elemen <div> dengan class "field email" digunakan untuk membungkus input email atau NIM -->
                <div class="input-area">
                    <!-- Elemen <div> dengan class "input-area" digunakan untuk membungkus elemen input -->
                    <input type="text" name="email" id="email" placeholder="Email atau NIM">
                    <!-- Elemen <input> digunakan untuk memasukkan email atau NIM -->
                </div>
            </div>

            <div class="field password">
                <!-- Elemen <div> dengan class "field password" digunakan untuk membungkus input password -->
                <div class="input-area password">
                    <!-- Elemen <div> dengan class "input-area password" digunakan untuk membungkus elemen password -->
                    <input type="password" name="password" id="password" autocomplete="off" placeholder="Password">
                    <!-- Elemen <input> digunakan untuk memasukkan password -->
                    <button type="button" id="togglePassword" class="toggle-password">👁️</button>
                    <!-- Elemen <button> digunakan untuk mengaktifkan atau menonaktifkan visibilitas password -->
                </div>
            </div>

            <input type="submit" name="submit" value="Kirim">
            <!-- Elemen <input> dengan tipe "submit" digunakan untuk mengirimkan form -->

            <a href="../index.php">Kembali?</a>
            <!-- Elemen <a> digunakan untuk menyediakan tautan kembali ke halaman sebelumnya -->
        </form>
    </div>

    <script src="../Assets/JS/togglePassword.js"></script>
    <!-- Menyisipkan file JavaScript eksternal untuk menambahkan fungsionalitas toggle password -->
</body>
</html>
