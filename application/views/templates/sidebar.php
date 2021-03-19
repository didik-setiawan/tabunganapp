    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #7826ab;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
                <div class="sidebar-brand-icon">
                    <img src="<?= base_url('asset/img/logo.png'); ?>" width="30px">
                </div>
                <div class="sidebar-brand-text mx-3">App Tabungan</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Admin
            </div>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('masterdata/siswa'); ?>">
                    <i class="fa fa-fw fa-user"></i>
                    <span>Siswa</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('masterdata/kelas'); ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Kelas</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('masterdata/transaksi'); ?>">
                    <i class="far fa-fw fa-money-bill-alt"></i>
                    <span>Transaksi</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('masterdata/penarikan'); ?>">
                    <i class="fas fa-fw fa-money-check-alt"></i>
                    <span>Penarikan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('masterdata/pengumuman'); ?>">
                    <i class="fas fa-fw fa-bullhorn"></i>
                    <span>Pengumuman</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/edit_profile'); ?>">
                    <i class="fas fa-fw fa-user-cog"></i>
                    <span>Edit Profil</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->