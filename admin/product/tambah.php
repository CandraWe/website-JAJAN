<?php 

// autorisasi terlebih dahulu
    session_start();

    if(!isset($_SESSION['role'])){
        header("location:../../login/login.php");
    }

    if($_SESSION['role'] != "admin")
        header("location:../index.php")
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="prosestambah.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="nama">Nama Produk</label>
            <input type="text" name="nm" id="nama"> <!-- name tidak sama dengan di database-->        
        </div>

        <div>
            <label for="harga">Harga Produk</label>
            <input type="number" name="hrg" id="harga">
        </div>

        <div>
            <label for="stok">Stok Produk</label>
            <input type="number" name="stock" id="stok">
        </div>

        <div>
            <label for="foto">Foto</label> 
            <input type="file" name="poto"> <!-- type nya file karena -->
        </div>

        <input type="submit" value="Simpan">

    </form>
</body>
</html>