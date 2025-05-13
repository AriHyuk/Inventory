<?php
require_once('page_handler.php');
    if ($_GET) {
        // Menggunakan switch untuk menangani query string 'page'
        switch ($_GET['page']) {
            case 'barang-masuk':
                if (!file_exists("barang-masuk.php")) die("Halaman barang masuk tidak ditemukan");
                include "barang-masuk.php";
                break;

            // Form Barang
            case 'form-barang':
                if (!file_exists("form-barang.php")) die("Halaman form barang tidak ditemukan");
                include "form-barang.php";
                break;

            // Barang Keluar
            case 'barang-keluar':
                if (!file_exists("barang-keluar.php")) die("Halaman barang keluar tidak ditemukan");
                include "barang-keluar.php";
                break;

            // Barang Reject
            case 'barang-reject':
                if (!file_exists("barang-reject.php")) die("Halaman barang reject tidak ditemukan");
                include "barang-reject.php";
                break;

            // Barang Expired
            case 'barang-expired':
                if (!file_exists("barang-expired.php")) die("Halaman barang expired tidak ditemukan");
                include "barang-expired.php";
                break;
            // Form Reject
            case 'form-reject':
                if (!file_exists("form-reject.php")) die("Halaman form reject tidak ditemukan");
                include "form-reject.php";
                break;

            // Stok Barang
            case 'stok-barang':
                if (!file_exists("stok-barang.php")) die("Halaman stok barang tidak ditemukan");
                include "stok-barang.php";
                break;

            // Laporan Transaksi
            case 'laporan-transaksi':
                if (!file_exists("laporan-transaksi.php")) die("Halaman laporan transaksi tidak ditemukan");
                include "laporan-transaksi.php";
                break;

            // Data User
            case 'data-user':
                if (!file_exists("data-user.php")) die("Halaman data user tidak ditemukan");
                include "data-user.php";
                break;

            // Jika parameter tidak valid
            default:
                echo "Halaman tidak ditemukan.";
                break;
        }
    } else {
        // Jika tidak ada parameter GET, tampilkan halaman default (misalnya main-page.php)
        if (!file_exists("main-page.php")) die("Halaman main page tidak ditemukan");
        include "main-page.php";
    }
?>
