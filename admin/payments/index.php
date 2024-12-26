<?php
    require "../../functions.php";

    $payments = query("SELECT 
                    payments.id AS paymentId,
                    payments.paid_date AS paid_date,
                    payments.amount_paid as amount_paid,
                    payments.receipt_url as receipt_url,
                    payments.status as status,
                    ukt.id AS uktId,
                    payment_methods.name AS method_name,
                    students.*,  -- Menambahkan data dari tabel students
                    academic_years.year, academic_years.semester  -- Menambahkan data dari tabel academic_years
                FROM 
                    payments 
                INNER JOIN 
                    ukt ON payments.ukt_id = ukt.id
                INNER JOIN 
                    payment_methods ON payments.method_id = payment_methods.id
                INNER JOIN 
                    students ON ukt.student_id = students.id  -- Menambahkan join ke tabel students
                INNER JOIN 
                    academic_years ON ukt.academic_year_id = academic_years.id  -- Menambahkan join ke tabel academic_years
                ");


    // var_dump($payments);
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
    
<h3>Data pembayaran</h3>
    <a href="cariPemb.php">tambah data pembayaran</a>

    <div class="table-container">
    <table cellpadding="20">
        <thead>
        <tr>
            <th>No.</th>
            <th>Student Name</th>
            <th>Tahun & Semester</th>
            <th>Payment Method</th>
            <th>Payment Date</th>
            <th>Payment Amount</th>
            <th>status</th>
            <th>action</th>
        </tr>
        </thead>

        <?php $i = 1; ?>
        <?php foreach( $payments as $row):?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row["name"]; ?></td>
                <td><?= $row["year"] .'-'. $row["semester"] ?></td>
                <td><?= $row["method_name"]; ?></td>
                <td><?= $row["paid_date"]; ?></td>
                <td>Rp. <?= number_format($row["amount_paid"]); ?></td>
                <td><?= $row["status"]; ?></td>
                <td> <a href="detailPemb.php?id=<?= $row["paymentId"]; ?>">Detail</a> || <a href="ubahPemb.php?id=<?= $row["paymentId"]; ?>">ubah</a> || <a href="hapusPemb.php?id=<?= $row["paymentId"]; ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"> Hapus</a></td>
            </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    </div>
    
    <!-- akhir siswa -->

    <a href="../index.php">kembali</a>

  
</center>  
</body>
</html>