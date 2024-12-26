<?php 



require "../../functions.php";
$id = $_GET["id"];

$ukt = query("SELECT ukt.*, students.* FROM ukt INNER JOIN students ON ukt.student_id = students.id WHERE ukt.id = $id")[0];
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
          <input type="hidden" name="id" value="<?= $ukt["id"]; ?>">

          <div class="field studentid">
            <div class="select-area">
              <select name="student_id" id="student_id">
                    <option name="student_id" value="<?php echo $ukt['student_id']; ?>" selected><?= $ukt['nim'] ?></option>
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
              <input type="text" name="amount" id="amount" autocomplete="off" value="<?= $ukt["amount"]; ?>">
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