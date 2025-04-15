<?php
    $koneksi = mysqli_connect("localhost", "root", "", "projek_pkk");
    
    if (!$koneksi){
        die(mysqli_connect_errno() . "" . mysqli_connect_error());
    }
