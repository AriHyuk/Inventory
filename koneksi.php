<?php
$host = "localhost";
$db   = "inventory"; // ganti dengan nama database kamu
$user = "root";
$pass = ""; // sesuaikan dengan password MySQL kamu


$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
} // else{
    // echo "Koneksi Berhasil";}
?>