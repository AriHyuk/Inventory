<?php
$host = 'localhost';
$user = 'root';
$password = '';  // Kosongkan jika root tidak memiliki password
$dbname = 'inventory';

$conn = mysqli_connect($host, $user, $password, $dbname);

if ($conn) {
    echo "Koneksi berhasil!";
} else {
    echo "Koneksi gagal: " . mysqli_connect_error();
}
?>