<?php 
session_start();
$conn = mysqli_connect("localhost", "root", "", "spp_2");

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"]; 
    $captcha = $_POST['g-recaptcha-response'] ?? false;

    if (!$captcha) {
        echo "<p style='color: red;'>Captcha tidak ada, mohon coba lagi.</p>";
        exit;
    }

    $secret = '6LdyGX4rAAAAAL2pDGuF-RmXc_NeuIqat4tITUX6'; // ini secret key
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=" . $_SERVER['REMOTE_ADDR']);
    $responseKeys = json_decode($response);

    if (!$responseKeys->success || $responseKeys->score < 0.5) {
        echo "<p style='color: red;'>Captcha gagal/divalidasi rendah. Akses ditolak.</p>";
        exit;
    }



    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row["password"])) {
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/CSS/LoginPetugasSiswaStyle.css">
    <title>Login Petugas</title>
</head>
<body>
      <div class="wrapper">
        <header>Halaman Login Petugas</header>
        <form action="" method="post">
              <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
              <input type="hidden" name="action" value="validate_captcha">
          <div class="field email">
            <div class="input-area">
              <input type="email" name="email" id="email" placeholder="Email">
            </div>
          </div>
          <div class="field password">
            <div class="input-area password">
                  <input type="password" name="password" id="password" autocomplete="off" placeholder="Password">
                  <button type="button" id="togglePassword" class="toggle-password">👁️</button>
              </div>
          </div>
          <input type="submit" name="submit" value="Kirim">
          <a href="regisPetugas.php">Belum punya akun?</a> 
          || 
          <a href="../index.php">Kembali?</a>
        </form>
      </div>
      <script src="../Assets/JS/togglePassword.js"></script>

      <script src="https://www.google.com/recaptcha/api.js?render=6LdyGX4rAAAAAPUOospwmWLfhlBhWjY2-O2wC2zC"></script>
     <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('6LdyGX4rAAAAAPUOospwmWLfhlBhWjY2-O2wC2zC', {action: 'validate_captcha'}).then(function(token) {
                document.getElementById('g-recaptcha-response').value = token;
            });
        });
    </script>

</body>
</html>
