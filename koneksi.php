<?php
    $koneksi = mysqli_connect("localhost", "root", "", "projek_website_jajan_candrarpl1");
    
    if (!$koneksi){
        die(mysqli_connect_errno() . "" . mysqli_connect_error());
    }
