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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <h1>Halaman Tambah Prodi</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $ukt[0]["id"]; ?>">
        <label for="student">student : </label>
        <select name="student_id" id="student_id">
            <?php foreach ($student as $row): ?>
                <option value="<?php echo $row['id']; ?>"><?= $row['nim'] ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="academic_years">academic_years : </label>
        <select name="academic_year_id" id="academic_year_id">
            <?php foreach ($academic_year as $row): ?>
                <option value="<?php echo $row['id']; ?>"><?= $row['year'] ."- semester ". $row['semester'] ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="amount">amount : </label>
        <input type="text" name="amount" id="amount" autocomplete="off" value="<?= $ukt[0]["amount"]; ?>">
        <br>
        <label for="status">status : </label>
        <select name="status" id="status">
            <option value="unpaid">unpaid</option>
            <option value="paid">paid</option>
        </select>
        <br>
        <button type="submit" name="submit">Kirim</button>
    </form>
    
</head>
<body>
    
</body>
</html>