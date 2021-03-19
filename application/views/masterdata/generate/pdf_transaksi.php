<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }

        body {
            margin: 10px;
            padding: 10px;
        }

        .title {
            text-align: center;
        }

        hr {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            margin-top: 5px;
            border-collapse: collapse;
        }

        table tr th,
        td {
            padding: 7px;
            border: 1px solid #000000;
        }
    </style>
</head>

<body>
    <div class="title">
        <h2>Aplikasi Tabungan Siswa</h2>
        <p>Laporan Transaksi</p>
        <hr>
    </div>
    <small>Tanggal Cetak : <?php date_default_timezone_set('Asia/Jakarta');
                            echo date('d M Y H:i:s'); ?></small><br>
    <small>Tanggal Filter : <?= $this->input->post('tgl_awal'); ?> Sampai <?= $this->input->post('tgl_akhir'); ?></small>
    <?php if (empty($transaksi)) : ?>
        <p>Tidak Ada Data</p>
    <?php else : ?>
        <table>
            <tr>
                <th>Tanggal</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jumlah Setoran</th>
                <th>Status</th>
            </tr>
            <?php foreach ($transaksi as $s) { ?>
                <tr>
                    <td><?= date('d M Y', $s->id_transaksi); ?></td>
                    <td><?= $s->nisn; ?></td>
                    <td><?= $s->nama; ?></td>
                    <td><?= $s->nama_kelas; ?></td>
                    <td>Rp. <?= number_format($s->jumlah, '2', ',', '.'); ?></td>
                    <td><?php if ($s->status == 0) : ?>Proses <?php else : ?>Selesai <?php endif; ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php endif; ?>
</body>

</html>