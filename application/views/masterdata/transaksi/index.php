<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Management Data Transaksi</h1>


    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-body">
                        <a href="<?= base_url('masterdata/add_transaksi'); ?>" class="btn btn-success mb-3"><i class="fa fa-plus"></i> Tambah Transaksi</a>
                        <button class="btn btn-danger mb-3" data-toggle="modal" data-target="#exampleModal" id="gen_pdf_transaksi"><i class="far fa-file-pdf"></i> Generate ke PDF</button>
                        <button class="btn btn-warning mb-3" data-toggle="modal" data-target="#exampleModal" id="gen_excel_transaksi"><i class="far fa-file-excel"></i> Generate ke Excel</button>
                        <table class="table table-stiped table-bordered" id="AdminTable">
                            <thead class="table-primary">
                                <tr>
                                    <th>Tanggal</th>
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Jumlah Transaksi</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                date_default_timezone_set('Asia/Jakarta');
                                foreach ($transaksi as $t) { ?>
                                    <tr>
                                        <td><?= date('D, d M Y', $t->id_transaksi); ?></td>
                                        <td><?= $t->nisn; ?></td>
                                        <td><?= $t->nama; ?></td>
                                        <td><?= $t->nama_kelas; ?></td>
                                        <td>Rp. <?= number_format($t->jumlah, '2', ',', '.'); ?></td>
                                        <td>
                                            <?php if ($t->status == 0) : ?>
                                                <p class="text-danger"><i class="fa fa-times"></i> Proses</p>
                                            <?php else : ?>
                                                <p class="text-success"><i class="fa fa-check"></i> Selesai</p>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if ($t->status == 0) : ?>
                                                <a href="<?= base_url('masterdata/del_transaksi/') . md5($t->id_transaksi); ?>" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></a>
                                                <a href="<?= base_url('masterdata/check_transaksi/') . md5($t->id_transaksi); ?>" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
                                            <?php else : ?>
                                                <a href="<?= base_url('masterdata/uncheck_transaksi/') . md5($t->id_transaksi); ?>" class="btn btn-warning btn-sm"><i class="fa fa-times"></i></a>
                                            <?php endif; ?>
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

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter Tanggal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" id="formGenerate" target="_blank">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Dari Tanggal</label>
                                <input type="date" name="tgl_awal" class="form-control" value="<?= date('Y-m-d'); ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Sampai Tanggal</label>
                                <input type="date" name="tgl_akhir" class="form-control" value="<?= date('Y-m-d'); ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Generate Laporan <i class="fa fa-arrow-right"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>