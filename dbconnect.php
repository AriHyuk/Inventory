<?php
$host = 'localhost';
$user = 'root';  // Ubah sesuai dengan user database lokal
$password = '';  // Kosongkan jika user root tidak memiliki password
$dbname = 'inventory';

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>