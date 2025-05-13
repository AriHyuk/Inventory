<?php
// Memanggil koneksi database
include('../../koneksi.php');

// Proses simpan data jika form disubmit
if (isset($_POST['submit'])) {
    $id_barang     = $_POST['id_barang'];
    $id_supplier   = $_POST['id_supplier'];
    $tanggal_cek   = $_POST['tanggal_cek'];
    $jumlah_reject = $_POST['jumlah_reject'];
    $alasan_reject = $_POST['alasan_reject'];
    $keterangan    = $_POST['keterangan'];
    $id_user       = $_POST['id_user'];

    $query = "INSERT INTO tb_barang_reject (id_barang, id_supplier, tanggal_cek, jumlah_reject, alasan_reject, keterangan, id_user)
              VALUES ('$id_barang', '$id_supplier', '$tanggal_cek', '$jumlah_reject', '$alasan_reject', '$keterangan', '$id_user')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Data berhasil disimpan'); window.location.href='?page=barang-reject';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data');</script>";
    }
}
?>

<!-- Form Tambah Barang Reject -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1>Tambah Data Barang Reject</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Form Input Barang Reject</h3>
                </div>

                <form method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label>ID Barang</label>
                            <input type="text" name="id_barang" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>ID Supplier</label>
                            <input type="text" name="id_supplier" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Cek</label>
                            <input type="date" name="tanggal_cek" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Reject</label>
                            <input type="number" name="jumlah_reject" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Alasan Reject</label>
                            <input type="text" name="alasan_reject" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea name="keterangan" class="form-control" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <label>ID User</label>
                            <input type="text" name="id_user" class="form-control" required>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-dark">Simpan</button>
                        <a href="?page=barang-reject" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
