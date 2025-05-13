<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <a href="./index.html" class="brand-link">
            <img src="../../dist/assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow" />
            <span class="brand-text fw-light">AYUATARI OLSHOP</span>
        </a>
    </div>
    <!--end::Sidebar Brand-->
    
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <!--begin::Sidebar Menu-->
        <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
            
            <!-- Dashboard -->
            <li class="nav-item">
                <a href="dashboard-admin.php" class="nav-link">
                    <i class="nav-icon bi bi-speedometer2"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            
            <!-- Manajemen Barang -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-box-seam"></i>
                    <p>
                        Manajemen Barang
                        <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="?page=barang-masuk" class="nav-link">
                            <i class="nav-icon bi bi-box-arrow-in-down"></i>
                            <p>Barang Masuk</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?page=barang-keluar" class="nav-link">
                            <i class="nav-icon bi bi-box-arrow-up"></i>
                            <p>Barang Keluar</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?page=barang-reject" class="nav-link">
                            <i class="nav-icon bi bi-exclamation-octagon"></i>
                            <p>Barang Reject</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?page=barang-expired" class="nav-link">
                            <i class="nav-icon bi bi-calendar-x"></i>
                            <p>Barang Expired</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?page=stok-barang" class="nav-link">
                            <i class="nav-icon bi bi-clipboard2-data"></i>
                            <p>Stok Barang</p>
                        </a>
                    </li>
                </ul>
            </li>
            
            <!-- Laporan -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-file-earmark-text"></i>
                    <p>
                        Laporan
                        <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="?page=laporan-transaksi" class="nav-link">
                            <i class="nav-icon bi bi-receipt"></i>
                            <p>Laporan Transaksi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?page=laporan-stok" class="nav-link">
                            <i class="nav-icon bi bi-clipboard2-check"></i>
                            <p>Laporan Stok Barang</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?page=laporan-masuk" class="nav-link">
                            <i class="nav-icon bi bi-box-arrow-in-down"></i>
                            <p>Laporan Barang Masuk</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?page=laporan-keluar" class="nav-link">
                            <i class="nav-icon bi bi-box-arrow-up"></i>
                            <p>Laporan Barang Keluar</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?page=laporan-reject" class="nav-link">
                            <i class="nav-icon bi bi-exclamation-octagon"></i>
                            <p>Laporan Barang Reject</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?page=laporan-expired" class="nav-link">
                            <i class="nav-icon bi bi-calendar-x"></i>
                            <p>Laporan Barang Expired</p>
                        </a>
                    </li>
                </ul>
            </li>
            
            <!-- User Management -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-people"></i>
                    <p>
                        User Management
                        <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="?page=data-user" class="nav-link">
                            <i class="nav-icon bi bi-person-lines-fill"></i>
                            <p>Data User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?page=tambah-user" class="nav-link">
                            <i class="nav-icon bi bi-person-plus"></i>
                            <p>Tambah User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?page=hak-akses" class="nav-link">
                            <i class="nav-icon bi bi-shield-lock"></i>
                            <p>Hak Akses</p>
                        </a>
                    </li>
                </ul>
            </li>
            
            <!-- Single Menu Items -->
            <li class="nav-item">
                <a href="?page=supplier" class="nav-link">
                    <i class="nav-icon bi bi-truck"></i>
                    <p>Supplier</p>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="?page=transaksi" class="nav-link">
                    <i class="nav-icon bi bi-cash-stack"></i>
                    <p>Transaksi</p>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="?page=pengaturan" class="nav-link">
                    <i class="nav-icon bi bi-gear"></i>
                    <p>Pengaturan</p>
                </a>
            </li>
            
            <!-- Logout -->
            <li class="nav-item">
                <a href="/inventory/logout.php" class="nav-link">
                    <i class="nav-icon bi bi-box-arrow-right"></i>
                    <p>Logout</p>
                </a>
            </li>
        </ul>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>