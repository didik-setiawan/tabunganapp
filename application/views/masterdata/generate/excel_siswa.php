<h2 style="text-align : center">Aplikasi Tabungan Siswa</h2>
<h4 style="text-align : center">Laporan Siswa</h4>
<small>Tanggal Cetak : <?php date_default_timezone_set('Asia/Jakarta');
                        echo date('D, d M Y'); ?></small>
<table border="1" cellpadding="7">
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