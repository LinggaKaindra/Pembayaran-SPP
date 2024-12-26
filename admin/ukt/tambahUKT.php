<?php 

require "../../functions.php";


$student = query("SELECT * FROM students");
$academic_year = query("SELECT * FROM academic_years");


if (isset($_POST["submit"])) {
    
    if (tambahUKT($_POST)) {
        header("location: index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Assets/CSS/LoginPetugasSiswaStyle.css">
    <title>Tambah Data UKT</title>
</head>
<body>
      <div class="wrapper">
        <header>Tambah Data UKT</header>
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
              <input type="number" name="amount" id="amount" autocomplete="off" placeholder="Amount">
            </div>
          </div>
          <div class="field status">
            <div class="select-area">
              <select name="status" id="status">
                <option value="unpaid">unpaid</option>
              </select>
            </div>
          </div>
          <input type="submit" name="submit" value="Kirim">
        </form>
      </div>
</body>
</html>