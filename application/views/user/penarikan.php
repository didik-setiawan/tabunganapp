<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow" style="margin-bottom: 30%;">
                <div class="card-body">

                    <h4>Histori Penarikan</h4>
                    <hr>
                    <?php if (empty($penarikan)) : ?>
                        <div class="alert alert-success text-center" role="alert">
                            <p>
                                Tidak ada data penarikan
                            </p>
                            <img src="<?= base_url('asset/img/img.svg'); ?>" width="200px">
                        </div>
                    <?php else : ?>
                        <table class="table table-bordered" id="UserTable">
                            <thead class="table-primary">
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Waktu</th>
                                    <th>Jumlah Penarikan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                date_default_timezone_set('Asia/Jakarta');
                                foreach ($penarikan as $p) { ?>
                                    <tr>
                                        <td><?= date('D d M Y', $p->id_penarikan); ?></td>
                                        <td><?= date('H:i:s', $p->id_penarikan); ?></td>
                                        <td>Rp. <?= number_format($p->jumlah, '2', ',', '.'); ?></td>
                                        <td>
                                            <?php if ($p->status == 0) : ?>
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