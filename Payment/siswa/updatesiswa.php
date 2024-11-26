<?php
include("../koneksi.php");

$id = $_GET['nis'];

$query = "SELECT * FROM tb_siswa WHERE nis='$id'";
$hasil = mysqli_query($koneksi, $query);
while ($row = mysqli_fetch_assoc($hasil)) {

?>


  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../AddAndUpdateStyle.css">
    <title>Form Update Data Siswa</title>
  </head>

  <body>
  <nav>
    <ul>
      <li><a href="siswa.php">Kembali ke Siswa</a></li>
    </ul>
</nav>
    <center><br><br><br>


      <form action="prosesupdatesiswa.php" method="post" class="InputColumn">

        <table border="2" cellpadding="10" cellspacing="0">
          <tr>
            <input hidden type="text" name="nis" value="<?php echo $row['nis']; ?>">

          <tr>
            <td>Nama Siswa</td>
            <td><input type="text" name="nama_siswa" value="<?php echo $row['nama_siswa']; ?>"></td>
          </tr>
          <tr>
            <td>Password</td>
            <td><input type="text" name="password" value="<?php echo $row['password']; ?>"></td>
          </tr>
          <tr>
            <td>Kelas</td>
            <td><input type="text" name="kelas" value="<?php echo $row['kelas']; ?>"></td>
          </tr>
          <tr>
            <td>angkatan</td>
            <td><input type="text" name="angkatan" value="<?php echo $row['angkatan']; ?>"></td>
          </tr>
        </table>
        <input class="SubmitButton" type="submit" value="Simpan">
      </form>

    </center>

  </body>

  </html>
<?php
}
?>
