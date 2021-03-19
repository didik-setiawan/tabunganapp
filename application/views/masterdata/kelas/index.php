<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Management Data Kelas</h1>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-2 add-kelas" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-plus"></i> Tambah Data kelas
                    </button>

                    <table class="table table-bordered" id="AdminTable">
                        <thead class="table-success">
                            <tr>
                                <th>No</th>
                                <th>Nama Kelas</th>
                                <th>Aksi</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($kelas as $k) { ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $k->nama_kelas; ?></td>
                                    <td>
                                        <a href="<?= base_url('masterdata/del_kelas/') . md5($k->id_kelas); ?>" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></a>
                                        <button class="btn btn-info btn-sm edit-kelas" data-toggle="modal" data-target="#exampleModal" data-id="<?= md5($k->id_kelas); ?>"><i class="fa fa-edit"></i></button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('masterdata/add_Kelas'); ?>" method="post" id="form">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="idkelas" id="idkelas">
                        <label>Nama Kelas</label>
                        <input type="text" name="kelas" id="kelas" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>