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
    <title>Document</title>
</head>
<body>

    <h3>Data pembayaran</h3>
    <a href="cariPemb.php">tambah data pembayaran</a>

    
    <table border="2" cellpadding="20" cellspacing="0">
        <tr>
            <td>No.</td>
            <td>Student Name</td>
            <td>Tahun & Semester</td>
            <td>Payment Method</td>
            <td>Payment Date</td>
            <td>Payment Amount</td>
            <td>Receipt URL</td>
            <td>status</td>
            <td>action</td>
        </tr>

        <?php $i = 1; ?>
        <?php foreach( $payments as $row):?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row["name"]; ?></td>
                <td><?= $row["year"] .'-'. $row["semester"] ?></td>
                <td><?= $row["method_name"]; ?></td>
                <td><?= $row["paid_date"]; ?></td>
                <td>Rp. <?= number_format($row["amount_paid"]); ?></td>
                <td>
                    <a href="<?= $row["receipt_url"]; ?>">
                        <?= $row["receipt_url"]; ?></td>
                    </a>
                <td><?= $row["status"]; ?></td>
                <td><a href="ubahPemb.php?id=<?= $row["paymentId"]; ?>">ubah</a> || <a href="hapusPemb.php?id=<?= $row["paymentId"]; ?>"> Hapus</a></td>
            </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    <!-- akhir siswa -->

    
</body>
</html>