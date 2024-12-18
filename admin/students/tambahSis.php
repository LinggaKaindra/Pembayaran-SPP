<?php 
require"../../functions.php";

if (isset($_POST["submit"])) {
    
   if (regisSiswa($_POST)) {
       header("Location: index.php");
   }
}

    $programs = query("SELECT * FROM programs");



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Register</title>
</head>
<body>

    <h1>Halaman Register Siswa</h1>

    <form action="" method="post">
        <label for="nim">nim : </label>
        <input type="text" name="nim" id="nim" autocomplete="off">
        <br>
        <label for="name">name : </label>
        <input type="text" name="name" id="name" autocomplete="off">
        <br>
        <label for="email">email : </label>
        <input type="email" name="email" id="email" autocomplete="off">
        <br>
        <label for="password">password : </label>
        <input type="password" name="password" id="password" autocomplete="off">
        <br>
        <label for="phone">No Telp. : </label>
        <input type="text" name="phone" id="phone" autocomplete="off">
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