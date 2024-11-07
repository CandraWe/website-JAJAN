<?php
include "../koneksi.php"; // untuk tidak usah membuat koneksi lagi
// echo "login\n"; \n untuk kata atau berikutnya turun kebawah

// kasih session start dulu agar bisa makai session
session_start();

$hp = $_POST["no_telpon"]; //isi Post sesuai name di login
$pw = $_POST["password"];

$sql = mysqli_query($koneksi, "select * from tb_user where no_telpon_user='$hp' AND password_user='$pw' ");
$jmlh_data = mysqli_num_rows($sql); // num_rows buat ngecek jumlah data

//comment
// jika datanya ada atau lebih dari 0
if($jmlh_data > 0 ){

    $data = mysqli_fetch_array($sql);

    $_SESSION['id'] = $data['id_user']; // isi kurung di $data[] harus sama dengan didatabase karena $data sudah mengambil data pada database
    $_SESSION['username'] = $data['nama_user'];
    $_SESSION['role'] = $data['role_user'];


    // jika berhasil pindah halaman ke index pakai header
    header("location: ../admin/halamanadmin.php");
    
}else{
    // jika gagal tetep di login lagi
    header("location: login.php?error=No Telpon atau Password salah" );
}