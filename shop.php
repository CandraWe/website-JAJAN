<?php
session_start();
include("koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JAJAN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <style>
        body {
            background-color: #f9f9f9;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .card {
            width: 18rem;
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .card-img-top {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            height: 200px;
            object-fit: cover;
        }

        .card-title {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
        }

        .card-price {
            font-size: 16px;
            color: #ee4d2d;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #ee4d2d;
            border: none;
            border-radius: 8px;
        }

        .btn-primary:hover {
            background-color: #d43f1d;
        }
    </style>
</head>

<body>

    <?php include("navbar.php"); ?>

    <div class="container mt-5">
        <?php 

        $query = mysqli_query($koneksi, "SELECT * FROM tb_produk");
        while ($data = mysqli_fetch_array($query)): 
        ?>
            <div class="card">
                <img src="admin/foto/<?= $data['foto_produk'] ?>" class="card-img-top" alt="<?= htmlspecialchars($data['nama_produk']) ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($data['nama_produk']) ?></h5>
                    <div class="card-price">Rp <?= number_format($data['harga_produk'], 0, ',', '.') ?></div>
                    <a href="admin/product/detail.php?id_produk=<?= $data['id_produk'] ?>" class="btn btn-primary w-100">Detail</a>
                </div>
            </div>
        <?php endwhile ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12hVt6zHU5gBp3y6iZqv1H1mPFFGvG2zf5Bkz7HY5Pp+0WzC" crossorigin="anonymous"></script>
</body>

</html>
