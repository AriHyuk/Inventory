<?php
// Memanggil koneksi
include('../../koneksi.php');

// Menangani proses tambah stok
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_stock'])) {
    // Ambil data dari form
    $id_barang = $_POST['id_barang'];
    $stok_tambah = $_POST['stok_tambah'];
    $id_user = $_POST['id_user'];

    // Query untuk menambah stok barang
    $sql = "UPDATE tb_barang SET stok = stok + $stok_tambah WHERE id_barang = $id_barang";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Stok berhasil ditambah'); window.location.reload();</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}

// Menangani proses edit stok
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_stock'])) {
    // Ambil data dari form
    $id_barang = $_POST['id_barang'];
    $stok_ubah = $_POST['stok_ubah'];

    // Query untuk mengubah stok barang
    $sql = "UPDATE tb_barang SET stok = $stok_ubah WHERE id_barang = $id_barang";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Stok berhasil diubah'); window.location.reload();</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}

// Query untuk menampilkan semua barang dan stok
$sql = "SELECT * FROM tb_barang";
$query = mysqli_query($conn, $sql);
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Tables</h1>
                </div>
                <div class="col-sm-6 d-flex justify-content-sm-end">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Stok Barang</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center w-100">
                                <div class="col">
                                    <h3 class="card-title mb-0">Data Stok Barang</h3>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-dark" data-toggle="modal" data-target="#addModal">Tambah Stok</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jenis Barang</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($result = mysqli_fetch_array($query)) { ?>
                                        <tr>
                                            <td><?php echo $result['id_barang']; ?></td>
                                            <td><?php echo $result['nama_barang']; ?></td>
                                            <td><?php echo $result['jenis_barang']; ?></td>
                                            <td><?php echo $result['harga']; ?></td>
                                            <td><?php echo $result['stok']; ?></td>
                                            <td>
                                                <!-- Tombol Edit Stok -->
                                                <button class="btn btn-warning" data-toggle="modal" data-target="#editModal" data-id="<?php echo $result['id_barang']; ?>" data-stok="<?php echo $result['stok']; ?>">Edit Stok</button>
                                                <!-- Tombol Tambah Stok -->
                                                <button class="btn btn-success" data-toggle="modal" data-target="#addStockModal" data-id="<?php echo $result['id_barang']; ?>">Tambah Stok</button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal Tambah Stok -->
<div class="modal fade" id="addStockModal" tabindex="-1" role="dialog" aria-labelledby="addStockModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addStockModalLabel">Tambah Stok Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <input type="hidden" id="id_barang" name="id_barang">
                    <div class="form-group">
                        <label for="stok_tambah">Jumlah Stok yang Ditambah</label>
                        <input type="number" class="form-control" id="stok_tambah" name="stok_tambah" required>
                    </div>
                    <div class="form-group">
                        <label for="id_user">ID User</label>
                        <input type="number" class="form-control" id="id_user" name="id_user" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="add_stock" class="btn btn-primary">Tambah Stok</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Stok -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Stok Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <input type="hidden" id="id_barang_edit" name="id_barang">
                    <div class="form-group">
                        <label for="stok_ubah">Jumlah Stok</label>
                        <input type="number" class="form-control" id="stok_ubah" name="stok_ubah" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="edit_stock" class="btn btn-primary">Ubah Stok</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Tambahkan jQuery & Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script>
    $(document).ready(function () {
        // Setup untuk modal tambah stok
        $('#addStockModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); 
            var id_barang = button.data('id'); 
            var modal = $(this);
            modal.find('#id_barang').val(id_barang);
        });

        // Setup untuk modal edit stok
        $('#editModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); 
            var id_barang = button.data('id'); 
            var stok = button.data('stok'); 
            var modal = $(this);
            modal.find('#id_barang_edit').val(id_barang);
            modal.find('#stok_ubah').val(stok);
        });
    });

</script>
