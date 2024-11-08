<?php
session_start();
include("koneksi.php");

$query = mysqli_query($koneksi, "select * from tb_produk");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Shop</a>
                    </li>
                    <li class="nav-item">
                        <?php
                        if (isset($_SESSION['role'])) {
                            ?>
                        <li class="nav-item">
                            <?php
                            echo $_SESSION['username']
                                ?>
                            <a href="login/logout.php">Logout</a>

                        <?php } else { ?>

                            <a href="login/login.php">Login</a>

                        <?php } ?>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-5 d-flex gap-5">
        <?php while ($data= mysqli_fetch_array($query)): ?>
        <div class="card" style="width: 18rem;">
            <img src="admin/foto/<?= $data['foto_produk'] ?>" class="card-img-top" alt="..."> <!-- ['foto_produk'] itu sesuai dengan nama kolom di database -->
            <div class="card-body">
                <h5 class="card-title"><?= $data['nama_produk']?></h5> <!-- ['nama_produk'] itu sesuai dengan nama kolom di database -->
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <?php endwhile ?>
    </div>

</body>
kk
</html>