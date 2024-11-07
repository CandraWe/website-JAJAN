<?php 
include "../../koneksi.php";
// autorisasi terlebih dahulu
    session_start();

    if(!isset($_SESSION['role'])){
        header("location:../../login/login.php");
    }

    if($_SESSION['role'] != "admin")
        header("location:../index.php")
    
?>

<?php
    if (isset($_SESSION['role'])) {
?>
    <li class="nav-item">
<?php
    echo $_SESSION['username']
?>
    <a href="../../login/logout.php">Logout</a>
<?php } else { ?>

    <a href="../../login/login.php">Login</a>

    <?php } ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">
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
            <label for="foto">Gambar</label> 
            <input type="file" name="poto"> <!-- type nya file karena -->
        </div>

        <!-- <div>
            <label for="idktg">Id Kategori</label>
            <input type="number" name="idktgri" id="idktg">
        </div> -->

        <input type="submit" value="Simpan">
        
    </form>
    <br>
    
    <?php

$produk = mysqli_query($koneksi, "select * from tb_produk");

?>
    <h1>Produk</h1>
    <table class="table">
        
        <thead class="table-dark">
            <tr>
                <th scope="col">Id Produk</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga</th>
                <th scope="col">Stok</th>
                <th scope="col">Gambar</th>
                <th scope="col">Kategori</th>
            </tr>
        </thead>
    
        <tbody>
        <?php while ($dataprdk = mysqli_fetch_array($produk)){ ?>
        <tr>
            <th scope="row">
                <input type="hidden" name="idprdk" value="<?php echo $dataprdk['id_produk'] ?>">
                <?php echo $dataprdk['id_produk'] ?>
            </th>
            <td> <?php echo $dataprdk['nama_produk']?> </td>
            <td> <?php echo $dataprdk['harga_produk']?> </td>
            <td> <?php echo $dataprdk['stok_produk']?> </td>
            <td> 
                <img src="../foto/<?php echo $dataprdk['foto_produk']; ?>" alt="<?php echo $dataprdk['nama_produk']; ?>"width="100">
                    <br>
                    <?php echo $dataprdk['foto_produk']?> 
            </td>
            <td> <?php echo $dataprdk['id_kategori']?> </td>
            <td> <a href="hapus.php?id_produk=<?php echo $dataprdk["id_produk"]?>"> Hapus </a> </td>
            <td> <a href="update.php"> Update </a> </td>

        </tr>
        
        <input type="submit" value="Simpan">
        

        <?php } ?>
        </tbody>

    </table>

</body>
</html>

