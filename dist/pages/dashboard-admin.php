<?php
// Koneksi database
include('htdocs/inventory/koneksi.php');

// Ambil data untuk Dashboard
$totalBarang = mysqli_query($conn, "SELECT COUNT(*) FROM barang");
$barangMasukKeluar = mysqli_query($conn, "SELECT SUM(jumlah) AS masuk, SUM(jumlah) AS keluar FROM transaksi WHERE DATE(tanggal) = CURDATE()");
$jumlahTransaksi = mysqli_query($conn, "SELECT COUNT(*) FROM transaksi WHERE DATE(tanggal) = CURDATE()");
$stokHampirHabis = mysqli_query($conn, "SELECT * FROM barang WHERE stok < 10");
?>

<h1>Dashboard</h1>
<div class="dashboard-summary">
    <div class="summary-item">
        <h3>Total Barang</h3>
        <p><?= mysqli_fetch_row($totalBarang)[0]; ?></p>
    </div>
    <div class="summary-item">
        <h3>Barang Masuk & Keluar Hari Ini</h3>
        <p><?= mysqli_fetch_row($barangMasukKeluar)['masuk']; ?> Masuk, <?= mysqli_fetch_row($barangMasukKeluar)['keluar']; ?> Keluar</p>
    </div>
    <div class="summary-item">
        <h3>Jumlah Transaksi</h3>
        <p><?= mysqli_fetch_row($jumlahTransaksi)[0]; ?></p>
    </div>
    <div class="summary-item">
        <h3>Stok Hampir Habis</h3>
        <ul>
            <?php while ($row = mysqli_fetch_assoc($stokHampirHabis)): ?>
                <li><?= $row['nama_barang']; ?></li>
            <?php endwhile; ?>
        </ul>
    </div>
</div>
