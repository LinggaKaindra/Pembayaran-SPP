<?php
include("../koneksi.php");

$spp = $_GET['angkatan'];

$query = "SELECT * FROM tb_spp WHERE angkatan='$spp'";
$hasil = mysqli_query($koneksi, $query);
while ($row = mysqli_fetch_assoc($hasil)) {

?>


  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Update Data Spp</title>
  </head>

  <body>
    <center><br><br><br>


      <form action="prosesupdatespp.php" method="post">

        <table border="2" cellpadding="10" cellspacing="0">
          <tr>
            <td>Angkatan</td>
            <td><input type="text" name="angkatan" value="<?php echo $row['angkatan']; ?>"></td>
          </tr>
          <tr>
            <td>Nominal</td>
            <td><input type="text" name="nominal" value="<?php echo $row['nominal']; ?>"></td>
        <tr>
            <td>
              <button onclick="location.href='spp.php'" type ="button">Batal</button>
            </td>
            <td style="float: right;">
              <button type="submit">simpan</button>
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