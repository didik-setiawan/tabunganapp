<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Admin Baru</h1>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    <form action="<?= base_url('admin/add_new_admin'); ?>" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nama Admin</label>
                                    <input type="text" name="nama" class="form-control" value="<?= set_value('nama'); ?>">
                                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>No Telp</label>
                                    <input type="text" name="telp" class="form-control" value="<?= set_value('telp'); ?>">
                                    <?= form_error('telp', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" value="<?= set_value('username'); ?>">
                                    <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Password Baru</label>
                                    <input type="password" name="newpass" class="form-control">
                                    <?= form_error('newpass', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Ulangi Password Baru</label>
                                    <input type="password" name="repass" class="form-control">
                                    <?= form_error('repass', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <a href="<?= base_url('admin/edit_profile'); ?>" class="btn btn-dark"><i class="fa fa-arrow-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Admin Baru</button>
                            </div>
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