<?php 


require "../../functions.php";
$id = $_GET["id"];

$method = query("SELECT * FROM payment_methods WHERE id = $id");

if (isset($_POST["submit"])) {
    
    if (ubahPaymentMethod($_POST)) {
        header("location: index.php");
    }
}


?>

<!DOCTYPE html>
<!-- Deklarasi tipe dokumen HTML5 untuk memastikan kompatibilitas dengan standar HTML5 -->
<html lang="en">
<!-- Tag pembuka HTML, atribut lang="en" menunjukkan bahwa bahasa dokumen adalah Bahasa Inggris -->
<head>
    <!-- Elemen <head> berisi metadata dokumen dan elemen-elemen yang tidak langsung ditampilkan di halaman -->
    
    <meta charset="UTF-8">
    <!-- Menentukan karakter encoding dokumen sebagai UTF-8 untuk mendukung berbagai karakter -->
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Menginstruksikan browser untuk menggunakan mode kompatibel terbaru -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Mengatur agar halaman dapat disesuaikan dengan lebar layar perangkat, penting untuk desain responsif -->
    
    <link rel="stylesheet" href="../../Assets/CSS/LoginPetugasSiswaStyle.css">
    <!-- Menyertakan file CSS eksternal yang terletak di folder relatif untuk memberikan gaya pada halaman -->

    <title>Ubah Metode Pembayaran</title>
    <!-- Judul halaman yang akan ditampilkan di tab browser -->
</head>
<body>
    <!-- Elemen <body> berisi konten utama halaman yang akan ditampilkan kepada pengguna -->

    <input type="hidden" name="id" value="<?= $method[0]["id"]; ?>">
    <!-- Elemen <input> tipe "hidden" untuk menyimpan nilai ID metode pembayaran secara tersembunyi -->

    <div class="wrapper">
        <!-- Elemen <div> dengan class "wrapper" sebagai kontainer utama untuk mengatur tata letak -->

        <header>Ubah Metode Pembayaran</header>
        <!-- Elemen <header> digunakan untuk menampilkan judul atau heading halaman -->

        <form action="" method="post">
        <!-- Elemen <form> digunakan untuk mengumpulkan dan mengirimkan data melalui metode POST -->
        
            <input type="hidden" name="id" value="<?= $method[0]["id"]; ?>" hidden>
            <!-- Elemen <input> tipe "hidden" yang menyimpan nilai ID metode pembayaran, digunakan dalam proses backend -->
            
            <div class="field name">
                <!-- Elemen <div> sebagai pembungkus untuk input field nama metode pembayaran -->
                
                <div class="input-area">
                    <!-- Elemen <div> untuk mengatur tata letak input -->
                    
                    <input type="text" name="name" id="name" autocomplete="off" value="<?= $method[0]["name"]; ?>">
                    <!-- Input field untuk nama metode pembayaran, dengan nilai default dari backend -->
                </div>
            </div>
            
            <input type="submit" name="submit" value="Kirim">
            <!-- Tombol kirim untuk mengirimkan data form -->
        </form>
    </div>
</body>
</html>
