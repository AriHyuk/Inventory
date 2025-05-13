<?php
include dirname(__DIR__, 2) . '/koneksi.php'; // pastikan path benar

// Ambil data dari form
$id_masuk = $_POST['id_masuk'];
$jenis_barang = $_POST['jenis_barang'];
$tanggal_masuk = $_POST['tanggal_masuk'];
$tgl_exp = isset($_POST['tgl_exp']) ? $_POST['tgl_exp'] : null;
$id_supplier = $_POST['id_supplier'];
$subtotal = $_POST['subtotal'];
$kode_masuk = $_POST['kode_masuk'];
$id_user = $_POST['id_user'];

// Simpan ke database
$sql = "INSERT INTO barang_masuk (id_masuk, jenis_barang, tanggal_masuk, tgl_exp, id_supplier, subtotal, kode_masuk, id_user) 
        VALUES ('$id_masuk', '$jenis_barang', '$tanggal_masuk', '$tgl_exp', '$id_supplier', '$subtotal', '$kode_masuk', '$id_user')";

$query = mysqli_query($conn, $sql);

if ($query) {
    header("Location: ?page=form-barang");
} else {
    echo "Gagal simpan data: " . mysqli_error($conn);
}
?>
