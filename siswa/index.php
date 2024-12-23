<?php 

session_start();

$conn = mysqli_connect("localhost", "root", "", "spp_2");

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Ambil pengguna berdasarkan username
    $sql = "SELECT * FROM students WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    // Periksa apakah username ditemukan
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($password, $row["password"])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['nim'] = $row['nim'];
            header("Location: pembayaran/index.php");
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
    <link rel="stylesheet" href="../LoginPetugasSiswaStyle.css">
    <title>Login Siswa</title>
</head>
<body>
      <div class="wrapper">
        <header>Halaman Login Siswa</header>
        <form action="" method="post">
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
          <a href="../index.php">Kembali?</a>
        </form>
      </div>
</body>
</html>