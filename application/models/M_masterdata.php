<?php

defined('BASEPATH') or exit('No direct script allowed access');
class M_masterdata extends CI_Model
{

    // Untuk managemnet data kelas

    public function add_Kelas()
    {
        $data = [
            'nama_kelas' => htmlspecialchars($this->input->post('kelas'))
        ];
        if ($this->db->insert('tbl_kelas', $data)) {
            $this->session->set_flashdata('true', 'Data kelas berhasil di tambahkan');
            redirect('masterdata/kelas');
        } else {
            $this->session->set_flashdata('false', 'Data kelas gagal di tambahkan');
            redirect('masterdata/kelas');
        }
    }

    public function get_Kelas()
    {
        $this->db->order_by('nama_kelas', 'ASC');
        return $this->db->get('tbl_kelas')->result();
    }

    public function del_kelas($id)
    {
        $siswa = $this->db->get_where('tbl_siswa', ['md5(id_kelas)' => $id])->result();
        foreach ($siswa as $s) {
            $this->db->delete('tbl_transaksi', ['nisn' => $s->nisn]);
            $this->db->delete('tbl_penarikan', ['nisn' => $s->nisn]);
        }
        $this->db->delete('tbl_siswa', ['md5(id_kelas)' => $id]);
        if ($this->db->delete('tbl_kelas', ['md5(id_kelas)' => $id])) {
            $this->session->set_flashdata('true', 'Data kelas berhasil dihapus');
            redirect('masterdata/kelas');
        } else {
            $this->session->set_flashdata('false', 'Data kelas gagal dihapus');
            redirect('masterdata/kelas');
        }
    }

    public function get_kelas_id($id)
    {
        return $this->db->get_where('tbl_kelas', ['md5(id_kelas)' => $id])->row_array();
    }

    public function edit_kelas()
    {
        $this->db->set('nama_kelas', htmlspecialchars($this->input->post('kelas')));
        $this->db->where('md5(id_kelas)', $this->input->post('idkelas'));
        if ($this->db->update('tbl_kelas')) {
            $this->session->set_flashdata('true', 'Data kelas berhasil diedit');
            redirect('masterdata/kelas');
        } else {
            $this->session->set_flashdata('false', 'Data kelas gagal diedit');
            redirect('masterdata/kelas');
        }
    }


    // Untuk managemnet data siswa

    public function add_siswa()
    {
        $data = [
            'nisn' => htmlspecialchars($this->input->post('nisn')),
            'nis' => htmlspecialchars($this->input->post('nis')),
            'nama' => htmlspecialchars($this->input->post('nama')),
            'id_kelas' => htmlspecialchars($this->input->post('kelas')),
            'no_telp' => htmlspecialchars($this->input->post('telp')),
            'alamat' => htmlspecialchars($this->input->post('alamat')),
            'saldo' => 0
        ];

        if ($this->db->insert('tbl_siswa', $data)) {
            $this->session->set_flashdata('true', 'Data siswa berhasil di tambahkan');
            redirect('masterdata/siswa');
        } else {
            $this->session->set_flashdata('false', 'Data siswa gagal di tambahkan');
            redirect('masterdata/siswa');
        }
    }

    public function get_siswa_join_kelas()
    {
        $query = "SELECT * FROM tbl_siswa INNER JOIN tbl_kelas ON tbl_siswa.id_kelas = tbl_kelas.id_kelas ORDER BY tbl_siswa.nama DESC";
        return $this->db->query($query)->result();
    }

    public function get_siswa_by_id($id)
    {
        return $this->db->get_where('tbl_siswa', ['md5(nisn)' => $id])->row();
    }

    public function edit_siswa($id)
    {
        $data = [
            'nisn' => htmlspecialchars($this->input->post('nisn')),
            'nis' => htmlspecialchars($this->input->post('nis')),
            'nama' => htmlspecialchars($this->input->post('nama')),
            'id_kelas' => htmlspecialchars($this->input->post('kelas')),
            'no_telp' => htmlspecialchars($this->input->post('telp')),
            'alamat' => htmlspecialchars($this->input->post('alamat'))
        ];
        $this->db->where('md5(nisn)', $id);
        if ($this->db->update('tbl_siswa', $data)) {
            $this->session->set_flashdata('true', 'Data siswa berhasil di edit');
            redirect('masterdata/siswa');
        } else {
            $this->session->set_flashdata('false', 'Data siswa gagal di edit');
            redirect('masterdata/siswa');
        }
    }

    public function del_siswa($nisn)
    {
        $this->db->delete('tbl_transaksi', ['md5(nisn)' => $nisn]);
        $this->db->delete('tbl_penarikan', ['md5(nisn)' => $nisn]);
        if ($this->db->delete('tbl_siswa', ['md5(nisn)' => $nisn])) {
            $this->session->set_flashdata('true', 'Data siswa berhasil di hapus');
            redirect('masterdata/siswa');
        } else {
            $this->session->set_flashdata('false', 'Data siswa gagal di hapus');
            redirect('masterdata/siswa');
        }
    }


    // untuk management data transaksi

    public function get_siswa_join_kelas_by_nisn($nisn)
    {
        $query = "SELECT * FROM tbl_siswa INNER JOIN tbl_kelas ON tbl_siswa.id_kelas = tbl_kelas.id_kelas WHERE tbl_siswa.nisn = $nisn ORDER BY tbl_siswa.nama DESC";
        return $this->db->query($query)->row_array();
    }

    public function get_transaksi_multitable()
    {
        $query = "SELECT tbl_siswa.nisn, tbl_siswa.nama, tbl_kelas.nama_kelas, tbl_transaksi.* FROM tbl_kelas, tbl_siswa, tbl_transaksi WHERE tbl_transaksi.nisn = tbl_siswa.nisn AND tbl_siswa.id_kelas = tbl_kelas.id_kelas ORDER BY tbl_transaksi.id_transaksi DESC";
        return $this->db->query($query)->result();
    }

    public function add_transaksi()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = [
            'id_transaksi' => time(),
            'nisn' => htmlspecialchars($this->input->post('nisn')),
            'tgl_transaksi' => date('Y-m-d'),
            'jumlah' => htmlspecialchars($this->input->post('jumlah')),
            'status' => 0
        ];

        if ($this->db->insert('tbl_transaksi', $data)) {
            $this->session->set_flashdata('true', 'Transaksi berhasil di tambahkan');
            redirect('masterdata/transaksi');
        } else {
            $this->session->set_flashdata('false', 'Transaksi gagal di tambahkan');
            redirect('masterdata/transaksi');
        }
    }

    public function del_transaksi($id)
    {
        if ($this->db->delete('tbl_transaksi', ['md5(id_transaksi)' => $id])) {
            $this->session->set_flashdata('true', 'Data Transaksi berhasil di hapus');
            redirect('masterdata/transaksi');
        } else {
            $this->session->set_flashdata('false', 'Data Transaksi gagal di hapus');
            redirect('masterdata/transaksi');
        }
    }

    public function check_transaksi($id)
    {
        $transaksi = $this->db->get_where('tbl_transaksi', ['md5(id_transaksi)' => $id])->row();
        $siswa = $this->db->get_where('tbl_siswa', ['nisn' => $transaksi->nisn])->row();

        $this->db->set('status', 1);
        $this->db->where('md5(id_transaksi)', $id);
        if ($this->db->update('tbl_transaksi')) {
            $new_saldo = $siswa->saldo + $transaksi->jumlah;
            $this->db->set('saldo', $new_saldo);
            $this->db->where('nisn', $siswa->nisn);
            $this->db->update('tbl_siswa');
            $this->session->set_flashdata('true', 'Status transaksi berhasil di edit');
            redirect('masterdata/transaksi');
        } else {
            $this->session->set_flashdata('false', 'Status transaksi gagal di edit');
            redirect('masterdata/transaksi');
        }
    }

    public function uncheck_transaksi($id)
    {
        $transaksi = $this->db->get_where('tbl_transaksi', ['md5(id_transaksi)' => $id])->row();
        $siswa = $this->db->get_where('tbl_siswa', ['nisn' => $transaksi->nisn])->row();

        if ($siswa->saldo <= 0) {
            $this->session->set_flashdata('false', 'Gagal karena saldo siswa tidak mencukupi');
            redirect('masterdata/transaksi');
        } else {
            $new_saldo = $siswa->saldo - $transaksi->jumlah;
            if ($new_saldo < 0) {
                $this->session->set_flashdata('false', 'Gagal karena saldo siswa tidak mencukupi');
                redirect('masterdata/transaksi');
            } else {
                $this->db->set('status', 0);
                $this->db->where('md5(id_transaksi)', $id);
                if ($this->db->update('tbl_transaksi')) {
                    $this->db->set('saldo', $new_saldo);
                    $this->db->where('nisn', $siswa->nisn);
                    $this->db->update('tbl_siswa');
                    $this->session->set_flashdata('true', 'Status transaksi berhasil di edit');
                    redirect('masterdata/transaksi');
                } else {
                    $this->session->set_flashdata('false', 'Status transaksi gagal di edit');
                    redirect('masterdata/transaksi');
                }
            }
        }
    }


    // Untuk management data penarikan

    public function add_penarikan()
    {
        date_default_timezone_set('Asia/Jakarta');

        $saldo = htmlspecialchars($this->input->post('saldo'));
        $penarikan = htmlspecialchars($this->input->post('jumlah'));

        if ($penarikan == $saldo) {
            $new_penarikan = $penarikan - 20000;
        } elseif ($penarikan > $saldo) {
            $this->session->set_flashdata('false', 'Gagal melakukan penarikan');
            redirect('masterdata/add_penarikan');
        } else {
            $new_penarikan = $penarikan;
        }

        if ($new_penarikan == 0) {
            $this->session->set_flashdata('false', 'Tidak dapat melakukan penarikan');
            redirect('masterdata/add_penarikan');
        }

        $data = [
            'id_penarikan' => time(),
            'nisn' => htmlspecialchars($this->input->post('nisn')),
            'jumlah' => $new_penarikan,
            'tgl_penarikan' => date('Y-m-d'),
            'status' => 0
        ];

        if ($this->db->insert('tbl_penarikan', $data)) {
            $this->session->set_flashdata('true', 'Penarikan berhasil di tambahkan');
            redirect('masterdata/penarikan');
        } else {
            $this->session->set_flashdata('false', 'Penarikan gagal di tambahkan');
            redirect('masterdata/penarikan');
        }
    }

    public function get_penarikan_multitable()
    {
        $query = "SELECT tbl_siswa.nisn, tbl_siswa.nama, tbl_kelas.nama_kelas, tbl_penarikan.* FROM tbl_kelas, tbl_siswa, tbl_penarikan WHERE tbl_penarikan.nisn = tbl_siswa.nisn AND tbl_siswa.id_kelas = tbl_kelas.id_kelas";
        return $this->db->query($query)->result();
    }

    public function del_penarikan($id)
    {
        if ($this->db->delete('tbl_penarikan', ['md5(id_penarikan)' => $id])) {
            $this->session->set_flashdata('true', 'Penarikan berhasil di hapus');
            redirect('masterdata/penarikan');
        } else {
            $this->session->set_flashdata('false', 'Penarikan gagal di hapus');
            redirect('masterdata/penarikan');
        }
    }

    public function check_penarikan($id)
    {
        $penarikan = $this->db->get_where('tbl_penarikan', ['md5(id_penarikan)' => $id])->row();
        $siswa = $this->db->get_where('tbl_siswa', ['nisn' => $penarikan->nisn])->row();

        if ($siswa->saldo <= 20000) {
            $this->session->set_flashdata('false', 'Saldo siswa tidak mencukupi');
            redirect('masterdata/penarikan');
        } elseif ($penarikan->jumlah >= $siswa->saldo) {
            $this->session->set_flashdata('false', 'Saldo siswa tidak mencukupi');
            redirect('masterdata/penarikan');
        } else {
            $new_saldo = $siswa->saldo - $penarikan->jumlah;
            if ($new_saldo > 20000) {
                $this->session->set_flashdata('false', 'Saldo siswa tidak mencukupi');
                redirect('masterdata/penarikan');
            } else {
                $this->db->set('status', 1);
                $this->db->where('md5(id_penarikan)', $id);
                if ($this->db->update('tbl_penarikan')) {
                    $this->db->set('saldo', $new_saldo);
                    $this->db->where('nisn', $siswa->nisn);
                    $this->db->update('tbl_siswa');
                    $this->session->set_flashdata('true', 'Berhasil melakukan edit status penarikan');
                    redirect('masterdata/penarikan');
                } else {
                    $this->session->set_flashdata('false', 'Gagal melakukan edit status penarikan');
                    redirect('masterdata/penarikan');
                }
            }
        }
    }

    public function uncheck_penarikan($id)
    {
        $penarikan = $this->db->get_where('tbl_penarikan', ['md5(id_penarikan)' => $id])->row();
        $siswa = $this->db->get_where('tbl_siswa', ['nisn' => $penarikan->nisn])->row();

        $new_saldo = $siswa->saldo + $penarikan->jumlah;
        $this->db->set('status', 0);
        $this->db->where('md5(id_penarikan)', $id);
        if ($this->db->update('tbl_penarikan')) {
            $this->db->set('saldo', $new_saldo);
            $this->db->where('nisn', $siswa->nisn);
            $this->db->update('tbl_siswa');
            $this->session->set_flashdata('true', 'Status penarikan berhasil di edit');
            redirect('masterdata/penarikan');
        } else {
            $this->session->set_flashdata('false', 'Status penarikan gagal di edit');
            redirect('masterdata/penarikan');
        }
    }


    // Untuk management Pengumuman

    public function add_pengumuman($id)
    {
        $data = [
            'id_pengumuman' => time(),
            'id_admin' => $id,
            'isi_pengumuman' => htmlspecialchars($this->input->post('isi')),
            'status' => 1
        ];

        if ($this->db->insert('tbl_pengumuman', $data)) {
            $this->session->set_flashdata('true', 'Pengumuman berhasil di tambahkan');
            redirect('masterdata/pengumuman');
        } else {
            $this->session->set_flashdata('false', 'Pengumuman gagal di tambahkan');
            redirect('masterdata/pengumuman');
        }
    }

    public function get_pengumuman_join_admin()
    {
        $query = "SELECT * FROM tbl_pengumuman INNER JOIN tbl_admin ON tbl_pengumuman.id_admin = tbl_admin.id_admin ORDER BY tbl_pengumuman.id_pengumuman DESC";
        return $this->db->query($query)->result();
    }

    public function aktif_pengumuman($id)
    {
        $this->db->set('status', 1);
        $this->db->where('md5(id_pengumuman)', $id);
        if ($this->db->update('tbl_pengumuman')) {
            $this->session->set_flashdata('true', 'Pengumuman berhasil di aktifkan');
            redirect('masterdata/pengumuman');
        } else {
            $this->session->set_flashdata('false', 'Pengumuman gagal di aktifkan');
            redirect('masterdata/pengumuman');
        }
    }

    public function nonaktif_pengumuman($id)
    {
        $this->db->set('status', 0);
        $this->db->where('md5(id_pengumuman)', $id);
        if ($this->db->update('tbl_pengumuman')) {
            $this->session->set_flashdata('true', 'Pengumuman berhasil di nonaktifkan');
            redirect('masterdata/pengumuman');
        } else {
            $this->session->set_flashdata('false', 'Pengumuman gagal di nonaktifkan');
            redirect('masterdata/pengumuman');
        }
    }

    public function del_pengumuman($id)
    {
        if ($this->db->delete('tbl_pengumuman', ['md5(id_pengumuman)' => $id])) {
            $this->session->set_flashdata('true', 'Pengumuman berhasil di hapus');
            redirect('masterdata/pengumuman');
        } else {
            $this->session->set_flashdata('false', 'Pengumuman berhasil di hapus');
            redirect('masterdata/pengumuman');
        }
    }


    // Untuk generate laporan 

    public function get_transaksi_filter($tgl_awal, $tgl_akhir)
    {
        $query = "SELECT tbl_siswa.nisn, tbl_siswa.nama, tbl_kelas.nama_kelas, tbl_transaksi.* FROM tbl_kelas, tbl_siswa, tbl_transaksi WHERE tbl_transaksi.nisn = tbl_siswa.nisn AND tbl_siswa.id_kelas = tbl_kelas.id_kelas AND tbl_transaksi.tgl_transaksi BETWEEN '" . $tgl_awal . "' AND '" . $tgl_akhir . "' ORDER BY tbl_transaksi.id_transaksi DESC";
        return $this->db->query($query)->result();
    }

    public function get_penarikan_filter($tgl_awal, $tgl_akhir)
    {
        $query = "SELECT tbl_siswa.nisn, tbl_siswa.nama, tbl_kelas.nama_kelas, tbl_penarikan.* FROM tbl_kelas, tbl_siswa, tbl_penarikan WHERE tbl_penarikan.nisn = tbl_siswa.nisn AND tbl_siswa.id_kelas = tbl_kelas.id_kelas AND tbl_penarikan.tgl_penarikan BETWEEN '" . $tgl_awal . "' AND '" . $tgl_akhir . "' ORDER BY tbl_penarikan.id_penarikan DESC";
        return $this->db->query($query)->result();
    }
}
