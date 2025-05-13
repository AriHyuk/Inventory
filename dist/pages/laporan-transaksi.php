<?php
// Memanggil koneksi
include('../../koneksi.php');

$sql = "
    SELECT 
        t.id_transaksi, 
        t.kode_transaksi, 
        t.tanggal_transaksi, 
        t.harga AS total_harga,  
        t.id_barang, 
        b.nama_barang, 
        b.jenis_barang, 
        u.fullname AS user
    FROM 
        tb_transaksi t
    JOIN 
        tb_barang b ON t.id_barang = b.id_barang
    JOIN 
        tb_user u ON t.user_id = u.id
    ORDER BY 
        t.tanggal_transaksi DESC
";



// Menjalankan query
$query = mysqli_query($conn, $sql);

// Mengecek apakah query berhasil
if (!$query) {
    die("Error executing query: " . mysqli_error($conn));
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan Transaksi</h1>
                </div>
                <div class="col-sm-6 d-flex justify-content-sm-end">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Transaksi</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center w-100">
                                <div class="col">
                                    <h3 class="card-title mb-0">Laporan Transaksi</h3>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-dark" data-toggle="modal" data-target="#filterModal">Filter Laporan</button>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Transaksi</th>
                                        <th>Kode Transaksi</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Nama Barang</th>
                                        <th>Jenis Barang</th>
                                        <th>Total Harga</th>
                                        <th>Nama User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($result = mysqli_fetch_array($query)) { ?>
                                        <tr>
                                            <td><?php echo $result['id_transaksi']; ?></td>
                                            <td><?php echo $result['kode_transaksi']; ?></td>
                                            <td><?php echo $result['tanggal_transaksi']; ?></td>
                                            <td><?php echo $result['nama_barang']; ?></td>
                                            <td><?php echo $result['jenis_barang']; ?></td>
                                            <td><?php echo $result['total_harga']; ?></td>
                                            <td><?php echo $result['user']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- Modal Filter Laporan -->
<!-- Modal code here (same as previous) -->
