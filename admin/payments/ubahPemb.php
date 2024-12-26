<?php 

require "../../functions.php";

$id = $_GET["id"];


if (isset($_POST["submit"])) {  
    
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

$payment_methods = query("SELECT * FROM payment_methods");

?>

<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../../Assets/CSS/LoginPetugasSiswaStyle.css">
      <title>Ubah Data Registrasi Pembayaran</title>
  </head>
  <body>
      <div class="wrapper">
          <header>Halaman Ubah Data Registrasi Pembayaran</header>
          <form action="" method="post">
            <input type="hidden" name="id" value="<?= $id?>">
            <div class="field studentid">
              <div class="input-area">
                <input type="text" name="nim" id="nim" autocomplete="off" value="<?= $payment[0]['nim']; ?>">
              </div>
            </div>
            <div class="field name">
                <div class="input-area">
                    <input type="text" name="name" id="name" autocomplete="off" value="<?= $payment[0]['name']; ?>" disabled>
                </div>
            </div>
            <div class="field faculty">
                <div class="input-area">
                    <input type="text" name="facultas" id="facultas" autocomplete="off" value="<?= $payment[0]['faculty']; ?>" disabled>
                </div>
            </div>
            <div class="field year">
                <div class="input-area">
                    <input type="text" name="tahun_ajaran" id="tahun" autocomplete="off" value="<?= $payment[0]['year']; ?>" disabled>
                </div>
            </div>
            <div class="field semester">
              <div class="input-area">
                <input type="text" name="semester" id="semester" autocomplete="off" value="<?= $payment[0]['semester']; ?>" disabled>
              </div>
            </div>
            <div class="field amount">
                <div class="input-area">
                    <input type="text" name="amount" id="amount" autocomplete="off" value="Rp. <?= $payment[0]['amount']; ?>" disabled>
                </div>
            </div>
            <div class="field method">
                <div class="input-area">
                    <input type="text" name="amount" id="amount" autocomplete="off" value="<?= $payment[0]['method_name']; ?>" disabled>
                </div>
            </div>
            <div class="field status">
              <div class="select-area">
                <select name="status" id="status">
                    <option value="confirmed">confirmed</option>
                    <option value="failed">failed</option>
                </select>
              </div>
            </div>
            <button type="submit" name="submit" value="Ubah">
          </form>
        </div>
  </body>
  </html>