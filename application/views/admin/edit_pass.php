<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Password</h1>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <form action="<?= base_url('admin/edit_password'); ?>" method="post">
                    <div class="card-body">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label>Password Lama</label>
                                <input type="password" name="pl" id="pl" class="form-control">
                                <?= form_error('pl', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Password Baru</label>
                                <input type="password" name="newpass" id="newpass" class="form-control">
                                <?= form_error('newpass', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Ulangi Password Baru</label>
                                <input type="password" name="repeat" id="repeat" class="form-control">
                                <?= form_error('repeat', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <a href="<?= base_url('admin/edit_profile'); ?>" class="btn btn-dark"><i class="fa fa-arrow-left"></i> Kembali</a>
                            <button type="submit" class="btn btn-success"><i class="fa fa-key"></i> Edit Password</button>
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