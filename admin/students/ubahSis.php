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
    <title>Document</title>
</head>
<body>
    
    <h1>Ubah Data Siswa</h1>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $siswa["id"]; ?>">
        <label for="nim">nim : </label>
        <input type="text" name="nim" id="nim" autocomplete="off" value="<?= $siswa["nim"]; ?>">
        <br>
        <label for="name">name : </label>
        <input type="text" name="name" id="name" autocomplete="off" value="<?= $siswa["name"]; ?>">
        <br>
        <label for="email">email : </label>
        <input type="email" name="email" id="email" autocomplete="off" value="<?= $siswa["email"]; ?>">
        <br>
        <label for="password">password : </label>
        <input type="password" name="password" id="password" autocomplete="off" value="<?= $siswa["password"]; ?>">
        <br>
        <label for="phone">No Telp. : </label>
        <input type="text" name="phone" id="phone" autocomplete="off" value="<?= $siswa["phone"]; ?>">
        <br>
        <label for="program_id">Pilih Kelas : </label>
        
        <select name="program_id" id="program_id">
            <?php foreach ($programs as $row): ?>
                <option value="<?php echo $row['id']; ?>"><?= $row['faculty'] ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <button type="submit" name="submit">Kirim</button>
    </form>
    
</body>
</html>