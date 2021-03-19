<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow" style="margin-bottom: 30%;">
                <div class="card-body">
                    <h4>Pengumuman</h4>
                    <hr>
                    <?php if (empty($pengumuman)) : ?>
                        <div class="alert alert-primary text-center" role="alert">
                            <p>
                                Tidak ada Pengumuman
                            </p>
                            <img src="<?= base_url('asset/img/pengumuman.svg'); ?>" width="200px">
                        </div>
                    <?php else : ?>
                        <div class="row">
                            <?php date_default_timezone_set('Asia/Jakarta');
                            foreach ($pengumuman as $p) { ?>
                                <div class="col-lg-12">
                                    <div class="card border-success mt-3">
                                        <div class="card-header bg-success text-light">
                                            <b><?= $p->nama; ?></b> | <small><?= date('D d M Y H:i:s', $p->id_pengumuman); ?></small>
                                        </div>
                                        <div class="card-body">
                                            <?= $p->isi_pengumuman; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>