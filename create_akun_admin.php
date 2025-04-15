<?php
include 'koneksi.php'; // pastikan file koneksi database sudah benar

$username = "admin";
$email = "admin@gmail.com";
$password = "admin123"; // password asli
$hashed_password = password_hash($password, PASSWORD_DEFAULT); // hashing password

// Query untuk memasukkan akun admin
$query = "INSERT INTO tb_user (nama_user,email_user, password_user, role_user) VALUES ('$username', '$email', '$hashed_password', 'admin')";

if (mysqli_query($koneksi, $query)) {
    echo "Akun admin berhasil dibuat!";
} else {
    echo "Gagal membuat akun admin: " . mysqli_error($koneksi);
}
?>
