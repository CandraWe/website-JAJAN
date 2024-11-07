<?php
include "../../koneksi.php";
session_start();

$id = $_GET['id_produk'];
// karena pakai get maka harus sesuai dengan url nya 
// hapus.php?idproduk
// sesudah hapus.php? itu idproduk nya harus sesuai dengan isi di ['']
// contoh hapus.php?idproduk maka $_GET['idproduk'];

mysqli_query($koneksi,"DELETE FROM `tb_produk` WHERE id_produk=$id");
header("Location: tambah.php");