<?php
include "../koneksi.php";
?>

    <?php
    $query = "SELECT * FROM tb_user";
    $hasil = mysqli_query($koneksi, $query);
    ?>


 <html>
<body>
    <link rel="stylesheet" href="../style.css">
    <nav>
    <ul>
      <li><a href="tambahpengguna.php">Tambah Pengguna</a></li>
      <li><a href="../index.php">Back to Index</a></li>
    </ul>
    </nav>
    <br>
    <center>
    <table>
        <tr>
          <th >nip</th>
          <th >nama petugas</th>
          <th scope="col" colspan="2">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($baris = mysqli_fetch_assoc($hasil)) {
        ?>
          <tr>
            <td><?php echo $baris['niu']; ?></td>
            <td><?php echo $baris['nama_pengguna']; ?></td>
            <td><?php echo $baris['email']; ?></td>
            <td><a class="btn btn-warning" href="updatepetugas.php?nip=<?php echo $baris['nip']; ?>">Update</a></td>
            <td><a class="btn btn-danger" href="deletepetugas.php?nip=<?php echo $baris['nip']; ?>" onclick="return confirm('Andi yakin akan menghapus data ini?')">Delete</a></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    </center>
</body>

</html>