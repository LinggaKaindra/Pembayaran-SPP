<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../AddAndUpdateStyle.css">
  <title>Tambah Siswa</title>
</head>

<body>
  <center><br><br><br>


    <form action="prosestambahsiswa.php" method="post">

      <table border="2" cellpadding="10" cellspacing="0">
      <tr>
          <td>nis</td>
          <td><input type="text" name="nis" id=""></td>
        </tr>
        <tr>
          <td>nama_siswa</td>
          <td><input type="text" name="nama_siswa" id=""></td>
        </tr>
        <tr>
          <td>password</td>
          <td><input type="text" name="password" id=""></td>
        </tr>
        <tr>
          <td>kelas</td>
          <td><input type="text" name="kelas" id=""></td>
        </tr>
        <tr>
          <td>Angkatan</td>
          <td>
              <select name="angkatan" id="">

              <?php
              include("../koneksi.php");

              $query = "SELECT angkatan FROM tb_spp";
              $hasil = mysqli_query($koneksi, $query);
              while ($row = mysqli_fetch_assoc($hasil)) {
              ?>
                <option value="<?php echo $row['angkatan']; ?>"><?php echo $row['angkatan']; ?></option>
              <?php
              }
              ?>
            </select>
          </td>
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