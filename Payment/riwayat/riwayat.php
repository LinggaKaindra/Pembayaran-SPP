<?php
include "../koneksi.php";
?>

    <?php
    $query = "SELECT * FROM tb_pembayaran";
    $hasil = mysqli_query($koneksi, $query);
    ?>


 <html>
<body>
    <link rel="stylesheet" href="../style.css">
    <nav>
    <ul>
      <li><a href="../index.php">Back to Index</a></li>
    </ul>
    </nav>
    <br>
    <center>
    <table>
        <tr>
        <th>ID Pembayaran</th>
        <th>Nama Siswa</th>
        <th>Nama Petugas</th>
        <th>Waktu Pembayaran</th>
        <th>Nominal Bayar</th>
        <th>Total Bayar</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($baris = mysqli_fetch_assoc($hasil)) {
        ?>
          <tr>
            <td><?php echo $baris['id_pembayaran']; ?></td>
            <td><?php echo $baris['nama_siswa']; ?></td>
            <td><?php echo $baris['nama_petugas']; ?></td>
            <td><?php echo $baris['waktu_pembayaran']; ?></td>
            <td><?php echo $baris['nominal_bayar']; ?></td>
            <td><?php echo $baris['total_bayar']; ?></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    <br>
    <button onclick="window.print()">Cetak Riwayat Pembayaran</button>
    </center>
</body>

</html>