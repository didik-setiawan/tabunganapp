<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Pengumuman</h1>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    <form action="<?= base_url('masterdata/add_pengumuman'); ?>" method="post">
                        <div class="form-group">
                            <label>Isi Pengumuman</label><br>
                            <?= form_error('isi', '<small class="text-danger">', '</small>'); ?>
                            <textarea name="isi" id="isi" rows="10" class="form-control"><?= set_value('isi'); ?></textarea>
                        </div>
                        <a href="<?= base_url('masterdata/pengumuman'); ?>" class="btn btn-dark"><i class="fa fa-arrow-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-info"><i class="fa fa-plus"></i> Tambahkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->