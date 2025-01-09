<?php 
session_start();
// var_dump($_SESSION);
$conn = mysqli_connect("localhost", "root", "", "spp_2");

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"]; // Password mentah dari form

    // Ambil pengguna berdasarkan username
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    
    // Periksa apakah username ditemukan
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($password, $row["password"])) {
            // Cek role untuk redirect
            if ($row["role"] == 'admin') {
                $_SESSION['role'] = $row["role"];
                $_SESSION['username'] = $row["username"];
                $_SESSION['id'] = $row["id"];
                $_SESSION['loggedin'] = true;
                header("Location: ../admin/index.php");
                exit;
            } elseif ($row["role"] == 'petugas') {
                $_SESSION['role'] = $row["role"];
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $row["username"];
                $_SESSION['id'] = $row["id"];
                header("Location: ../admin/index.php");
                exit;
            }
        } else {
            echo "<script>alert('Password salah!')</script>";
        }
    } else {
        echo "<script>alert('Email tidak ditemukan !')</script>";
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Deklarasi dokumen HTML5 dan bahasa dokumen -->
    <meta charset="UTF-8">
    <!-- Menentukan karakter encoding dokumen -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Memastikan kompatibilitas terbaik dengan browser Internet Explorer -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Menyesuaikan tampilan dengan ukuran layar perangkat -->
    <link rel="stylesheet" href="../Assets/CSS/LoginPetugasSiswaStyle.css">
    <!-- Menghubungkan file CSS eksternal untuk styling -->
    <title>Login Petugas</title>
    <!-- Menentukan judul halaman -->
</head>
<body>
      <div class="wrapper">
        <!-- Kontainer utama untuk membungkus seluruh elemen -->
        <header>Halaman Login Petugas</header>
        <!-- Header untuk memberikan judul halaman -->
        <form action="" method="post">
          <!-- Formulir untuk login petugas -->
          <div class="field email">
            <!-- Div untuk input email -->
            <div class="input-area">
              <input type="email" name="email" id="email" placeholder="Email">
              <!-- Input untuk alamat email dengan placeholder -->
            </div>
          </div>
          <div class="field password">
            <!-- Div untuk input password -->
            <div class="input-area password">
                  <input type="password" name="password" id="password" autocomplete="off" placeholder="Password">
                  <!-- Input untuk password dengan fitur autocomplete dinonaktifkan -->
                  <button type="button" id="togglePassword" class="toggle-password">👁️</button>
                  <!-- Tombol untuk menampilkan/menyembunyikan password -->
              </div>
          </div>
          <input type="submit" name="submit" value="Kirim">
          <!-- Tombol untuk mengirim formulir -->
          <a href="regisPetugas.php">Belum punya akun?</a> 
          <!-- Link menuju halaman registrasi petugas -->
          || 
          <a href="../index.php">Kembali?</a>
          <!-- Link kembali ke halaman utama -->
        </form>
      </div>
      <script src="../Assets/JS/togglePassword.js"></script>
      <!-- Menghubungkan file JavaScript eksternal untuk fitur toggle password -->
</body>
</html>
