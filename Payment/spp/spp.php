<?php
include "../koneksi.php";
?>

    <?php
    $query = "SELECT * FROM tb_spp";
    $hasil = mysqli_query($koneksi, $query);
    ?>


 <html>
<body>
    <link rel="stylesheet" href="../style.css">
    <nav>
    <ul>
      <li><a href="tambahspp.php">Tambah Data SPP</a></li>
      <li><a href="../index.php">Back to Index</a></li>
    </ul>
    </nav>
    <br>
    <center>

    <table>
        <tr>
          <th >Angkatan</th>
          <th >Nominal Bayar</th>
          <th scope="col" colspan="2">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($baris = mysqli_fetch_assoc($hasil)) {
        ?>
          <tr>
            <td><?php echo $baris['angkatan']; ?></td>
            <td><?php echo $baris['nominal']; ?></td>
            <td><a class="btn btn-warning" href="updatespp.php?angkatan=<?php echo $baris['angkatan']; ?>">Update</a></td>
            <td><a class="btn btn-danger" href="deletespp.php?angkatan=<?php echo $baris['angkatan']; ?>" onclick="return confirm('Andi yakin akan menghapus data ini?')">Delete</a></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    </center>
</body>

</html>