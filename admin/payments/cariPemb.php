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
    <link rel="stylesheet" href="../../Assets/CSS/tablestyle.css">
    <title>Document</title>

    
    
</head>
<body>
<center>
<h1>Halaman Registrasi Pembayaran</h1>
    <form action="" method="post">
        <div class="field idstudent">
            <div class="input-area">
            <input type="text" name="nim" id="nim" autocomplete="off" placeholder="Ketikkan NIM">
            </div>
        </div>
        
        <br>
        <input type="submit" name="submit" value="Kirim">
        <!-- <button type="submit" name="submit">Kirim</button> -->
    </form>

    <h1>Halaman Pembayaran</h1>

    <?php if (!empty($search)): ?>
    <div class="table-container">
    <table cellpadding="20">
        <thead>
        <tr>
            <th>No.</th>
            <th>Student Name</th>
            <th>Tahun & Semester</th>
            <th>Payment Amount</th>
            <th>status</th>
            <th>action</th>
        </tr>
        </thead>

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
    </div>  
    <?php else: ?>
    <h2>Mohon ketikan nim </h2>
    <?php endif; ?>  
</center>
</body>
</html>