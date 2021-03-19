<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Masterdata extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        login_admin();
        $this->load->model('M_masterdata', 'master');
    }

    // Untuk managemnet data kelas
    public function kelas()
    {
        $data['title'] = 'Management Data Kelas';
        $data['pengguna'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row();
        $data['kelas'] = $this->master->get_Kelas();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('masterdata/kelas/index');
        $this->load->view('templates/footer');
    }

    public function add_Kelas()
    {
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim|min_length[3]|is_unique[tbl_kelas.nama_kelas]', [
            'required' => 'Nama Kelas harus di isi',
            'min_length' => 'Nama Kelas min 3 karakter',
            'is_unique' => 'Nama Kelas sudah terdaftar'
        ]);
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('false', 'Kesalahan penulisan harap coba kembali');
            redirect('masterdata/kelas');
        } else {
            $this->master->add_Kelas();
        }
    }

    public function del_kelas($id)
    {
        return $this->master->del_kelas($id);
    }

    public function get_kelas_id()
    {
        $id = $_POST['id'];
        echo json_encode($this->master->get_kelas_id($id));
    }

    public function edit_kelas()
    {
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim|min_length[3]|is_unique[tbl_kelas.nama_kelas]', [
            'required' => 'Nama Kelas harus di isi',
            'min_length' => 'Nama Kelas min 3 karakter',
            'is_unique' => 'Nama Kelas sudah terdaftar'
        ]);
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('false', 'Kesalahan penulisan harap coba kembali');
            redirect('masterdata/kelas');
        } else {
            $this->master->edit_kelas();
        }
    }


    // Untuk managemnet data siswa

    public function siswa()
    {
        $data['title'] = 'Management Data Siswa';
        $data['pengguna'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row();
        $data['siswa'] = $this->master->get_siswa_join_kelas();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('masterdata/siswa/index');
        $this->load->view('templates/footer');
    }

    public function add_siswa()
    {
        $data['title'] = 'Tambah Data Siswa';
        $data['pengguna'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row();
        $data['kelas'] = $this->master->get_Kelas();

        $this->form_validation->set_rules('nisn', 'nisn', 'required|trim|numeric|is_unique[tbl_siswa.nisn]|exact_length[10]', [
            'required' => 'NISN harus di isi',
            'numeric' => 'NISN harus angka',
            'is_unique' => 'NISN sudah terdaftar',
            'exact_length' => 'NISN harus 10 angka'
        ]);
        $this->form_validation->set_rules('nis', 'nis', 'required|trim|numeric|is_unique[tbl_siswa.nis]|exact_length[8]', [
            'required' => 'NIS harus di isi',
            'numeric' => 'NIS harus angka',
            'is_unique' => 'NIS sudah terdaftar',
            'exact_length' => 'NIS harus 8 angka'
        ]);
        $this->form_validation->set_rules('nama', 'nama', 'required|trim|min_length[3]', [
            'required' => 'Nama harus di isi',
            'min_length' => 'Nama min 3 huruf'
        ]);
        $this->form_validation->set_rules('telp', 'telp', 'required|trim|numeric|is_unique[tbl_siswa.no_telp]|min_length[10]|max_length[13]', [
            'required' => 'No telp harus di isi',
            'numeric' => 'No telp harus angka',
            'is_unique' => 'No telp sudah terdaftar',
            'min_length' => 'No telp min 10 digit',
            'max_length' => 'No telp max 13 digit'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim|min_length[7]', [
            'required' => 'Alamat harus di isi',
            'min_length' => 'Amalat min 7 karakter'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('masterdata/siswa/add');
            $this->load->view('templates/footer');
        } else {
            $this->master->add_siswa();
        }
    }

    public function edit_siswa($id = null)
    {
        edit_siswa($id);
        $data['title'] = 'Edit Data Siswa';
        $data['pengguna'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row();
        $data['siswa'] = $this->master->get_siswa_by_id($id);
        $data['kelas'] = $this->master->get_Kelas();

        $this->form_validation->set_rules('nisn', 'nisn', 'required|trim|numeric|is_unique[tbl_siswa.nisn]|exact_length[10]', [
            'required' => 'NISN harus di isi',
            'numeric' => 'NISN harus angka',
            'is_unique' => 'NISN sudah terdaftar',
            'exact_length' => 'NISN harus 10 angka'
        ]);
        $this->form_validation->set_rules('nis', 'nis', 'required|trim|numeric|is_unique[tbl_siswa.nis]|exact_length[8]', [
            'required' => 'NIS harus di isi',
            'numeric' => 'NIS harus angka',
            'is_unique' => 'NIS sudah terdaftar',
            'exact_length' => 'NIS harus 8 angka'
        ]);
        $this->form_validation->set_rules('nama', 'nama', 'required|trim|min_length[3]', [
            'required' => 'Nama harus di isi',
            'min_length' => 'Nama min 3 huruf'
        ]);
        $this->form_validation->set_rules('telp', 'telp', 'required|trim|numeric|is_unique[tbl_siswa.no_telp]|min_length[10]|max_length[13]', [
            'required' => 'No telp harus di isi',
            'numeric' => 'No telp harus angka',
            'is_unique' => 'No telp sudah terdaftar',
            'min_length' => 'No telp min 10 digit',
            'max_length' => 'No telp max 13 digit'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim|min_length[7]', [
            'required' => 'Alamat harus di isi',
            'min_length' => 'Amalat min 7 karakter'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('masterdata/siswa/edit');
            $this->load->view('templates/footer');
        } else {
            $this->master->edit_siswa($id);
        }
    }

    public function del_siswa($nisn)
    {
        return $this->master->del_siswa($nisn);
    }

    // Untuk management data Transaksi 

    public function transaksi()
    {
        $data['title'] = 'Management Data Transaksi';
        $data['pengguna'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row();
        $data['transaksi'] = $this->master->get_transaksi_multitable();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('masterdata/transaksi/index');
        $this->load->view('templates/footer');
    }

    public function add_transaksi()
    {
        $data['title'] = 'Tambah Data Transaksi';
        $data['pengguna'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row();
        $data['siswa'] = $this->master->get_siswa_join_kelas();

        $this->form_validation->set_rules('nisn', 'nisn', 'required|trim|numeric|exact_length[10]', [
            'required' => 'NISN harus di isi',
            'numeric' => 'NISN harus angka',
            'exact_length' => 'NISN harus 10 digit'
        ]);
        $this->form_validation->set_rules('siswa', 'Nama siswa', 'required|trim|min_length[3]', [
            'required' => 'Nama siswa harus di isi',
            'min_length' => 'Nama siswa min 3 karakter'
        ]);
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim', ['required' => 'Kelas harus di isi']);
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim|min_length[3]|numeric', [
            'required' => 'Jumlah Transaksi harus di isi',
            'min_length' => 'Jumlah Transaksi min 3 angka',
            'numeric'  => 'Jumlah Transaksi harus angka'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('masterdata/transaksi/add');
            $this->load->view('templates/footer');
        } else {
            $this->master->add_transaksi();
        }
    }

    public function get_siswa_join_kelas_by_nisn()
    {
        $nisn = $_POST['nisn'];
        echo json_encode($this->master->get_siswa_join_kelas_by_nisn($nisn));
    }

    public function del_transaksi($id)
    {
        return $this->master->del_transaksi($id);
    }

    public function check_transaksi($id)
    {
        return $this->master->check_transaksi($id);
    }

    public function uncheck_transaksi($id)
    {
        return $this->master->uncheck_transaksi($id);
    }


    // Untuk management data Penarikan

    public function penarikan()
    {
        $data['title'] = 'Management Data Penarikan';
        $data['pengguna'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row();
        $data['penarikan'] = $this->master->get_penarikan_multitable();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('masterdata/penarikan/index');
        $this->load->view('templates/footer');
    }

    public function add_penarikan()
    {
        $data['title'] = 'Tambah Data Penarikan';
        $data['pengguna'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row();
        $data['siswa'] = $this->master->get_siswa_join_kelas();

        $this->form_validation->set_rules('nisn', 'nisn', 'required|trim|numeric|exact_length[10]', [
            'required' => 'NISN harus di isi',
            'numeric' => 'NISN harus angka',
            'exact_length' => 'NISN harus 10 digit'
        ]);
        $this->form_validation->set_rules('siswa', 'Nama siswa', 'required|trim|min_length[3]', [
            'required' => 'Nama siswa harus di isi',
            'min_length' => 'Nama siswa min 3 karakter'
        ]);
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim', ['required' => 'Kelas harus di isi']);
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim|min_length[3]|numeric', [
            'required' => 'Jumlah Penarrikan harus di isi',
            'min_length' => 'Jumlah Penarrikan min 3 angka',
            'numeric'  => 'Jumlah Penarrikan harus angka'
        ]);
        $this->form_validation->set_rules('saldo', 'saldo', 'required|trim|numeric', [
            'required' => 'Saldo harus di isi',
            'numeric'  => 'Saldo harus angka'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('masterdata/penarikan/add');
            $this->load->view('templates/footer');
        } else {
            return $this->master->add_penarikan();
        }
    }

    public function del_penarikan($id)
    {
        return $this->master->del_penarikan($id);
    }

    public function check_penarikan($id)
    {
        return $this->master->check_penarikan($id);
    }

    public function uncheck_penarikan($id)
    {
        return $this->master->uncheck_penarikan($id);
    }


    // Untuk management data pengumuman

    public function pengumuman()
    {
        $data['title'] = 'Management Pengumuman';
        $data['pengguna'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row();
        $data['pengumuman'] = $this->master->get_pengumuman_join_admin();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('masterdata/pengumuman/index');
        $this->load->view('templates/footer');
    }

    public function add_pengumuman()
    {
        $data['title'] = 'Tambah Pengumuman';
        $data['pengguna'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row();

        $this->form_validation->set_rules('isi', 'Isi', 'required|trim|min_length[7]', [
            'required' => 'Isi Pengumuman harus di isi',
            'min_length' => 'Isi Pengumuman min 7 karakter'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('masterdata/pengumuman/add');
            $this->load->view('templates/footer');
        } else {
            $this->master->add_pengumuman($data['pengguna']->id_admin);
        }
    }

    public function aktif_pengumuman($id)
    {
        return $this->master->aktif_pengumuman($id);
    }

    public function nonaktif_pengumuman($id)
    {
        return $this->master->nonaktif_pengumuman($id);
    }

    public function del_pengumuman($id)
    {
        return $this->master->del_pengumuman($id);
    }


    // Untuk generate laporan ke PDF

    private function gen_pdf($html)
    {
        require FCPATH . '/asset/mpdf/vendor/autoload.php';
        $pdf = new \Mpdf\Mpdf();
        $pdf->WriteHTML($html);
        $pdf->Output();
    }

    public function pdf_Siswa()
    {
        $data['title'] = "Generate Laporan Siswa ke PDF";
        $data['siswa'] = $this->master->get_siswa_join_kelas();
        $html = $this->load->view('masterdata/generate/pdf_siswa', $data, true);
        return $this->gen_pdf($html);
    }

    public function pdf_transaksi()
    {
        $data['title'] = "Generate Laporan Transaksi ke PDF";

        $tgl_awal = htmlspecialchars($this->input->post('tgl_awal'));
        $tgl_akhir = htmlspecialchars($this->input->post('tgl_akhir'));

        $data['transaksi'] = $this->master->get_transaksi_filter($tgl_awal, $tgl_akhir);
        $html = $this->load->view('masterdata/generate/pdf_transaksi', $data, true);
        return $this->gen_pdf($html);
    }

    public function pdf_penarikan()
    {
        $data['title'] = "Generate Laporan Penarikan ke PDF";

        $tgl_awal = htmlspecialchars($this->input->post('tgl_awal'));
        $tgl_akhir = htmlspecialchars($this->input->post('tgl_akhir'));

        $data['penarikan'] = $this->master->get_penarikan_filter($tgl_awal, $tgl_akhir);
        $html = $this->load->view('masterdata/generate/pdf_penarikan', $data, true);
        return $this->gen_pdf($html);
    }


    // Untuk generate laporan ke excel

    public function excel_siswa()
    {
        header("Content-type: application/vdn-ms-excel");
        header("Content-Disposition: attachment; filename=Laporan_siswa.xls");
        $data['siswa'] = $this->master->get_siswa_join_kelas();
        $this->load->view('masterdata/generate/excel_siswa', $data);
    }

    public function excel_transaksi()
    {
        header("Content-type: application/vdn-ms-excel");
        header("Content-Disposition: attachment; filename=Laporan_transaksi.xls");
        $tgl_awal = htmlspecialchars($this->input->post('tgl_awal'));
        $tgl_akhir = htmlspecialchars($this->input->post('tgl_akhir'));
        $data['transaksi'] = $this->master->get_transaksi_filter($tgl_awal, $tgl_akhir);
        $this->load->view('masterdata/generate/excel_transaksi', $data);
    }

    public function excel_penarikan()
    {
        header("Content-type: application/vdn-ms-excel");
        header("Content-Disposition: attachment; filename=Laporan_penarikan.xls");
        $tgl_awal = htmlspecialchars($this->input->post('tgl_awal'));
        $tgl_akhir = htmlspecialchars($this->input->post('tgl_akhir'));
        $data['penarikan'] = $this->master->get_penarikan_filter($tgl_awal, $tgl_akhir);
        $this->load->view('masterdata/generate/excel_penarikan', $data);
    }
}
