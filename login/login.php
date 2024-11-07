<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>
<body>
    
    <?php
     if(isset($_GET["error"])) //isset untuk mengecek
     echo $_GET["error"]; //
    ?>

    <form action="proseslogin.php" method="post"> 
        <div>
            No Telepon : <input type="integer" name="no_telpon" id=""> <!-- name tidak sama dengan di database-->
        </div>
        <div>
            Password : <input type="password" name="password" id="">
        </div>
        <input type="submit" name="login" value="login">
    </form>
</body>
</html>
<?php
    // autentikasi adalah proses untuk memastikan bahwa pengguna yang masuk sudah terdaftar
    



?>