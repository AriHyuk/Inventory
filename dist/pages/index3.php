<!doctype html>
<html lang="en">
<head>
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Check login and role
    if ($_SESSION['email'] == "") {
        header("location: login.php");
        exit;
    }

    $role = $_SESSION['position'];  // User role
    if ($role != "admin" && $role != "owner" && $role != "kasir" && $role != "supplier" && $role != "staff-gudang") {
        header("location: login.php");
        exit;
    }
    ?>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AYUATARI OLSHOP | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AYUATARI OLSHOP | Dashboard" />
    <meta name="author" content="ColorlibHQ" />
    <meta name="description" content="AdminLTE is a Free Bootstrap 5 Admin Dashboard." />
    <meta name="keywords" content="bootstrap 5, admin dashboard" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- DataTables CSS (using CDN) -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="../../dist/css/adminlte.css">
    
    <!-- OverlayScrollbars -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css">
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        <!--begin::Header-->
        <nav class="app-header navbar navbar-expand bg-body">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="bi bi-list"></i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Home</a></li>
                    <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Contact</a></li>
                </ul>
                
                <ul class="navbar-nav ms-auto">
                    <!-- Search, Messages, Notifications, etc. -->
                    <!-- ... (keep your existing header content) ... -->
                </ul>
            </div>
        </nav>
        <!--end::Header-->
        
        <!--begin::Sidebar-->
        <aside>
            <?php
            if (!isset($_SESSION['position'])) {
                header("Location: login.php");
                exit;
            }

            switch ($_SESSION['position']) {
                case "admin":
                    include "menu-admin.php";
                    break;
                case "owner":
                    include "menu-owner.php";
                    break;
                case "kasir":
                    include "menu-kasir.php";
                    break;
                case "staff-gudang":
                    include "menu-staffgudang.php";
                    break;
                case "supplier":
                    include "menu-supplier.php";
                    break;
                default:
                    echo "Akses tidak dikenali";
                    exit;
            }
            ?>
        </aside>
        <!--end::Sidebar-->
        
        <!--begin::App Main-->
        <?php include "halaman.php"; ?>
        <!--end::App Main-->
        
        <!--begin::Footer-->
        <footer class="app-footer">
            <div class="float-end d-none d-sm-inline">Anything you want</div>
            <strong>
                Copyright &copy; 2014-2024&nbsp;
                <a href="" class="text-decoration-none">AYUATARI OLSHOP</a>.
            </strong>
            All rights reserved.
        </footer>
        <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->

    <!-- JavaScript Libraries -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- OverlayScrollbars -->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"></script>
    
    <!-- AdminLTE -->
    <script src="../../dist/js/adminlte.js"></script>
    
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    
    <!-- Initialize OverlayScrollbars -->
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
        const Default = {
            scrollbarTheme: 'os-theme-light',
            scrollbarAutoHide: 'leave',
            scrollbarClickScroll: true,
        };
        
        document.addEventListener('DOMContentLoaded', function () {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
            
            // Initialize DataTables if needed
            if ($.fn.DataTable) {
                $('.datatable').DataTable();
            }
        });
    </script>
    
</body>
</html>