<?php

// session buat halaman yang memerlukan hak akses seperti keranjang pembayaran
    session_start();

    // ngecek udah login atau belum
    if(!isset($_SESSION['role'])){ // ! artinya 
        header("location:../login/login.php");
    }

    // jika dia bukan admin, maka dia tidak boleh masuk kode nya akan sampai die sajah
    if($_SESSION['role'] != "admin"){ // != artinya jika bukan
        echo "405 Anda bukan Admin wlee";
        die(); // agar kode yang dibawah tidak terlaksanakan tapi hanya sampai die sajah
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
        if(isset($_SESSION['role'])){
            echo $_SESSION['username']
    ?>

        <a href="../login/logout.php">Logout</a>

    <?php }else{ ?>

        <a href="../login/login.php">Login</a>

    <?php } ?>

<br>

<?php

    echo "id user :" . $_SESSION['id'] . '<br/>';
    echo "nama user :" . $_SESSION['username'] . '<br/>';
    echo "role :" . $_SESSION['role'] . '<br/>';
    
?>

</body>
</html>
