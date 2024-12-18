<?php 
 
 $conn = mysqli_connect("localhost","root","","spp_2");

 function query($query){
    global $conn;

    $result = mysqli_query($conn,$query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;
 }


//  pengguna
function regisPeng($data){
    global $conn;

    // Ambil dan sanitasi input
    $username = htmlspecialchars($data["username"]);
    $password = password_hash($data['password'], PASSWORD_BCRYPT);
    $email = htmlspecialchars($data["email"]);
    $role = htmlspecialchars($data["level"]);
    
    if (empty($role)) {
        $role = 'petugas';
    }

    // Insert ke tb_pengguna
    $sqlPengguna = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')";
    mysqli_query($conn, $sqlPengguna);

    // Kembalikan jumlah baris yang terpengaruh
    return mysqli_affected_rows($conn);
}

function ubahPeng($data){
    global $conn;

    $id = $data["id"];
    $username = htmlspecialchars($data["username"]);
    $password = password_hash($data['password'], PASSWORD_BCRYPT);
    $email = htmlspecialchars($data["email"]);
    $role = htmlspecialchars($data["level"]);

    $sql = "UPDATE users SET username = '$username', email ='$email', password = '$password', role = '$role' WHERE id = '$id'";
    mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);
}

function hapusPeng($id){
    global $conn;

    $id = $_GET["id"];
    $sql = "DELETE FROM users WHERE id = $id";
    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);
}

// Prodi
function tambahProdi($data){
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    $sql = "INSERT INTO programs (name, faculty) VALUES ('$nama','$jurusan')";

    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);
}

function ubahProd($data){
    global $conn;

    // var_dump($data);

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    var_dump($id, $nama, $jurusan);

    $sql = "UPDATE programs SET name = '$nama', faculty = '$jurusan' WHERE id = '$id'";

    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);
}

function hapusProd($id){
    global $conn;

    $id = $_GET["id"];
    $sql = "DELETE FROM programs WHERE id = $id";
    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);
}

// Pembayaran
function cariPemb($data){
    global $conn;

    $nim = htmlspecialchars($data["nim"]);
    $sql = "SELECT * FROM students WHERE nim = '$nim'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    var_dump($row);

    if ($row) {
        return $row;
    } else {
        return false;
    }
}

function tambahPemb($data){

    // var_dump($data);return;
    global $conn;

    $id = $data["ukt_id"];
    $method_id = htmlspecialchars($data["payment_method_id"]);
    $paid_date = date("Y-m-d");

     // Remove the 'Rp.' part and ensure it's a valid number
     $amount = str_replace('Rp. ', '', $data["amount"]);
     $amount = str_replace(',', '', $amount); // Remove commas in case the amount has them (e.g., 'Rp. 10,000')

    $receipt_url = "http://localhost/spp_2/admin/payments/receipts/". $data["nim"];
    $status = "confirmed";

    $sql = "INSERT INTO payments (ukt_id, method_id, paid_date, amount_paid, receipt_url, status) VALUES ('$id','$method_id','$paid_date','$amount','$receipt_url','$status')";
    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);

}

function ubahPemb($data){
    global $conn;


    $id = $data["id"];
    $status = htmlspecialchars($data["status"]);

    $sql = "UPDATE payments SET status = '$status' WHERE id = '$id'";

    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);
}

function hapusPemb($id){
    global $conn;

    $id = $_GET["id"];
    $sql = "DELETE FROM payments WHERE id = $id";
    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);
}



// tahun ajaran
function tambahTahun($data){
    global $conn;

    $year = htmlspecialchars($data["year"]);
    $semester = htmlspecialchars($data["semester"]);
    $status = htmlspecialchars($data["status"]);

    $sql = "INSERT INTO academic_years (year, semester, status) VALUES ('$year','$semester','$status')";

    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);
}

function ubahTahun($data){
    global $conn;

    $id = $data["id"];
    $year = htmlspecialchars($data["year"]);
    $semester = htmlspecialchars($data["semester"]);
    $status = htmlspecialchars($data["status"]);

    $sql = "UPDATE academic_years SET year = '$year', semester = '$semester', status = '$status' WHERE id = '$id'";

    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);
}

function hapusTahun($id){
    global $conn;

    $id = $_GET["id"];
    $sql = "DELETE FROM academic_years WHERE id = $id";
    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);
}

// payment methods
function tambahPaymentMethod($data){
    global $conn;

    $name = htmlspecialchars($data["name"]);

    $sql = "INSERT INTO payment_methods (name) VALUES ('$name')";

    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);
}

function ubahPaymentMethod($data){
    global $conn;

    $id = $data["id"];
    $name = htmlspecialchars($data["name"]);

    $sql = "UPDATE payment_methods SET name = '$name' WHERE id = '$id'";

    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);
}

function hapusPaymentMethod($id){
    global $conn;

    $id = $_GET["id"];
    $sql = "DELETE FROM payment_methods WHERE id = $id";
    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);
}


// admin punya
function ubahPet($data){
    global $conn;

    $id = $data["id_petugas"];
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $namaPetugas = htmlspecialchars($data["namaPetugas"]);
    $level = htmlspecialchars($data["level"]);
    
    $sql = "UPDATE petugas SET username = '$username', password = '$password', nama_petugas = '$namaPetugas',level = '$level' WHERE id_petugas = '$id' ";

    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);

}



//  petugas
function regisPetugas($data){
    global $conn;
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $namaPetugas = htmlspecialchars($data["namaPetugas"]);
    
    $sql = "INSERT INTO petugas VALUES ('','$username','$password','$namaPetugas','petugas')";

    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);
}

function hapusPet($id){
    global $conn;

    $id = $_GET["id"];
    $sql = "DELETE FROM petugas WHERE id_petugas = $id";
    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);


}


// siswa
function regisSiswa($data){
    global $conn;

    $nim = htmlspecialchars($data["nim"]);
    $name = htmlspecialchars($data["name"]);
    $email = htmlspecialchars($data["email"]);
    $password = password_hash($data["password"], PASSWORD_BCRYPT);
    $phone = htmlspecialchars($data["phone"]);
    $program_id = htmlspecialchars($data["program_id"]);

    $sql = "INSERT INTO students (nim, name, email, password, phone, program_id) VALUES ('$nim','$name','$email','$password','$phone','$program_id')";

    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);
}

function ubahSiswa($data){
    global $conn;

    $id = $data["id"];
    $nim = htmlspecialchars($data["nim"]);
    $name = htmlspecialchars($data["name"]);
    $email = htmlspecialchars($data["email"]);
    $password = password_hash($data["password"], PASSWORD_BCRYPT);
    $phone = htmlspecialchars($data["phone"]);
    $program_id = htmlspecialchars($data["program_id"]);

    $sql = "UPDATE students SET nim = '$nim', name = '$name', email = '$email', password = '$password', phone = '$phone', program_id = '$program_id' WHERE id = '$id'";

    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);
}

function hapusSis($id){
    global $conn;

    $sql = "DELETE FROM students WHERE id = $id";
    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);

}

// ukt
function tambahUKT($data){
    global $conn;

    $student_id = htmlspecialchars($data["student_id"]);
    $academic_year_id = htmlspecialchars($data["academic_year_id"]);
    $amount = htmlspecialchars($data["amount"]);
    $status = htmlspecialchars($data["status"]);

    $sql = "INSERT INTO ukt (student_id, academic_year_id, amount, status) VALUES ('$student_id','$academic_year_id','$amount','$status')";

    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);
}

function ubahUKT($data){
    global $conn;

    $id = $data["id"];
    $student_id = htmlspecialchars($data["student_id"]);
    $academic_year_id = htmlspecialchars($data["academic_year_id"]);
    $amount = htmlspecialchars($data["amount"]);
    $status = htmlspecialchars($data["status"]);

    $sql = "UPDATE ukt SET student_id = '$student_id', academic_year_id = '$academic_year_id', amount = '$amount', status = '$status' WHERE id = '$id'";

    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);
}

function hapusUKT($data){
    global $conn;

    $id = $_GET["id"];
    $sql = "DELETE FROM ukt WHERE id = $id";
    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);
}

// function spp



function tambahHis($data){
    global $conn;
    
    $idPet = $data["idPetugas"];
    $nisn = $data["nisn"];
    $tgl = $data["tglBayar"];
    $bln = $data["blnDibayar"];
    $thn = $data["thnDibayar"];
    $jml = $data["jumlahDibayar"];

    $sql = "INSERT INTO pembayaran VALUES ('', '$idPet','$nisn','$tgl','$bln','$thn','1','$jml')";
    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);
}

function ubahHis($data){
    global $conn;
    
    $id = $data["id_pembayaran"];
    $idPet = $data["idPetugas"];
    $nisn = $data["nisn"];
    $tgl = $data["tglBayar"];
    $bln = $data["blnDibayar"];
    $thn = $data["thnDibayar"];
    $jml = $data["jumlahDibayar"];

    $sql = "UPDATE pembayaran SET id_petugas = '$idPet', nisn = '$nisn', tgl_bayar = '$tgl', bulan_dibayar = '$bln', tahun_dibayar = '$thn', id_spp = '1' , jumlah_dibayar = '$jml' WHERE id_pembayaran = '$id'";
    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);
}

function hapusHis($id){
    global $conn;

    $sql = "DELETE FROM pembayaran WHERE id_pembayaran = $id";
    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);

}



?>