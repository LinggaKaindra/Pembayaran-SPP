<?php 

require "../../functions.php";

$id = $_GET["id"];

var_dump($id);


if (isset($_POST["submit"])) {

    // var_dump($_POST);return;    
    
    if (ubahPemb($_POST)) {
        header("location: index.php");
    }
}

$payment = query("SELECT 
                    payments.id AS payment_id,  -- Alias kolom id dari payments
                    ukt.id AS ukt_id,  -- Alias kolom id dari ukt
                    payment_methods.id AS method_id,  -- Alias kolom id dari payment_methods
                    payment_methods.name AS method_name,  -- Alias kolom id dari payment_methods
                    students.id AS student_id,  -- Alias kolom id dari students
                    academic_years.id AS academic_year_id,  -- Alias kolom id dari academic_years
                    payments.*, 
                    ukt.*, 
                    payment_methods.*, 
                    students.*, 
                    academic_years.*,
                    programs.*
                FROM 
                    payments
                LEFT JOIN 
                    ukt ON payments.ukt_id = ukt.id
                LEFT JOIN 
                    payment_methods ON payments.method_id = payment_methods.id
                LEFT JOIN 
                    students ON ukt.student_id = students.id
                LEFT JOIN 
                    academic_years ON ukt.academic_year_id = academic_years.id
                LEFT JOIN
                    programs ON students.program_id = programs.id
                WHERE payments.id = $id 
                ");




var_dump($payment);
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
        <input type="hidden" name="id" value="<?= $id?>">
        <br>
        <label for="nim">nim : </label>
        <input type="text" name="nim" id="nim" autocomplete="off" value="<?= $payment[0]['nim']; ?>">
        <br>
        <label for="name">name : </label>
        <input type="text" name="name" id="name" autocomplete="off" value="<?= $payment[0]['name']; ?>" disabled>
        <br>
        <label for="fakultas">fakultas : </label>
        <input type="text" name="facultas" id="facultas" autocomplete="off" value="<?= $payment[0]['faculty']; ?>" disabled>
        <br>
        <label for="tahun">tahun ajaran : </label>
        <input type="text" name="tahun_ajaran" id="tahun" autocomplete="off" value="<?= $payment[0]['year']; ?>" disabled>
        <br>
        <label for="semester">Semester : </label>
        <input type="text" name="semester" id="semester" autocomplete="off" value="<?= $payment[0]['semester']; ?>" disabled>
        <br>
        <label for="amount">amount : </label>   
        <input type="text" name="amount" id="amount" autocomplete="off" value="Rp. <?= $payment[0]['amount']; ?>" disabled>
        <br>
        
        <label for="payment_method_id">Pilih Method : </label>
        <input type="text" name="amount" id="amount" autocomplete="off" value="<?= $payment[0]['method_name']; ?>" disabled>
        <br>

        <label for="status">Status</label>
        <select name="status" id="status">
            <option value="confirmed">confirmed</option>
            <option value="failed">failed</option>
        </select>

        <br>
        <button type="submit" name="submit">ubah</button>
    </form>
    
</head>
<body>
    
</body>
</html>