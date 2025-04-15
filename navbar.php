<?php
if (isset($_GET["logout"])) {
    echo '<div class="alert alert-success text-center" role="alert">Anda berhasil logout!</div>';
}
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
            background: #a9a9a9;
            ;
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

        .navbar-brand {
            font-size: 3rem;
            font-weight: bold;
        }

        .nav-link {
            font-size: 1rem;
            margin-right: 15px;
        }

        .nav-link.active {
            font-size: 2rem;
            font-weight: bold;
            color: #ee4d2d !important;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Jajan</a>
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="http://localhost/projek_pkk/index.php">Home</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link active" href="http://localhost/projek_pkk/shop.php">Shop</a>
                </li> -->
            </ul>
            <ul class="navbar-nav">
                <?php if (isset($_SESSION['role'])): ?>
                    <li class="nav-item">
                        <span class="nav-link"><?php echo $_SESSION['username']; ?></span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/projek_pkk/login/logout.php" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a>
                    </li>

                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/projek_pkk/login/login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/projek_pkk/daftar/daftar.php">Daftar</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <!-- Modal Konfirmasi Logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body text-center">
                    Apakah Anda yakin ingin keluar?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="http://localhost/projek_pkk/login/logout.php" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12hVt6zHU5gBp3y6iZqv1H1mPFFGvG2zf5Bkz7HY5Pp+0WzC"
        crossorigin="anonymous"></script>
</body>

</html>