<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url('asset/img/logo.png'); ?>">
    <link rel="stylesheet" href="<?= base_url('asset/bootstrap/bootstrap.min.css'); ?>">
    <link href="<?= base_url('asset/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= base_url('asset/datatables/bootstrap4.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('asset/datatables/dataTables.bootstrap4.min.css'); ?>">
    <title><?= $title; ?></title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }

        .navbar {
            background: #7826ab;
        }

        .navbar-brand:hover {
            border-bottom: 2px solid #f75e4a;
        }

        .nav-link:hover {
            border-bottom: 2px solid #f75e4a;
        }
    </style>
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-light shadow mb-3">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('user'); ?>">
                <img src="<?= base_url('asset/img/logo.png'); ?>" alt="" width="30" height="24" class="d-inline-block align-top">
                <b class="text-light"> App Tabungan</b>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href="<?= base_url('user'); ?>"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="<?= base_url('user/transaksi'); ?>"><i class="far fa-money-bill-alt"></i> Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="<?= base_url('user/penarikan'); ?>"><i class="fas fa-money-check-alt"></i> Penarikan</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-light" href="<?= base_url('user/profile'); ?>"><i class="fa fa-user"></i> Profile</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-light" href="<?= base_url('user/pengumuman') ?>">
                            <i class="fas fa-bell fa-fw"></i>
                            <?php $pengumuman = $this->db->get_where('tbl_pengumuman', ['status' => 1])->num_rows();
                            if (empty($pengumuman)) : ?>
                            <?php else : ?>
                                <span class="badge bg-danger"><?= $pengumuman; ?></span>
                            <?php endif; ?>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-light" href="<?= base_url('auth/logout'); ?>"><i class="fa fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>