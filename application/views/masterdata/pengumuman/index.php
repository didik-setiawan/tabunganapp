<?php date_default_timezone_set('Asia/Jakarta'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Management Pengumuman</h1>


    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    <a href="<?= base_url('masterdata/add_pengumuman'); ?>" class="btn btn-warning"><i class="fa fa-plus"></i> Tambah Pengumuman</a>
                    <hr>
                    <div class="row">
                        <?php foreach ($pengumuman as $p) { ?>
                            <div class="col-lg-12">
                                <!-- Dropdown Card Example -->
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <?php if ($p->status == 0) : ?>
                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-danger">
                                        <?php else : ?>
                                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
                                            <?php endif; ?>
                                            <h6 class="m-0 font-weight text-light"><b><?= $p->nama; ?></b> | <?= date('D d M Y H:i:s', $p->id_pengumuman); ?></h6>
                                            <div class="dropdown no-arrow">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item btn-delete" href="<?= base_url('masterdata/del_pengumuman/') . md5($p->id_pengumuman); ?>">Hapus</a>
                                                    <?php if ($p->status == 0) : ?>
                                                        <a class="dropdown-item" href="<?= base_url('masterdata/aktif_pengumuman/') . md5($p->id_pengumuman); ?>">Aktifkan</a>
                                                    <?php else : ?>
                                                        <a class="dropdown-item" href="<?= base_url('masterdata/nonaktif_pengumuman/') . md5($p->id_pengumuman); ?>">Nonaktifkan</a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            </div>
                                            <!-- Card Body -->
                                            <div class="card-body">
                                                <?= $p->isi_pengumuman; ?>
                                            </div>
                                        </div>
                                </div>
                            <?php } ?>
                            </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->