<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow" style="margin-bottom: 18%;">
                <div class="card-body">
                    <h4>Profil Siswa</h4>
                    <hr>
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <table class="table table-bordered">
                                <tr>
                                    <td>NISN</td>
                                    <td><?= $pengguna->nisn; ?></td>
                                </tr>
                                <tr>
                                    <td>NIS</td>
                                    <td><?= $pengguna->nis; ?></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td><?= $pengguna->nama; ?></td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td><?= $this->db->get_where('tbl_kelas', ['id_kelas' => $pengguna->id_kelas])->row()->nama_kelas; ?></td>
                                </tr>
                                <tr>
                                    <td>No Telp</td>
                                    <td><?= $pengguna->no_telp; ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td><?= $pengguna->alamat; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>