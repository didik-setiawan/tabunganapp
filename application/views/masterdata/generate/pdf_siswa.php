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
        <p>Laporan Siswa</p>
        <hr>
    </div>
    <strong>Tanggal Cetak : <?php date_default_timezone_set('Asia/Jakarta');
                            echo date('d M Y'); ?></strong>

    <table>
        <tr>
            <th>NISN</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>No Telp</th>
            <th>Saldo</th>
        </tr>
        <?php foreach ($siswa as $s) { ?>
            <tr>
                <td><?= $s->nisn; ?></td>
                <td><?= $s->nis; ?></td>
                <td><?= $s->nama; ?></td>
                <td><?= $s->nama_kelas; ?></td>
                <td><?= $s->no_telp; ?></td>
                <td>Rp. <?= number_format($s->saldo, '2', ',', '.'); ?></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>