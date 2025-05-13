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
              <li class="breadcrumb-item active">DataTables</li>
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
                    <h3 class="card-title mb-0">DATA TABLES BARANG KELUAR</h3>
                  </div>
                  <div class="col-auto">
                    <a href="?page=form-barang" class="btn btn-dark">Tambah</a>
                  </div>
                </div>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>KODE KELUAR</th>
                    <th>TANGGAL KELUAR</th>
                    <th>SUBTOTAL</th>
                    <th>ID BARANG</th>
                    <th>ID USER</th>
                  </tr>
                  </thead>
                  <tbody>

                  

                    <?php
                    include('../../koneksi.php');
                    // Query untuk mengambil data dari tabel barang_keluar
                    $sql = "SELECT * FROM barang_keluar";
                    $query = mysqli_query($conn, $sql);

                    // Cek kalau query gagal
                    if (!$query) {
                        die("Query error: " . mysqli_error($conn));
                    }

                    // Cek kalau data kosong
                    if (mysqli_num_rows($query) == 0) {
                        echo "<tr><td colspan='5'>Data masih kosong.</td></tr>";
                    }

                    // Loop untuk menampilkan data
                    while ($result = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                      <td><?php echo $result['kode_keluar']; ?></td>
                      <td><?php echo $result['tanggal_keluar']; ?></td>
                      <td><?php echo $result['subtotal']; ?></td>
                      <td><?php echo $result['id_barang']; ?></td>
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

