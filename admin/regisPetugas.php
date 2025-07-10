<?php 

require "../functions.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $captcha = $_POST['g-recaptcha-response'] ?? false;

        if (!$captcha) {
            echo "<p style='color: red;'>Captcha tidak ada, mohon coba lagi.</p>";
            exit;
        }

        $secret = '6LdyGX4rAAAAAL2pDGuF-RmXc_NeuIqat4tITUX6';
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=" . $_SERVER['REMOTE_ADDR']);
        $result = json_decode($response);

        if (!$result->success || $result->score <= 0.5) {
            echo "<p style='color: red;'>CAPTCHA gagal, kamu mungkin terdeteksi sebagai bot.</p>";
            exit;
        }
    }

    if (isset($_POST["submit"])) {

        if(regisPetugas($_POST)){
            header("location: loginPetugas.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../Assets/CSS/LoginPetugasSiswaStyle.css" />
  <title>Registrasi Petugas</title>
</head>
<body>
  <div class="wrapper">
    <header>Halaman Registrasi Petugas</header>

    <form action="" method="post">
      <!-- CAPTCHA Token -->
      <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
      <input type="hidden" name="action" value="validate_captcha">

      <div class="field username">
        <div class="input-area">
          <input
            type="text"
            name="username"
            id="username"
            autocomplete="off"
            placeholder="Username"
          />
        </div>
      </div>

      <div class="field email">
        <div class="input-area">
          <input
            type="email"
            name="email"
            id="email"
            autocomplete="off"
            placeholder="Email"
          />
        </div>
      </div>

      <div class="field password">
        <div class="input-area">
          <input
            type="password"
            name="password"
            id="password"
            autocomplete="off"
            placeholder="Password"
          />
        </div>
      </div>

      <input type="submit" name="submit" value="Kirim" />
      <a href="loginPetugas.php">Sudah punya akun?</a>
    </form>
  </div>

  <!-- Load reCAPTCHA v3 -->
  <script src="https://www.google.com/recaptcha/api.js?render=6LdyGX4rAAAAAPUOospwmWLfhlBhWjY2-O2wC2zC"></script>
  <script>
    grecaptcha.ready(function () {
      grecaptcha
        .execute("6LdyGX4rAAAAAPUOospwmWLfhlBhWjY2-O2wC2zC", {
          action: "validate_captcha",
        })
        .then(function (token) {
          document.getElementById("g-recaptcha-response").value = token;
        });
    });
  </script>
</body>
</html>
