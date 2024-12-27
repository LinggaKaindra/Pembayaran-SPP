<?php 

session_start();

if (!isset($_SESSION["loggedin"])) {
    header("Location: ../loginPetugas.php");
    exit;
}


require "../../functions.php";

$nim = $_GET["nim"];
$petugas_id = $_SESSION["id"];
$ukt_id = $_GET["id"];

if (isset($_POST["submit"])) {   
    if (tambahPemb($_POST)) {
        if (changeStatusUKT($ukt_id)) {
            header("location: index.php");
        }
    }
}

$ukt = query("SELECT ukt.*, ukt.id as ukt_id, students.nim, students.name, academic_years.year, academic_years.semester FROM ukt INNER JOIN academic_years ON ukt.academic_year_id = academic_years.id INNER JOIN students ON ukt.student_id = students.id WHERE students.nim = $nim ");
$student = query("SELECT * FROM students INNER JOIN programs on students.program_id = programs.id WHERE nim = $nim");
$payment_methods = query("SELECT * FROM payment_methods");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../Assets/CSS/LoginPetugasSiswaStyle.css">
</head>
<body>

    <div class="wrapper">
        <header>Halaman Registrasi Pembayaran</header>
        <form action="" method="post">
            <input type="hidden" name="ukt_id" value="<?= $ukt_id ?>">
            <input type="hidden" name="petugas_id" value="<?= $petugas_id ?>">
            
            <div class="field name">
                <div class="input-area">
                    <input type="text" name="nim" id="nim" autocomplete="off" value="<?= $nim; ?>">
                </div>
            </div>
            <div class="field name">
                <div class="input-area">
                <input type="text" name="name" id="name" autocomplete="off" value="<?= $ukt[0]['name']; ?>" disabled>
                </div>
            </div>
            <div class="field name">
                <div class="input-area">
                <input type="text" name="facultas" id="facultas" autocomplete="off" value="<?= $student[0]['faculty']; ?>" disabled>
                </div>
            </div>
            <div class="field name">
                <div class="input-area">
                <input type="text" name="tahun_ajaran" id="tahun" autocomplete="off" value="<?= $ukt[0]['year']; ?>" disabled>
                </div>
            </div>
            <div class="field name">
                <div class="input-area">
                <input type="text" name="semester" id="semester" autocomplete="off" value="<?= $ukt[0]['semester']; ?>" disabled>
                </div>
            </div>
            <div class="field name">
                <div class="input-area">
                <input type="text" name="amount" id="amount" autocomplete="off" value="Rp. <?= $ukt[0]['amount']; ?>">
                </div>
            </div>
    
            <div class="field">
                <div class="select-area">
                  <select name="payment_method_id" id="payment_method_id">
                    <?php foreach ($payment_methods as $row): ?>
                        <option value="<?php echo $row['id']; ?>"><?= $row['name'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
    
            <input type="submit" name="submit"></input>
        </form>
    </div>
    
<body>
    
</body>
</html>