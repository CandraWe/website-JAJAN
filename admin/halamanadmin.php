<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// session buat halaman yang memerlukan hak akses seperti keranjang pembayaran
    session_start();

    // ngecek udah login atau belum
    if(!isset($_SESSION['role'])){ // ! artinya 
        header("location:../login/login.php");
    }

    // jika dia bukan admin, maka dia tidak boleh masuk kode nya akan sampai die sajah
    if($_SESSION['role'] != "admin"){ // != artinya jika bukan
        header("location:../index.php");
        // echo "405 Anda bukan Admin";
        // die(); // agar kode yang dibawah tidak terlaksanakan tapi hanya sampai die sajah
    }else{
        header("location:product/tambah.php");
    }

?>
    <!-- <a href="product/tambah.php">Tambah Produk</a>
    <a href="product/hapus.php">Hapus produk</a>
    <a href="">Update produk</a> -->
</body>
</html>