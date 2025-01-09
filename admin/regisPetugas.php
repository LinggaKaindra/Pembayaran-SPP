<?php 

require "../functions.php";

    // var_dump($_POST);
    if (isset($_POST["submit"])) {

        if(regisPetugas($_POST)){
            header("location: loginPetugas.php");
        }
    }

?>

<!DOCTYPE html>
<!-- Deklarasi tipe dokumen HTML5 untuk memastikan kompatibilitas dengan standar HTML5 -->
<html lang="en">
<!-- Tag pembuka HTML, atribut lang="en" menunjukkan bahwa bahasa dokumen adalah Bahasa Inggris -->
<head>
    <!-- Tag <head> berisi metadata dokumen dan elemen-elemen yang tidak ditampilkan secara langsung di halaman -->
    
    <meta charset="UTF-8">
    <!-- Menentukan karakter encoding dokumen sebagai UTF-8 untuk mendukung berbagai karakter -->
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Menginstruksikan browser untuk menggunakan mode kompatibel terbaru -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Mengatur tampilan pada perangkat berbeda agar sesuai dengan lebar layar perangkat -->
    
    <link rel="stylesheet" href="../Assets/CSS/LoginPetugasSiswaStyle.css">
    <!-- Menyertakan file CSS eksternal untuk memberikan gaya pada halaman -->

    <title>Registrasi Petugas</title>
    <!-- Judul halaman yang akan ditampilkan di tab browser -->
</head>
<body>
    <!-- Elemen <body> berisi konten utama halaman yang akan ditampilkan kepada pengguna -->
    
    <div class="wrapper">
        <!-- Elemen <div> dengan class "wrapper" digunakan sebagai kontainer utama untuk mengatur layout -->
        
        <header>Halaman Registrasi Petugas</header>
        <!-- Elemen <header> berfungsi sebagai judul atau header halaman -->
        
        <form action="" method="post">
        <!-- Elemen <form> digunakan untuk mengumpulkan input pengguna, dengan metode pengiriman POST -->
        
            <div class="field username">
                <!-- Elemen <div> untuk membungkus input terkait username -->
                
                <div class="input-area">
                    <!-- Elemen <div> tambahan untuk mengatur tata letak input -->
                    
                    <input type="text" name="username" id="username" autocomplete="off" placeholder="Username">
                    <!-- Input untuk username, tipe teks, dengan placeholder dan autocomplete dimatikan -->
                </div>
            </div>
            
            <div class="field email">
                <!-- Elemen <div> untuk membungkus input terkait email -->
                
                <div class="input-area">
                    <!-- Elemen <div> tambahan untuk mengatur tata letak input -->
                    
                    <input type="email" name="email" id="email" autocomplete="off" placeholder="Email">
                    <!-- Input untuk email, tipe email, dengan placeholder dan autocomplete dimatikan -->
                </div>
            </div>
            
            <div class="field password">
                <!-- Elemen <div> untuk membungkus input terkait password -->
                
                <div class="input-area">
                    <!-- Elemen <div> tambahan untuk mengatur tata letak input -->
                    
                    <input type="password" name="password" id="password" autocomplete="off" placeholder="Password">
                    <!-- Input untuk password, tipe password, dengan placeholder dan autocomplete dimatikan -->
                </div>
            </div>
            
            <input type="submit" name="submit" value="Kirim">
            <!-- Tombol kirim untuk mengirimkan data pada form -->

            <a href="loginPetugas.php">Sudah punya akun?</a>
            <!-- Tautan ke halaman login jika pengguna sudah memiliki akun -->
        </form>
    </div>
</body>
</html>
