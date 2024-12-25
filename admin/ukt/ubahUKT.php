<?php 



require "../../functions.php";
$id = $_GET["id"];

$ukt = query("SELECT * FROM ukt WHERE id = $id");
$student = query("SELECT * FROM students");
$academic_year = query("SELECT * FROM academic_years");

if (isset($_POST["submit"])) {
    
    if (ubahUKT($_POST)) {
        header("location: index.php");
    }
}


?>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Assets/CSS/LoginPetugasSiswaStyle.css">
    <title>Ubah Data UKT</title>
</head>
<body>
  <input type="hidden" name="id" value="<?= $ukt[0]["id"]; ?>">
      <div class="wrapper">
        <header>Ubah Data UKT</header>
        <form action="" method="post">
          <div class="field studentid">
            <div class="select-area">
              <select name="student_id" id="student_id">
                <?php foreach ($student as $row): ?>
                    <option value="<?php echo $row['id']; ?>"><?= $row['nim'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="field year">
            <div class="select-area">
              <select name="academic_year_id" id="academic_year_id">
                <?php foreach ($academic_year as $row): ?>
                    <option value="<?php echo $row['id']; ?>"><?= $row['year'] ."- semester ". $row['semester'] ?></option>
                <?php endforeach; ?>
            </select>
            </div>
          </div>
          <div class="field amount">
            <div class="input-area">
              <input type="text" name="amount" id="amount" autocomplete="off" value="<?= $ukt[0]["amount"]; ?>">
            </div>
          </div>
          <div class="field status">
            <div class="select-area">
              <select name="status" id="status">
                <option value="unpaid">unpaid</option>
                <option value="paid">paid</option>
              </select>
            </div>
          </div>
          <input type="submit" name="submit" value="Kirim">
        </form>
      </div>
</body>
</html>