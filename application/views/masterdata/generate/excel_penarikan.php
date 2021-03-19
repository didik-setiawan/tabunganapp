<h2 style="text-align : center">Aplikasi Tabungan Siswa</h2>
<h4 style="text-align : center">Laporan Penarikan</h4>
<small>Tanggal Cetak : <?php date_default_timezone_set('Asia/Jakarta');
                        echo date('D, d M Y'); ?></small>
<?php if (empty($penarikan)) : ?>
    <p>Tidak Ada Data</p>
<?php else : ?>
    <table border="1" cellpadding="7">
        <tr>
            <th>Tanggal</th>
            <th>NISN</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jumlah Penarikan</th>
            <th>Status</th>
        </tr>
        <?php foreach ($penarikan as $s) { ?>
            <tr>
                <td><?= date('d M Y', $s->id_penarikan); ?></td>
                <td><?= $s->nisn; ?></td>
                <td><?= $s->nama; ?></td>
                <td><?= $s->nama_kelas; ?></td>
                <td>Rp. <?= number_format($s->jumlah, '2', ',', '.'); ?></td>
                <td><?php if ($s->status == 0) : ?>Proses <?php else : ?>Selesai <?php endif; ?></td>
            </tr>
        <?php } ?>
    </table>
<?php endif; ?>