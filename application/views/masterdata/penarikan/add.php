<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Penarikan</h1>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-7">
                                <p>Pilih Siswa</p>
                                <table class="table table-striped table-bordered" id="AdminTable">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Saldo</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($siswa as $s) { ?>
                                            <tr>
                                                <td><?= $s->nama; ?></td>
                                                <td><?= $s->nama_kelas; ?></td>
                                                <td>Rp. <?= number_format($s->saldo, '2', ',', '.'); ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm add-siswa" data-id="<?= $s->nisn; ?>"><i class="fa fa-check"></i></button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-lg-5">
                                <p>Tambah Data Penarikan</p>
                                <form action="<?= base_url('masterdata/add_penarikan'); ?>" method="post">
                                    <div class="form-group">
                                        <label>NISN</label>
                                        <input type="text" name="nisn" id="nisn" class="form-control" readonly value="<?= set_value('nisn'); ?>">
                                        <?= form_error('nisn', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Siswa</label>
                                        <input type="text" name="siswa" id="namasiswa" class="form-control" readonly value="<?= set_value('siswa'); ?>">
                                        <?= form_error('siswa', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Kelas</label>
                                        <input type="text" name="kelas" id="namakelas" class="form-control" readonly value="<?= set_value('kelas'); ?>">
                                        <?= form_error('kelas', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Saldo</label>
                                        <input type="text" name="saldo" id="saldo" class="form-control" readonly value="<?= set_value('saldo'); ?>">
                                        <?= form_error('saldo', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Penarikan (Rp)</label>
                                        <input type="text" name="jumlah" id="jumlah" class="form-control" value="<?= set_value('jumlah'); ?>">
                                        <?= form_error('jumlah', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <a href="<?= base_url('masterdata/penarikan'); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Penarikan</button>
                                </form>
                            </div>

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