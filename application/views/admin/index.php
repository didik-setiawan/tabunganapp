<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Selamat Datang <?= $pengguna->nama; ?></h1>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Sisa Saldo</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= number_format($saldo, '2', ',', '.'); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Jumlah Transaksi</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= number_format($transaksi, '2', ',', '.'); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Jumlah Penarikan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= number_format($penarikan, '2', ',', '.'); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Hari Ini</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php date_default_timezone_set('Asia/Jakarta');
                                                                                                echo date('d M Y'); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Jumlah Siswa</td>
                                    <td><?= $this->db->get('tbl_siswa')->num_rows(); ?> Siswa</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Kelas</td>
                                    <td><?= $this->db->get('tbl_kelas')->num_rows(); ?> Kelas</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Admin</td>
                                    <td><?= $this->db->get('tbl_admin')->num_rows(); ?> Admin</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Pengumuman</td>
                                    <td><?= $this->db->get('tbl_pengumuman')->num_rows(); ?> Pengumuman</td>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->