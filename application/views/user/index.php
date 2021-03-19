<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <?php if (empty($transaksi)) : ?>
                <div class="card shadow" style="margin-bottom: 9%;">
                <?php else : ?>
                    <div class="card shadow" style="margin-bottom: 20%;">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5>Selamat Datang <?= $pengguna->nama; ?></h5>
                        <div class="row">
                            <div class="col-lg-4 mt-2">
                                <div class="card border-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs text-uppercase mb-1"><b>Saldo Anda</b></div>
                                                <div class="h5 mb-0 font-weight-bold text-muted">Rp. <?= number_format($pengguna->saldo, '2', ',', '.'); ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-dollar-sign fa-2x text-muted"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 mt-2">
                                <div class="card border-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs text-uppercase mb-1"><b>Hari Ini</b></div>
                                                <div class="h5 mb-0 font-weight-bold text-muted"><?php date_default_timezone_set('Asia/Jakarta');
                                                                                                    echo date('D d M Y'); ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-muted"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 mt-2">
                                <div class="card border-danger shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs text-uppercase mb-1"><b>Pengumuman</b></div>
                                                <div class="h5 mb-0 font-weight-bold text-muted"><?= $this->db->get_where('tbl_pengumuman', ['status' => 1])->num_rows(); ?> Pengumuman</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-bullhorn fa-2x text-muted"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <h5 class="mt-3">Transaksi Terakhir</h5>
                                <?php if (empty($transaksi)) : ?>
                                    <div class="alert alert-success text-center" role="alert">
                                        <p>
                                            Tidak ada data transaksi
                                        </p>
                                        <img src="<?= base_url('asset/img/img.svg'); ?>" width="200px">
                                    </div>
                                <?php else : ?>
                                    <table class="table table-striped table-bordered">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Wakitu</th>
                                                <th>Jumlah</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            date_default_timezone_set('Asia/Jakarta');
                                            foreach ($transaksi as $t) { ?>
                                                <tr>
                                                    <td><?= date('D d M Y', $t->id_transaksi); ?></td>
                                                    <td><?= date('H:i:s', $t->id_transaksi); ?></td>
                                                    <td>Rp. <?= number_format($t->jumlah, '2', ',', '.'); ?></td>
                                                    <td>
                                                        <?php if ($t->status == 0) : ?>
                                                            <p class="text-danger"><i class="fa fa-times"></i> Proses</p>
                                                        <?php else : ?>
                                                            <p class="text-success"><i class="fa fa-check"></i> Selesai</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
        </div>
    </div>