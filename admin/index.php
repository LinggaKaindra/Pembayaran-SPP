<?php 
    session_start();

    if (!isset($_SESSION["loggedin"])) {
        header("Location: ../login.php");
        exit;
    }

    require "../functions.php";

    $totalUser = query("SELECT COUNT(*) as total FROM users")[0];
    $totalPaymentMethod = query("SELECT COUNT(*) as total FROM payment_methods")[0];
    $totalProgram = query("SELECT COUNT(*) as total FROM programs")[0];
    $totalAcademicYear = query("SELECT COUNT(*) as total FROM academic_years")[0];
    $totalStudent = query("SELECT COUNT(*) as total FROM students")[0];
    $totalPayment = query("SELECT COUNT(*) as total FROM payments")[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/CSS/NavbarStyle.css">
    <link rel="stylesheet" href="../Assets/CSS/cardStyle.css">
    <title>Document</title>
</head>
<body>
    <div class="UpperBar">
        <label class="Logo">Selamat datang <?= $_SESSION['username'] ?></label>
    </div>
    
    <div class="LowerBar">
        <ul>
            <?php if ($_SESSION["role"] === 'admin') : ?>
                <li><a href="users/index.php">User</a></li>
                <li><a href="students/index.php">Siswa</a></li>
                <li><a href="ukt/index.php">UKT</a></li>
                <li><a href="payments/index.php">SPP</a></li>
                <li><a href="payment_methods/index.php">Metode Pembayaran</a></li>
                <li><a href="programs/index.php">Prodi</a></li>
                <li><a href="academic_years/index.php">Tahun Ajaran</a></li>
            <?php else : ?>
                <li><a href="students/index.php">Siswa</a></li>
                <li><a href="payments/index.php">Pembayaran</a></li>
            <?php endif; ?>
            <li><a href="../logout.php">Log out</a></li>
        </ul>
    </div>

        
        
            <?php if ($_SESSION["role"] === 'admin') : ?>
                <div class="box">
                    <div class="card">
                        <div class="title">Total Users</div>
                        <div class="number"><?php echo $totalUser["total"]; ?></div>
                    </div>

                    <div class="card">
                        <div class="title">Total Student</div>
                        <div class="number"><?php echo $totalStudent["total"]; ?></div>
                    </div>

                    <div class="card">
                        <div class="title">Total Payment Method</div>
                        <div class="number"><?php echo $totalPaymentMethod["total"]; ?></div>
                    </div>

                    <div class="card">
                        <div class="title">Total Transaction</div>
                        <div class="number"><?php echo $totalPayment["total"]; ?></div>
                    </div>

                    <div class="card">
                        <div class="title">Total Programs</div>
                        <div class="number"><?php echo $totalProgram["total"]; ?></div>
                    </div>

                    <div class="card">
                        <div class="title">Total Academic Year</div>
                        <div class="number"><?php echo $totalAcademicYear["total"]; ?></div>
                    </div>
                </div>
            <?php else : ?>
                <div class="box">
                    <div class="card">
                        <div class="title">Total Student</div>
                        <div class="number"><?php echo $totalStudent["total"]; ?></div>
                    </div>
    
                    <div class="card">
                        <div class="title">Total Transaction</div>
                        <div class="number"><?php echo $totalPayment["total"]; ?></div>
                    </div>
                </div>
            <?php endif; ?>
</body>
</html>