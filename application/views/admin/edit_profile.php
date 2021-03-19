<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Profil</h1>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-10">
                            <div class="form-group row">
                                <label class="col-sm-2">Username</label>
                                <div class="col-sm-8">
                                    <input type="text" name="username" id="username" class="form-control" value="<?= $pengguna->username; ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-10">
                            <div class="form-group row">
                                <label class="col-sm-2">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" name="nama" id="nama" class="form-control" value="<?= $pengguna->nama; ?>" readonly>
                                </div>
                                <div class="col-sm-1">
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-10">
                            <div class="form-group row">
                                <label class="col-sm-2">No Telp</label>
                                <div class="col-sm-8">
                                    <input type="text" name="telp" id="telp" class="form-control" value="<?= $pengguna->no_telp; ?>" readonly>
                                </div>
                                <div class="col-sm-1">
                                    <a href="<?= base_url('admin/edit_telp'); ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <a href="<?= base_url('admin/edit_password'); ?>" class="btn btn-success"><i class="fa fa-key"></i> Edit Password</a>
                            <a href="<?= base_url('admin/add_new_admin'); ?>" class="btn btn-primary"><i class="fa fa-user-plus"></i> Tambah Admin Baru</a>
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Nama</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/edit_nama'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $pengguna->nama; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Edit Nama</button>
                </div>
            </form>
        </div>
    </div>
</div>