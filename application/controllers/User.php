<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        login_user();
        $this->load->model('M_user', 'user');
    }

    public function index()
    {
        $data['title'] = "Dasboard User";
        $data['pengguna'] = $this->db->get_where('tbl_siswa', ['nisn' => $this->session->userdata('nisn')])->row();
        $data['transaksi'] = $this->user->get_transaksi_limit();
        $this->load->view('templates-home/header', $data);
        $this->load->view('user/index');
        $this->load->view('templates-home/footer');
    }

    public function profile()
    {
        $data['title'] = "Profil Siswa";
        $data['pengguna'] = $this->db->get_where('tbl_siswa', ['nisn' => $this->session->userdata('nisn')])->row();
        $this->load->view('templates-home/header', $data);
        $this->load->view('user/profile');
        $this->load->view('templates-home/footer');
    }

    public function transaksi()
    {
        $data['title'] = "Data Transaksi";
        $data['pengguna'] = $this->db->get_where('tbl_siswa', ['nisn' => $this->session->userdata('nisn')])->row();
        $data['transaksi'] = $this->user->get_transaksi_nisn($data['pengguna']->nisn);
        $this->load->view('templates-home/header', $data);
        $this->load->view('user/transaksi');
        $this->load->view('templates-home/footer');
    }

    public function penarikan()
    {
        $data['title'] = "Data Penarikan";
        $data['pengguna'] = $this->db->get_where('tbl_siswa', ['nisn' => $this->session->userdata('nisn')])->row();
        $data['penarikan'] = $this->user->get_penarikan_nisn($data['pengguna']->nisn);
        $this->load->view('templates-home/header', $data);
        $this->load->view('user/penarikan');
        $this->load->view('templates-home/footer');
    }

    public function pengumuman()
    {
        $data['title'] = "Pengumuman";
        $data['pengguna'] = $this->db->get_where('tbl_siswa', ['nisn' => $this->session->userdata('nisn')])->row();
        $data['pengumuman'] = $this->user->get_pengumuman();
        $this->load->view('templates-home/header', $data);
        $this->load->view('user/pengumuman');
        $this->load->view('templates-home/footer');
    }
}
