<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Siswa</title>
</head>

<body>
  <center><br><br><br>


    <form action="prosestambahspp.php" method="post">

      <table border="2" cellpadding="10" cellspacing="0">
      <tr>
          <td>Angkatan</td>
          <td><input type="text" name="angkatan" id=""></td>
        </tr>
        <tr>
          <td>Nominal</td>
          <td><input type="text" name="nominal" id=""></td>
        </tr>
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