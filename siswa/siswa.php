<?php
include "../koneksi.php";
?>

    <?php
    $query = "SELECT * FROM tb_siswa";
    $hasil = mysqli_query($koneksi, $query);
    ?>


 <html>
<body>
    <link rel="stylesheet" href="../style.css">
    <nav>
    <ul>
      <li><a href="tambahsiswa.php">Tambah Siswa</a></li>
      <li><a href="../index.php">Back to Index</a></li>
    </ul>
    </nav>
    <br>
    <center>
    <table>
        <tr>
          <th >Nis</th>
          <th >Nama siswa</th>
          <th>Password</th>
          <th >Kelas</th>
          <th >angkatan</th>
          <th scope="col" colspan="2">Aksi</th>
        </tr>
      <tbody>
        <?php
        while ($baris = mysqli_fetch_assoc($hasil)) {
        ?>
          <tr>
            <td><?php echo $baris['nis']; ?></td>
            <td><?php echo $baris['nama_siswa']; ?></td>
            <td><?php echo $baris['password']; ?></td>
            <td><?php echo $baris['kelas']; ?></td>
            <td><?php echo $baris['angkatan']; ?></td>
            <td><a class="btn btn-warning" href="updatesiswa.php?nis=<?php echo $baris['nis']; ?>">Update</a></td>
            <td><a class="btn btn-danger" href="deletesiswa.php?nis=<?php echo $baris['nis']; ?>" onclick="return confirm('Andi yakin akan menghapus data ini?')">Delete</a></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    </center>
</body>

</html>