<?php 
require"../../functions.php";

if (isset($_POST["submit"])) {
    
   if (regisSiswa($_POST)) {
       header("Location: index.php");
   }
}

    $programs = query("SELECT * FROM programs");



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Assets/CSS/LoginPetugasSiswaStyle.css">
    <title>Registrasi Siswa</title>
</head>
<body>
      <div class="wrapper">
        <header>Halaman Register Siswa</header>
        <form action="" method="post">
          <div class="field idnumber">
            <div class="input-area">
              <input type="text" name="nim"  id="nim" autocomplete="off" placeholder="NIM">
            </div>
          </div>
          <div class="field name">
            <div class="input-area">
              <input type="text" name="name"  id="name" autocomplete="off" placeholder="Name">
            </div>
          </div>
          <div class="field email">
            <div class="input-area">
              <input type="email" name="email" id="email" autocomplete="off" placeholder="Email">
            </div>
          </div>
          <div class="field password">
            <div class="input-area password">
                  <input type="password" name="password" id="password" autocomplete="off" placeholder="Password">
                  <button type="button" id="togglePassword" class="toggle-password">👁️</button>
              </div>
          </div>
          <div class="field phone">
            <div class="input-area">
              <input type="text" name="phone" id="phone" autocomplete="off" placeholder="No. Telp">
            </div>
          </div>
          <div class="field program_id">
            <div class="select-area">
              <select name="program_id" id="program_id">
                <?php foreach ($programs as $row): ?>
                    <option value="<?php echo $row['id']; ?>"><?= $row['faculty'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <input type="submit" name="submit" value="Kirim">
        </form>
      </div>
    <script src="../../Assets/JS/togglePassword.js"></script>
</body>
</html>