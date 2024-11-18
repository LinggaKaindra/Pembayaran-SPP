<?php
include("../koneksi.php");

$nip = $_GET['nip'];

$query = "SELECT * FROM tb_petugas WHERE nip='$nip'";
$hasil = mysqli_query($koneksi, $query);
while ($row = mysqli_fetch_assoc($hasil)) {

?>


  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Update Data Petugas</title>
  </head>

  <body>
    <center><br><br><br>


      <form action="prosesupdatepetugas.php" method="post">

        <table border="2" cellpadding="10" cellspacing="0">
          <tr>
            <input hidden type="text" name="nip" value="<?php echo $row['nip']; ?>">

          <tr>
            <td>Nama Petugas</td>
            <td><input type="text" name="nama_petugas" value="<?php echo $row['nama_petugas']; ?>"></td>
          </tr>
          <tr>
            <td>Password</td>
            <td><input type="text" name="password" value="<?php echo $row['password']; ?>"></td>
          </tr>
          <tr>
            <td>Level User</td>
            <td><input type="text" name="lvl_user" value="<?php echo $row['lvl_user']; ?>"></td>
          </tr>
            <td>
              <button onclick="location.href='petugas.php'" type ="button">Batal</button>
            </td>
            <td>
              <button type="submit" style="float: right;">simpan</button>
            </td>
          </tr>

        </table>

      </form>

    </center>

  </body>

  </html>
<?php
}
?>