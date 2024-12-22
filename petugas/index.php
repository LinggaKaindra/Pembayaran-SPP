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
                $_SESSION['loggedin'] = true;
                header("Location: ../admin/index.php");
                exit;
            } elseif ($row["role"] == 'petugas') {
                $_SESSION['role'] = $row["role"];
                $_SESSION['loggedin'] = true;
                header("Location: ../admin/index.php");
                exit;
            }
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Email tidak ditemukan!";
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../LPSstyle.css">
    <title>Login Petugas</title>
</head>
<body>
      <div class="wrapper">
        <header>Halaman Login Petugas</header>
        <form action="admin/index.php" method="post">
          <div class="field email">
            <div class="input-area">
              <input type="email" name="email" id="email" placeholder="Email">
            </div>
          </div>
          <div class="field password">
            <div class="input-area">
              <input type="password" name="password" id="password"placeholder="Password">
            </div>
          </div>
          <input type="submit" name="submit" value="Kirim">
          <a href="regisPetugas.php">Belum punya akun?</a> || <a href="../index.php">Kembali?</a>
        </form>
      </div>
</body>
</html>