<?php 

require "../../functions.php";

$nim = $_GET["nim"];

if (isset($_POST["submit"])) {

    // var_dump($_POST);return;    
    
    if (tambahPemb($_POST)) {
        header("location: index.php");
    }
}

$ukt = query("SELECT ukt.*, students.nim, students.name, academic_years.year, academic_years.semester FROM ukt INNER JOIN academic_years ON ukt.academic_year_id = academic_years.id INNER JOIN students ON ukt.student_id = students.id WHERE students.nim = $nim ");
$student = query("SELECT * FROM students INNER JOIN programs on students.program_id = programs.id WHERE nim = $nim");
// var_dump($ukt);
$payment_methods = query("SELECT * FROM payment_methods");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <h1>Halaman Registrasi Pembayaran</h1>
    <form action="" method="post">
        <input type="hidden" name="ukt_id" value="<?= $ukt[0]['id']; ?>">
        <br>
        <label for="nim">nim : </label>
        <input type="text" name="nim" id="nim" autocomplete="off" value="<?= $nim; ?>">
        <br>
        <label for="name">name : </label>
        <input type="text" name="name" id="name" autocomplete="off" value="<?= $ukt[0]['name']; ?>" disabled>
        <br>
        <label for="fakultas">fakultas : </label>
        <input type="text" name="facultas" id="facultas" autocomplete="off" value="<?= $student[0]['faculty']; ?>" disabled>
        <br>
        <label for="tahun">tahun ajaran : </label>
        <input type="text" name="tahun_ajaran" id="tahun" autocomplete="off" value="<?= $ukt[0]['year']; ?>" disabled>
        <br>
        <label for="semester">Semester : </label>
        <input type="text" name="semester" id="semester" autocomplete="off" value="<?= $ukt[0]['semester']; ?>" disabled>
        <br>
        <label for="amount">amount : </label>
        <input type="text" name="amount" id="amount" autocomplete="off" value="Rp. <?= $ukt[0]['amount']; ?>">
        <br>
        
        <label for="payment_method_id">Pilih Method : </label>
        <select name="payment_method_id" id="payment_method_id">
            <?php foreach ($payment_methods as $row): ?>
                <option value="<?php echo $row['id']; ?>"><?= $row['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <br>
        <button type="submit" name="submit">Bayar</button>
    </form>
    
</head>
<body>
    
</body>
</html>