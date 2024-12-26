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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/CSS/LoginPetugasSiswaStyle.css">
    <title>Login Siswa</title>
</head>
<body>
      <div class="wrapper">
        <header>Halaman Login Siswa</header>
        <form action="" method="post">
          <div class="field email">
            <div class="input-area">
              <input type="text" name="email" id="email" placeholder="Email atau NIM">
            </div>
          </div>
          <div class="field password">
            <div class="input-area password">
                  <input type="password" name="password" id="password" autocomplete="off" placeholder="Password">
                  <button type="button" id="togglePassword" class="toggle-password">👁️</button>
              </div>
          </div>
          <input type="submit" name="submit" value="Kirim">
          <a href="../index.php">Kembali?</a>
        </form>
      </div>
      <script src="../Assets/JS/togglePassword.js"></script>
</body>
</html>