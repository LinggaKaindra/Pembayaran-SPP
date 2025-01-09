<?php 
    session_start();

    if (!isset($_SESSION["loggedin"])) {
        header("Location: ../loginPetugas.php");
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
    <!-- Deklarasi tipe dokumen dan bahasa halaman -->
    <meta charset="UTF-8">
    <!-- Menentukan pengkodean karakter yang digunakan, yaitu UTF-8 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Memastikan kompatibilitas dengan browser tertentu -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Mengatur tampilan agar responsif pada berbagai perangkat -->
    <link rel="stylesheet" href="../Assets/CSS/NavbarStyle.css">
    <!-- Menghubungkan file CSS untuk gaya navigasi -->
    <link rel="stylesheet" href="../Assets/CSS/cardStyle.css">
    <!-- Menghubungkan file CSS untuk gaya kartu -->
    <title>Document</title>
    <!-- Judul halaman -->
</head>
<body>
    <div class="UpperBar">
        <!-- Baris atas untuk menampilkan selamat datang dan username -->
        <label class="Logo">Selamat datang <?= $_SESSION['username'] ?></label>
        <!-- Menampilkan nama pengguna yang diambil dari session -->
    </div>
    
    <div class="LowerBar">
        <!-- Baris navigasi bawah -->
        <ul>
            <?php if ($_SESSION["role"] === 'admin') : ?>
                <!-- Opsi menu untuk pengguna dengan peran admin -->
                <li><a href="users/index.php">User</a></li>
                <li><a href="students/index.php">Siswa</a></li>
                <li><a href="ukt/index.php">UKT</a></li>
                <li><a href="payments/index.php">Pembayaran UKT</a></li>
                <li><a href="payment_methods/index.php">Metode Pembayaran</a></li>
                <li><a href="programs/index.php">Prodi</a></li>
                <li><a href="academic_years/index.php">Tahun Ajaran</a></li>
            <?php else : ?>
                <!-- Opsi menu untuk pengguna non-admin -->
                <li><a href="students/index.php">Siswa</a></li>
                <li><a href="ukt/index.php">UKT</a></li>
                <li><a href="payments/index.php">Pembayaran UKT</a></li>
            <?php endif; ?>
            <li><a href="../logout.php">Log out</a></li>
            <!-- Opsi untuk keluar dari aplikasi -->
        </ul>
    </div>

        <?php if ($_SESSION["role"] === 'admin') : ?>
            <!-- Bagian tampilan statistik untuk admin -->
            <div class="box">
                <div class="card">
                    <div class="title">Total Users</div>
                    <!-- Menampilkan total pengguna -->
                    <div class="number"><?php echo $totalUser["total"]; ?></div>
                </div>

                <div class="card">
                    <div class="title">Total Student</div>
                    <!-- Menampilkan total siswa -->
                    <div class="number"><?php echo $totalStudent["total"]; ?></div>
                </div>

                <div class="card">
                    <div class="title">Total Payment Method</div>
                    <!-- Menampilkan total metode pembayaran -->
                    <div class="number"><?php echo $totalPaymentMethod["total"]; ?></div>
                </div>

                <div class="card">
                    <div class="title">Total Transaction</div>
                    <!-- Menampilkan total transaksi -->
                    <div class="number"><?php echo $totalPayment["total"]; ?></div>
                </div>

                <div class="card">
                    <div class="title">Total Programs</div>
                    <!-- Menampilkan total program studi -->
                    <div class="number"><?php echo $totalProgram["total"]; ?></div>
                </div>

                <div class="card">
                    <div class="title">Total Academic Year</div>
                    <!-- Menampilkan total tahun akademik -->
                    <div class="number"><?php echo $totalAcademicYear["total"]; ?></div>
                </div>
            </div>
        <?php else : ?>
            <!-- Bagian tampilan statistik untuk pengguna non-admin -->
            <div class="box">
                <div class="card">
                    <div class="title">Total Student</div>
                    <!-- Menampilkan total siswa -->
                    <div class="number"><?php echo $totalStudent["total"]; ?></div>
                </div>

                <div class="card">
                    <div class="title">Total Transaction</div>
                    <!-- Menampilkan total transaksi -->
                    <div class="number"><?php echo $totalPayment["total"]; ?></div>
                </div>
            </div>
        <?php endif; ?>
</body>
</html>
