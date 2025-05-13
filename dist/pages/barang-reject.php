<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DataTables</h1>
                </div>
                <div class="col-sm-6 d-flex justify-content-sm-end">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Barang Reject</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
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
                                    <h3 class="card-title mb-0">Data Barang Reject</h3>
                                </div>
                                <div class="col-auto">
                                    <a href="?page=form-reject" class="btn btn-dark">Tambah</a>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Reject</th>
                                        <th>ID Barang</th>
                                        <th>ID Supplier</th>
                                        <th>Tanggal Cek</th>
                                        <th>Jumlah Reject</th>
                                        <th>Alasan Reject</th>
                                        <th>Keterangan</th>
                                        <th>ID User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Memanggil koneksi
                                    include('../../koneksi.php');

                                    // Query untuk mengambil data barang reject
                                    $sql = "SELECT * FROM tb_barang_reject";
                                    $query = mysqli_query($conn, $sql);

                                    // Memeriksa jika query gagal
                                    if (!$query) {
                                        die("Query error: " . mysqli_error($conn));
                                    }

                                    // Menampilkan data barang reject
                                    while ($result = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $result['id_reject']; ?></td>
                                            <td><?php echo $result['id_barang']; ?></td>
                                            <td><?php echo $result['id_supplier']; ?></td>
                                            <td><?php echo $result['tanggal_cek']; ?></td>
                                            <td><?php echo $result['jumlah_reject']; ?></td>
                                            <td><?php echo $result['alasan_reject']; ?></td>
                                            <td><?php echo $result['keterangan']; ?></td>
                                            <td><?php echo $result['id_user']; ?></td>
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

<!-- DataTables Buttons CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

<!-- DataTables Buttons JS dan dependencies -->
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
    // Cek jika DataTable sudah diinisialisasi untuk #example1
    if ($.fn.DataTable.isDataTable('#example1')) {
      $('#example1').DataTable().clear().destroy();
    }

    // Inisialisasi DataTable untuk #example1 dengan tombol export
    var table1 = $('#example1').DataTable({
      responsive: true,
      lengthChange: false,
      autoWidth: false,
      dom: 'Bfrtip', // Menambahkan elemen tombol ke dalam layout
      buttons: [
        {
          extend: 'copy',
          className: 'btn btn-secondary buttons-copy'
        },
        {
          extend: 'csv',
          className: 'btn btn-secondary buttons-csv'
        },
        {
          extend: 'excel',
          className: 'btn btn-secondary buttons-excel'
        },
        {
          extend: 'pdf',
          className: 'btn btn-secondary buttons-pdf'
        },
        {
          extend: 'print',
          className: 'btn btn-secondary buttons-print'
        },
        {
          extend: 'colvis',
          className: 'btn btn-secondary buttons-colvis'
        }
      ]
    });

    // Menambahkan tombol export ke dalam container yang tepat
    table1.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
