<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit No Telp</h1>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    <form action="<?= base_url('admin/edit_telp'); ?>" method="post">
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label>No Telp</label>
                                <input type="text" name="telp" id="telp" class="form-control" value="<?= $pengguna->no_telp; ?>">
                                <?= form_error('telp', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <a href="<?= base_url('admin/edit_profile'); ?>" class="btn btn-dark"><i class="fa fa-arrow-left"></i> Kembali</a>
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->