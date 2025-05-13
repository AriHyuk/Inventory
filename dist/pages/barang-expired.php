<?php
// Memanggil koneksi
include('../../koneksi.php');

// Menangani data expired barang
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $id_barang = $_POST['id_barang'];
    $tanggal_expired = $_POST['tanggal_expired'];
    $jumlah = $_POST['jumlah'];
    $keterangan = $_POST['keterangan'];
    $id_user = $_POST['id_user'];

    // Query untuk menyimpan data expired barang
    $sql = "INSERT INTO barang_expired (id_barang, tanggal_expired, jumlah, keterangan, id_user)
            VALUES ('$id_barang', '$tanggal_expired', '$jumlah', '$keterangan', '$id_user')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Data berhasil disimpan');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}

// Query untuk menampilkan data expired barang
$sql = "SELECT * FROM barang_expired";
$query = mysqli_query($conn, $sql);
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Barang Expired</h1>
                </div>
                <div class="col-sm-6 d-flex justify-content-sm-end">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Barang Expired</li>
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
                                    <h3 class="card-title mb-0">Data Barang Expired</h3>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-dark" data-toggle="modal" data-target="#addModal">Tambah</button>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Expired</th>
                                        <th>Nama Barang</th>
                                        <th>Tanggal Expired</th>
                                        <th>Jumlah</th>
                                        <th>Keterangan</th>
                                        <th>ID User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($result = mysqli_fetch_array($query)) { ?>
                                        <tr>
                                            <td><?php echo $result['id_expired']; ?></td>
                                            <td>
                                                <?php 
                                                    // Menampilkan nama barang dari tabel tb_barang
                                                    $id_barang = $result['id_barang'];
                                                    $sql_barang = "SELECT nama_barang FROM tb_barang WHERE id_barang = $id_barang";
                                                    $query_barang = mysqli_query($conn, $sql_barang);
                                                    $barang = mysqli_fetch_array($query_barang);
                                                    echo $barang['nama_barang']; 
                                                ?>
                                            </td>
                                            <td><?php echo $result['tanggal_expired']; ?></td>
                                            <td><?php echo $result['jumlah']; ?></td>
                                            <td><?php echo $result['keterangan']; ?></td>
                                            <td>
                                                <?php 
                                                    // Menampilkan nama user dari tabel tb_user
                                                    $id_user = $result['id_user'];
                                                    $sql_user = "SELECT fullname FROM tb_user WHERE id = $id_user";
                                                    $query_user = mysqli_query($conn, $sql_user);
                                                    $user = mysqli_fetch_array($query_user);
                                                    echo $user['fullname']; 
                                                ?>
                                            </td>
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

<!-- Modal Tambah Barang Expired -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Barang Expired</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_barang">ID Barang</label>
                        <input type="number" class="form-control" id="id_barang" name="id_barang" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_expired">Tanggal Expired</label>
                        <input type="date" class="form-control" id="tanggal_expired" name="tanggal_expired" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="id_user">ID User</label>
                        <input type="number" class="form-control" id="id_user" name="id_user" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- DataTables Buttons CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>

<script src="/inventory/plugins/jquery/jquery.min.js"></script>
<script src="/inventory/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/inventory/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/inventory/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/inventory/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/inventory/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/inventory/plugins/jszip/jszip.min.js"></script>
<script src="/inventory/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/inventory/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/inventory/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/inventory/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/inventory/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
    $(document).ready(function () {
        var table1 = $('#example1').DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
            ]
        });

        table1.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
