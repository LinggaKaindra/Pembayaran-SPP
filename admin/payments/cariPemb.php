<?php 

require "../../functions.php";

if (isset($_POST["submit"])) {
    
    $search = cariPemb($_POST["nim"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <h1>Halaman Registrasi Pembayaran</h1>
    <form action="" method="post">
        <label for="nim">nim : </label>
        <input type="text" name="nim" id="nim" autocomplete="off">
        <br>
        <button type="submit" name="submit">Kirim</button>
    </form>

    <h1>Halaman Pembayaran</h1>

    <?php if (!empty($search)): ?>
    <table border="2" cellpadding="20" cellspacing="0">
        <tr>
            <td>No.</td>
            <td>Student Name</td>
            <td>Tahun & Semester</td>
            <td>Payment Amount</td>
            <td>status</td>
            <td>action</td>
        </tr>

        <?php $i = 1; ?>
        <?php foreach( $search as $row):?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row["name"]; ?></td>
                <td><?= $row["year"] .'-'. $row["semester"] ?></td>
                <td>Rp. <?= number_format($row["amount"]); ?></td>
                <td><?= $row["status"]; ?></td>

                <?php 
                    if ($row['status'] == 'unpaid') {
                        echo '
                            <td><a href="tambahPemb.php?id=' . $row['id'] . '&nim=' . $row['nim'] . '">Bayar</a></td>
                        ';
                    
                    } else {
                        echo '
                            <td><a href="detailPemb.php?id=' . $row['id'] . '">Detail</a></td>
                        ';
                    }
                ?>
            </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>  
    <?php else: ?>
    <h2>Mohon ketikan nim </h2>
    <?php endif; ?>  
    
</head>
<body>
    
</body>
</html>