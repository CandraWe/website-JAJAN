<?php
    // koneksi
    include("../../koneksi.php");

    // dapatkan data dari input form
    $nama_pr = $_POST["nm"]; //isi kurung [] harus sama dengan name di input
    $harga_pr = $_POST["hrg"];
    $stok_pr = $_POST["stock"];
    // $id_ktgr = $_POST["idktgri"];

    // nama itu integer jadi bisa pakai echo sedangkan foto tidak bisa pakai echo

    $namapoto = $_FILES["poto"]["name"];
    $lokasifoto = $_FILES["poto"]["tmp_name"];

    $gambardobel = time().$namapoto;

// karena foto itu berbentuk array
// var_dump untuk melihat isi aray

    $query = mysqli_query($koneksi, "insert into tb_produk values( null, '$nama_pr', $harga_pr, $stok_pr, '$gambardobel', '1')" );

    // kalau query berhasil maka akan kembali ke halaman tambah.php
    if($query){

        // pindahkan file foto produk ke folder foto,sesuaikan juga dengan lokasi file
        move_uploaded_file($lokasifoto, "../foto/");
        // move_uploaded_file(); agar file foto bisa masuk ke dalam project

        header("location: tambah.php");
    }
    

    // $_FILES["foto"] itu berasal dari tambah
    // ["name"]; berasal dari array
    // var_dump untuk mengecek isi
    // yang dibutuhkan itu name dan tmp_name / lokasi foto sementara

    // tambahkan 
    // tmp untuk menyimpan foto
    // untuk size ketika ingin membatasi file yang dikirim


