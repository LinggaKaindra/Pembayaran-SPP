<?php
include "../koneksi.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="PaymentStyle.css">
    <title>Pembayaran</title>
</head>
<body>
<center>
<nav>
    <ul>
      <li><a href="../index.php">Kembali ke Index</a></li>
    </ul>
    </nav>
    <br>
<table border="0" class="SearchColumn">
        <form action="" method="GET">
            <tr>
                <td><input type="text" name="nis" list="NIS" placeholder="Cari Nis">
                    <datalist>
                        <?php
                        $query = "SELECT * FROM tb_siswa";
                        $result = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <option value="<?= $row['nis'] ?>"></option>
                        <?php } ?>
                    </datalist>
                </td>
                <td><button>Cari</button></td>
            </tr>
        </form>
    </table><br>

    <table border="0"class="SearchColumn">
        <?php
        if (isset($_GET['nis'])) {
            $nis = $_GET['nis'];
            $querycari = "SELECT * FROM tb_siswa WHERE nis = $nis";
            $resultcari = mysqli_query($koneksi, $querycari);
            $data = mysqli_fetch_assoc($resultcari);
        
        ?>

        <form action="prosespembayaran.php" method="post">
            <table class="SearchColumn">
            <tr>
                <td style="float:left">NIS</td>
                <td>: <input type="text" readonly name="nis" value="<?= $data['nis']?>"></td>
            </tr>
            <tr>
                <td style="float:left">Nama Siswa</td>
                <td>: <input type="text" readonly name="nama_siswa" value="<?= $data['nama_siswa']?>"></td>
            </tr>
            <tr>
                <td style="float:left">Nama Petugas</td>
                <td>: <input type="text" readonly name="nama_petugas" value="<?php echo $_SESSION['username']; ?>"></td>
            </tr>
            <tr>
                <td style="float:left">Waktu Pembayaran</td>
                <td>: <input type="text" readonly name="waktu_pembayaran" value="<?= date("d-m-Y")?>"></td>
            </tr>
            <tr>
                <td style="float:left">Nominal Bayar</td>
                <?php
                $angkatan = $data['angkatan'];
                $queryspp = mysqli_query($koneksi, "SELECT nominal FROM tb_spp WHERE angkatan = $angkatan");
                $dataspp = mysqli_fetch_assoc($queryspp);
                ?>
                <input type="text" hidden name="angkatan" value="<?= $angkatan?>">
                <td>: <input type="text" readonly name="nominal_bayar" value="<?= $dataspp['nominal']?>"></td>
            </tr>
            <tr>
                <td style="float:left">Total Bayar</td>
                <td>: <input type="text" name="total_bayar" id=""></td>
            </tr>
            </table>
            <br>
            <input class="SubmitButton" type="submit" value="Bayar">
        </form>
        <?php
        }
        ?>

    </table>
</center>
    

</body>
</html>
