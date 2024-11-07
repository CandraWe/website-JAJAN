<?php
    session_start();

    //hapus sessionnya
    session_destroy();

    header("location: login.php");
?>