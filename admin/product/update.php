<?php 
include "../../koneksi.php";

$produk = mysqli_query($koneksi, "select * from tb_produk");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">
</head>
<body>
    <h1>Produk</h1>
    <table class="table">
        
        <thead class="table-dark">
            <tr>
                <th scope="col">Id Produk</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga</th>
                <th scope="col">Stok</th>
                <th scope="col">Gambar</th>
            </tr>
        </thead>

        <tbody>
        
        <?php while ($dataprdk = mysqli_fetch_array($produk)){ ?>
            <tr>
                <form action="update.php" method="post" enctype="multipart/form-data">
                    <th scope="row"> <input type="hidden" name="id_produk" value="<?php echo $dataprdk['id_produk'] ?>"> <?php echo $dataprdk['id_produk'] ?> </th>
                    <td><input type="text" name="nama_produk" value="<?php echo $dataprdk['nama_produk'] ?>"></td>
                    <td><input type="number" name="harga_produk" value="<?php echo $dataprdk['harga_produk'] ?>"></td>
                    <td><input type="number" name="stok_produk" value="<?php echo $dataprdk['stok_produk'] ?>"></td>
                    <td><input type="file" name="foto_produk" value="<?php echo $gambardobel ?>"></td>
                    <td> <input type="submit" value="Update"> </td>
                </form>
            </tr>
        <?php } ?>

        </tbody>
        
    <?php
    if (isset($_POST['id_produk']) && isset($_POST['nama_produk'])
    && isset($_POST['harga_produk']) && isset($_POST['stok_produk'])) {
        $id_prdk = $_POST['id_produk'];
        $nm_prdk = $_POST['nama_produk'];
        $hrg_prdk = $_POST['harga_produk'];
        $stock_prdk = $_POST['stok_produk'];

        if (isset($_FILES['foto_produk']) && $_FILES['foto_produk']['error'] == 0) {
            $namapoto = $_FILES["foto_produk"]["name"];
            $lokasifoto = $_FILES["foto_produk"]["tmp_name"];
            $target_dir = "../foto/"; 
            
            // Cek apakah file dengan nama yang sama sudah ada di direktori menggunakan $target_dir
            if (file_exists($target_dir . $namapoto)) { 
                // Tambahkan waktu ke nama file jika ada yang sama
                $gambardobel = time() . $namapoto;
            } else { // Gunakan nama asli jika tidak ada yang sama 
                $gambardobel = $namapoto; } 
                
                // Upload file ke direktori tertentu 
                move_uploaded_file($lokasifoto, $target_dir . $gambardobel);
                
            // Update Query with foto_produk
            $update = "UPDATE tb_produk SET nama_produk='$nm_prdk', harga_produk='$hrg_prdk', stok_produk='$stock_prdk', foto_produk='$gambardobel' WHERE id_produk='$id_prdk'"; }
        
            if ($koneksi->query($update) === TRUE) {
            echo "Data produk berhasil diupdate";
            header("Location: tambah.php"); // Kembali ke halaman sebelumnya
            exit();
        }else{
            echo "Data eror" . $koneksi->error;
        }
    }
    ?>

    </table>

</body>
</html>

