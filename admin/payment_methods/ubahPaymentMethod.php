<?php 


require "../../functions.php";
$id = $_GET["id"];

$method = query("SELECT * FROM payment_methods WHERE id = $id");

if (isset($_POST["submit"])) {
    
    if (ubahPaymentMethod($_POST)) {
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
    <title>Ubah Metode Pembayaran</title>
</head>
<body>
  <input type="hidden" name="id" value="<?= $method[0]["id"]; ?>">
      <div class="wrapper">
        <header>Ubah Metode Pembayaran</header>
        <form action="" method="post">
          <input type="hidden" name="id" value="<?= $method[0]["id"]; ?>" hidden>
          <div class="field name">
            <div class="input-area">
              <input type="text" name="name" id="name" autocomplete="off" value="<?= $method[0]["name"]; ?>">
            </div>
          </div>
          <input type="submit" name="submit" value="Kirim">
        </form>
      </div>
</body>
</html>