<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Management Data Siswa</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    <a href="<?= base_url('masterdata/add_siswa'); ?>" class="btn btn-primary mb-2"><i class="fa fa-plus"></i> Tambah Data Siswa</a>
                    <a href="<?= base_url('masterdata/pdf_Siswa'); ?>" class="btn btn-danger mb-2" target="_blank"><i class="far fa-file-pdf"></i> Generate ke PDF</a>
                    <a href="<?= base_url('masterdata/excel_siswa'); ?>" class="btn btn-warning mb-2" target="_blank"><i class="far fa-file-excel"></i> Generate ke Excel</a>

                    <table class="table table-bordered" id="AdminTable">
                        <thead class="table-success">
                            <tr>
                                <th>NISN</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Saldo</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($siswa as $s) { ?>
                                <tr>
                                    <td><?= $s->nisn; ?></td>
                                    <td><?= $s->nis; ?></td>
                                    <td><?= $s->nama; ?></td>
                                    <td><?= $s->nama_kelas; ?></td>
                                    <td>Rp. <?= number_format($s->saldo, '2', ',', '.'); ?></td>
                                    <td>
                                        <a href="<?= base_url('masterdata/del_siswa/') . md5($s->nisn); ?>" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></a>
                                        <a href="<?= base_url('masterdata/edit_siswa/') . md5($s->nisn); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
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