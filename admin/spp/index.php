<?php
    require '../../functions.php';
    $pembayaran = query("SELECT * FROM pembayaran");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!-- history -->
    <br><br>
    <h3>Data Pembayaran Spp</h3>
    <a href="ambahSpp.php">tambah data pembayaran Spp</a>

    <table border="2" cellpadding="20" cellspacing="0">
        <tr>
            <td>ID Pembayaran</td>
            <td>ID Petugas</td>
            <td>aksi</td>
            <td>Nisn</td>
            <td>Tgl Bayar</td>
            <td>Bulan Dibayar</td>
            <td>Tahun Dibayar</td>
            <td>ID SPP</td>
            <td>Jumlah Nominal</td>
            <td>Action</td>
        </tr>

        <?php $i = 1; ?>
        <?php foreach( $pembayaran as $spp):?>
            <tr>
                <td><?= $spp["id_pembayaran"]; ?></td>
                <td><?= $spp["id_petugas"]; ?></td>
                <td><?= $spp["nisn"]; ?></td>
                <td><?= $spp["tgl_bayar"]; ?></td>
                <td><?= $spp["bulan_dibayar"]; ?></td>
                <td><?= $spp["tahun_dibayar"]; ?></td>
                <td><?= $spp["id_spp"]; ?></td>
                <td><?= $spp["jumlah_dibayar"]; ?></td>
                <td><a href="spp/ubahHis.php?id=<?= $spp["id_pembayaran"]; ?>">Ubah</a> || <a href="spp/hapusHis.php?id=<?= $spp["id_pembayaran"]; ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')">Hapus</a></td>
                              
            </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>

    <a href="../index.php">kembali</a>
    
</body>
</html>