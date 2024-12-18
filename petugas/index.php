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
    <title>Login Petugas</title>
</head>
<body>

    <h1>Halaman Login Petugas</h1>

    <form action="" method="post">
        <label for="email">email : </label>
        <input type="email" name="email" id="email">
        <br>
        <label for="password">Password : </label>
        <input type="password" name="password" id="password">
        <br>

        <button type="submit" name="submit">Kirim</button>
        <p><a href="regisPetugas.php">Belum punya akun?</a> || <a href="../index.php">Kembali?</a></p>
    </form>
    
</body>
</html>