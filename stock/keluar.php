<!doctype html>
<html class="no-js" lang="en">

<?php 
    include '../dbconnect.php';
    include 'cek.php';

    if(isset($_POST['update'])){
        $id = $_POST['id']; //iddata
        $idx = $_POST['idx']; //idbarang
        $jumlah = $_POST['jumlah'];
        $penerima = $_POST['penerima'];
        $keterangan = $_POST['keterangan'];
        $tanggal = $_POST['tanggal'];

        $lihatstock = mysqli_query($conn,"select * from sstock_brg where idx='$idx'"); //lihat stock barang itu saat ini
        $stocknya = mysqli_fetch_array($lihatstock); //ambil datanya
        $stockskrg = $stocknya['stock'];//jumlah stocknya skrg

        $lihatdataskrg = mysqli_query($conn,"select * from sbrg_keluar where id='$id'"); //lihat qty saat ini
        $preqtyskrg = mysqli_fetch_array($lihatdataskrg); 
        $qtyskrg = $preqtyskrg['jumlah'];//jumlah skrg

        if($jumlah >= $qtyskrg){
            //ternyata inputan baru lebih besar jumlah keluarnya, maka kurangi lagi stock barang
            $hitungselisih = $jumlah-$qtyskrg;
            $kurangistock = $stockskrg-$hitungselisih;

            $queryx = mysqli_query($conn,"update sstock_brg set stock='$kurangistock' where idx='$idx'");
            $updatedata1 = mysqli_query($conn,"update sbrg_keluar set tgl='$tanggal',jumlah='$jumlah',penerima='$penerima',keterangan='$keterangan' where id='$id'");
            
            //cek apakah berhasil
            if ($updatedata1 && $queryx){
                echo " <div class='alert alert-success'>
                    <strong>Success!</strong> Redirecting you back in 1 seconds.
                </div>
                <meta http-equiv='refresh' content='1; url= keluar.php'/>  ";
            } else {
                echo "<div class='alert alert-warning'>
                    <strong>Failed!</strong> Redirecting you back in 3 seconds.
                </div>
                <meta http-equiv='refresh' content='3; url= keluar.php'/> ";
            }
        } else {
            //ternyata inputan baru lebih kecil jumlah keluarnya, maka tambahi lagi stock barang
            $hitungselisih = $qtyskrg-$jumlah;
            $tambahistock = $stockskrg+$hitungselisih;

            $query1 = mysqli_query($conn,"update sstock_brg set stock='$tambahistock' where idx='$idx'");
            $updatedata = mysqli_query($conn,"update sbrg_keluar set tgl='$tanggal', jumlah='$jumlah', penerima='$penerima', keterangan='$keterangan' where id='$id'");
            
            //cek apakah berhasil
            if ($query1 && $updatedata){
                echo " <div class='alert alert-success'>
                    <strong>Success!</strong> Redirecting you back in 1 seconds.
                </div>
                <meta http-equiv='refresh' content='1; url= keluar.php'/>  ";
            } else {
                echo "<div class='alert alert-warning'>
                    <strong>Failed!</strong> Redirecting you back in 3 seconds.
                </div>
                <meta http-equiv='refresh' content='3; url= keluar.php'/> ";
            }
        }
    }

    if(isset($_POST['hapus'])){
        $id = $_POST['id'];
        $idx = $_POST['idx'];

        $lihatstock = mysqli_query($conn,"select * from sstock_brg where idx='$idx'"); //lihat stock barang itu saat ini
        $stocknya = mysqli_fetch_array($lihatstock); //ambil datanya
        $stockskrg = $stocknya['stock'];//jumlah stocknya skrg

        $lihatdataskrg = mysqli_query($conn,"select * from sbrg_keluar where id='$id'"); //lihat qty saat ini
        $preqtyskrg = mysqli_fetch_array($lihatdataskrg); 
        $qtyskrg = $preqtyskrg['jumlah'];//jumlah skrg

        $adjuststock = $stockskrg+$qtyskrg;

        $queryx = mysqli_query($conn,"update sstock_brg set stock='$adjuststock' where idx='$idx'");
        $del = mysqli_query($conn,"delete from sbrg_keluar where id='$id'");

        //cek apakah berhasil
        if ($queryx && $del){
            echo " <div class='alert alert-success'>
                <strong>Success!</strong> Redirecting you back in 1 seconds.
              </div>
            <meta http-equiv='refresh' content='1; url= keluar.php'/>  ";
        } else {
            echo "<div class='alert alert-warning'>
                <strong>Failed!</strong> Redirecting you back in 1 seconds.
              </div>
             <meta http-equiv='refresh' content='1; url= keluar.php'/> ";
        }
    }
?>

<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="../favicon.png">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Logistics</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/themify-icons.css">
  <link rel="stylesheet" href="assets/css/metisMenu.css">
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/css/slicknav.min.css">
  <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
  <link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
  <script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());
  gtag('config', 'UA-144808195-1');
  </script>
  <link rel="stylesheet" href="assets/css/typography.css">
  <link rel="stylesheet" href="assets/css/default-css.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="assets/css/responsive.css">
  <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
  <div id="preloader">
    <div class="loader"></div>
  </div>
  <div class="page-container">
    <div class="sidebar-menu">
      <div class="sidebar-header">
        <a href="menu.php"><img src="../image/logo.jpg" alt="logo" width="100%"></a>
      </div>
      <div class="main-menu">
        <div class="menu-inner">
          <nav>
            <ul class="metismenu" id="menu">
              <li class="active">
                <a href="index.php"><i class="ti-dashboard"></i><span>Dashboard</span></a>
              </li>
              <li>
                <a href="stock.php"><i class="ti-archive"></i><span>Stock Barang</span></a>
              </li>
              <li>
                <a href="masuk.php"><i class="ti-download"></i><span>Barang Masuk</span></a>
              </li>
              <li>
                <a href="keluar.php"><i class="ti-upload"></i><span>Barang Keluar</span></a>
              </li>
              <li>
                <a href="../logout.php"><i class="ti-power-off"></i><span>Logout</span></a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <div class="main-content">
      <div class="header-area">
        <div class="row align-items-center">
          <div class="col-md-6 col-sm-8 clearfix">
            <div class="search-box pull-left">
              <form action="#">
                <input type="text" name="search" placeholder="Search..." required>
                <i class="ti-search"></i>
              </form>
            </div>
          </div>
          <div class="col-md-6 col-sm-4 clearfix">
            <ul class="notification-area pull-right">
              <li id="full-view"><i class="ti-fullscreen"></i></li>
              <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="main-content-inner">
        <div class="row">
          <div class="col-12 mt-5">
            <div class="card">
              <div class="card-body">
                <div class="d-sm-flex justify-content-between align-items-center">
                  <h4 class="header-title mb-0">Barang Keluar</h4>
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambahbrgkeluar">Tambah
                    Barang Keluar</button>
                </div>
                <div class="data-tables datatable-dark">
                  <table id="dataTable3" class="display" style="width:100%">
                    <thead class="thead-dark">
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Penerima</th>
                        <th>Keterangan</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                                                $brgs=mysqli_query($conn,"SELECT * from sbrg_keluar sb, sstock_brg st where st.idx=sb.idx order by sb.id DESC");
                                                $no=1;
                                                while($p=mysqli_fetch_array($brgs)){
                                                    $idb = $p['id'];
                                            ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo date("d-M-Y", strtotime($p['tgl'])) ?></td>
                        <td><?php echo $p['nama'] ?></td>
                        <td><?php echo $p['jumlah'] ?></td>
                        <td><?php echo $p['penerima'] ?></td>
                        <td><?php echo $p['keterangan'] ?></td>
                        <td>
                          <button data-toggle="modal" data-target="#edit<?php echo $idb ?>"
                            class="btn btn-warning">Edit</button>
                          <button data-toggle="modal" data-target="#del<?php echo $idb ?>"
                            class="btn btn-danger">Del</button>
                        </td>
                      </tr>
                      <div class="modal fade" id="edit<?php echo $idb ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Edit Barang Keluar</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form method="post">
                              <div class="modal-body">
                                Tanggal
                                <input type="date" name="tanggal" class="form-control" value="<?php echo $p['tgl'] ?>"
                                  required>
                                Jumlah
                                <input type="number" name="jumlah" class="form-control"
                                  value="<?php echo $p['jumlah'] ?>" required>
                                Penerima
                                <input type="text" name="penerima" class="form-control"
                                  value="<?php echo $p['penerima'] ?>" required>
                                Keterangan
                                <input type="text" name="keterangan" class="form-control"
                                  value="<?php echo $p['keterangan'] ?>" required>
                                <input type="hidden" name="id" value="<?php echo $idb ?>">
                                <input type="hidden" name="idx" value="<?php echo $p['idx'] ?>">
                                <button type="submit" class="btn btn-primary" name="update">Submit</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="modal fade" id="del<?php echo $idb ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Hapus Barang <?php echo $p['nama'] ?> - <?php echo $p['jumlah'] ?>
                              </h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form method="post">
                              <div class="modal-body">
                                Apakah Anda yakin ingin menghapus barang ini dari daftar barang keluar?
                                <input type="hidden" name="id" value="<?php echo $idb ?>">
                                <input type="hidden" name="idx" value="<?php echo $p['idx'] ?>">
                                <br>
                                <br>
                                <button type="submit" class="btn btn-danger" name="hapus">Hapus</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <?php 
                                                }
                                            ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="tambahbrgkeluar">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Tambah Barang Keluar</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <form method="post">
                <div class="modal-body">
                  Tanggal
                  <input type="date" name="tanggal" class="form-control" required>
                  Barang
                  <select name="barang" class="form-control">
                    <?php 
                                            $brg = mysqli_query($conn,"select * from sstock_brg order by nama ASC");
                                            while($b=mysqli_fetch_array($brg)){
                                        ?>
                    <option value="<?php echo $b['idx'] ?>"><?php echo $b['nama'] ?></option>
                    <?php 
                                            }
                                        ?>
                  </select>
                  Jumlah
                  <input type="number" name="jumlah" class="form-control" required>
                  Penerima
                  <input type="text" name="penerima" class="form-control" required>
                  Keterangan
                  <input type="text" name="keterangan" class="form-control" required>
                  <button type="submit" class="btn btn-primary" name="addnew">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <footer>
        <div class="footer-area">
          <P><span style="font-family: Times New Roman, sans-serif;">© Arief Wardana 2024. </p>
        </div>
      </footer>
    </div>
  </div>
  <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="assets/js/metisMenu.min.js"></script>
  <script src="assets/js/jquery.slimscroll.min.js"></script>
  <script src="assets/js/jquery.slicknav.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
  <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/buttons

/1.5.6/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
  <script src="assets/js/plugins.js"></script>
  <script src="assets/js/scripts.js"></script>
</body>

</html>