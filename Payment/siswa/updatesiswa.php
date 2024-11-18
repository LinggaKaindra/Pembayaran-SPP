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
    <title>Form Update Data Siswa</title>
  </head>

  <body>
    <center><br><br><br>


      <form action="prosesupdatesiswa.php" method="post">

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
          <tr>
            <td>
              <button onclick="location.href='siswa.php'" type ="button">Batal</button>
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