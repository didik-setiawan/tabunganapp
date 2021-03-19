<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Siswa</h1>


    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    <form action="<?= base_url('masterdata/edit_siswa/' . md5($siswa->nisn)); ?>" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>NISN</label>
                                    <input type="text" name="nisn" class="form-control" value="<?= $siswa->nisn; ?>">
                                    <?= form_error('nisn', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>NIS</label>
                                    <input type="text" name="nis" class="form-control" value="<?= $siswa->nis; ?>">
                                    <?= form_error('nis', '<small class="text-danger">', '</small>'); ?>

                                </div>
                                <div class="form-group">
                                    <label>Nama Siswa</label>
                                    <input type="text" name="nama" class="form-control" value="<?= $siswa->nama; ?>">
                                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Kelas</label>
                                    <select name="kelas" class="form-control">
                                        <?php foreach ($kelas as $k) { ?>
                                            <?php if ($k->id_kelas == $siswa->id_kelas) : ?>
                                                <option value="<?= $k->id_kelas ?>" selected><?= $k->nama_kelas; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $k->id_kelas ?>"><?= $k->nama_kelas; ?></option>
                                            <?php endif; ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>No Telp</label>
                                    <input type="text" name="telp" class="form-control" value="<?= $siswa->no_telp; ?>">
                                    <?= form_error('telp', '<small class="text-danger">', '</small>'); ?>

                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea name="alamat" class="form-control" rows="5"><?= $siswa->alamat; ?></textarea>
                                    <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>

                                </div>
                            </div>
                            <a href="<?= base_url('masterdata/siswa'); ?>" class="btn btn-dark mx-2"><i class="fa fa-arrow-left"></i> Kembali</a>
                            <button type="submit" class="btn btn-success mx-2"><i class="fa fa-plus"></i> Tambah Data</button>
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