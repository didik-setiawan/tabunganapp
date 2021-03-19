<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url('asset/img/logo.png'); ?>">
    <link rel="stylesheet" href="<?= base_url('asset/bootstrap/bootstrap.min.css'); ?>">
    <title>Login Page | Aplikasi Tabungan Siswa</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }

        body {
            background: #7826ab;
        }

        #thumbnail img {
            width: 550px;
        }

        #form {
            text-align: center;
        }

        .form-control {
            border: none;
            background: #eeeeee;
            width: 100%;
            height: 45px;
            border-radius: 30px;
        }

        .form-control:focus {
            background: #eeeeee;
        }

        #btn {
            background: #7826ab;
            color: #fff;
            width: 70%;
            height: 45px;
            border-radius: 30px;
        }

        #btn:hover {
            background: #fff;
            color: #7826ab;
            border: 1px solid #7826ab;
        }

        .card {
            margin-top: 5%;
        }

        .card-body {
            margin-top: 5%;
            margin-bottom: 5%;
        }

        @media screen and (max-width : 991px) {
            #thumbnail img {
                display: none;
            }

            .card {
                margin-top: 17%;
            }

        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6" id="thumbnail">
                                <img src="<?= base_url('asset/img/login.svg'); ?>">
                            </div>
                            <div class="col-lg-6" id="form">
                                <h4>Aplikasi Tabungan Siswa</h4>
                                <h6>Login Page</h6>

                                <?php if ($this->session->flashdata('salah')) : ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <?= $this->session->flashdata('salah'); ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
                                <form action="<?= base_url('auth'); ?>" method="post">
                                    <div class="form-group my-4">
                                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                        <input type="text" name="username" id="username" class="form-control" placeholder="Username" autofocus value="<?= set_value('username'); ?>">
                                    </div>

                                    <div class="form-group my-4">
                                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                    </div>
                                    <button type="submit" class="btn" id="btn">Login</button><br>
                                    <small><i>Note : Untuk siswa silahkan login menggunakan NISN dan NIS yang anda punya</i></small>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="<?= base_url('asset/bootstrap/bootstrap.bundle.min.js'); ?>"></script>
</body>

</html>