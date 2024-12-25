<?php 
 require "../../functions.php";

 $id = $_GET["id"];

//  $siswa = query("SELECT * FROM siswa WHERE id = '$id'")[0];

$programs = query("SELECT * FROM programs");
 $siswa = query("SELECT *
                FROM students
                LEFT JOIN programs ON students.program_id = programs.id WHERE students.id = '$id'
            ")[0];

if (isset($_POST["submit"])) {
    
    if (ubahSiswa($_POST)) {
        header("location: index.php");
    }
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Assets/CSS/LoginPetugasSiswaStyle.css">
    <title>Ubah Data Siswa</title>
</head>
<body>
  <input type="hidden" name="id" value="<?= $pengguna[0]["id"]; ?>">
      <div class="wrapper">
        <header>Ubah Data Siswa</header>
        <form action="" method="post">
          <div class="field studentid">
            <div class="input-area">
              <input type="text" name="nim" id="nim" autocomplete="off" value="<?= $siswa["nim"]; ?>">
            </div>
          </div>
          <div class="field name">
            <div class="input-area">
              <input type="text" name="name" id="name" autocomplete="off" value="<?= $siswa["name"]; ?>">
            </div>
          </div>
          <div class="field email">
            <div class="input-area">
              <input type="email" name="email" id="email" autocomplete="off" value="<?= $siswa["email"]; ?>">
            </div>
          </div>
          <div class="field password">
            <div class="input-area">
              <input type="password" name="password" id="password" autocomplete="off" value="<?= $siswa["password"]; ?>">
            </div>
          </div>
          <div class="field phone">
            <div class="input-area">
              <input type="text" name="phone" id="phone" autocomplete="off" value="<?= $siswa["phone"]; ?>">
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
</body>
</html>