<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        login_admin();
        $this->load->model('M_admin', 'admin');
    }

    public function index()
    {
        $data['title'] = 'Dashboard Admin';
        $data['pengguna'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row();
        $data['saldo'] = $this->admin->get_Saldo();
        $data['transaksi'] = $this->admin->get_Transaksi();
        $data['penarikan'] = $this->admin->get_Penarikan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
    }

    public function edit_profile()
    {
        $data['title'] = 'Edit Profil';
        $data['pengguna'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/edit_profile');
        $this->load->view('templates/footer');
    }

    public function edit_nama()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[3]');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('false', 'Kesalahan penulisan harap coba kembali');
            redirect('admin/edit_profile');
        } else {
            $this->admin->edit_nama();
        }
    }

    public function edit_telp()
    {
        $data['title'] = 'Edit No Telp';
        $data['pengguna'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row();
        $this->load->view('templates/header', $data);

        $this->form_validation->set_rules('telp', 'telp', 'required|trim|min_length[10]|max_length[13]|numeric|is_unique[tbl_admin.no_telp]', [
            'required' => 'No telp harus di isi',
            'min_length' => 'No telp min 10 digit',
            'max_length' => 'No telp max 13 digit',
            'is_unique' => 'No telp sudah terdaftar, coba menggunakan no telp lain',
            'numeric' => 'No telp harus angka'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/edit_telp');
            $this->load->view('templates/footer');
        } else {
            $this->admin->edit_telp();
        }
    }

    public function edit_password()
    {
        $data['title'] = 'Edit Password';
        $data['pengguna'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row();
        $this->load->view('templates/header', $data);

        $this->form_validation->set_rules('pl', 'password lama', 'required|trim', ['required' => 'Password lama harus di isi']);
        $this->form_validation->set_rules('newpass', 'Password baru', 'required|trim|min_length[5]|matches[repeat]', [
            'required' => 'Password baru harus di isi',
            'min_length' => 'Password baru min 5 karakter',
            'matches' => 'Password baru tidak sama dengan Ulangi password baru'
        ]);
        $this->form_validation->set_rules('repeat', 'Ulangi password baru', 'required|trim|matches[newpass]', [
            'required' => 'Ulangi password lama harus di isi',
            'matches' => 'Ulangi password baru tidak sama dengan Password baru'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/edit_pass');
            $this->load->view('templates/footer');
        } else {
            $this->admin->edit_pass();
        }
    }

    public function add_new_admin()
    {
        $data['title'] = 'Tambah Admin Baru';
        $data['pengguna'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[3]', [
            'required' => 'Nama harus di isi',
            'min_length' => 'Nama min 3 huruf'
        ]);
        $this->form_validation->set_rules('telp', 'No telp', 'required|trim|min_length[10]|max_length[13]|numeric|is_unique[tbl_admin.no_telp]', [
            'required' => 'No telp harus di isi',
            'min_length' => 'No telp min 10 digit',
            'max_length' => 'No telp max 13 digit',
            'is_unique' => 'No telp sudah terdaftar, coba menggunakan no telp lain',
            'numeric' => 'No telp harus angka'
        ]);
        $this->form_validation->set_rules('username', 'username', 'required|trim|min_length[5]|is_unique[tbl_admin.username]', [
            'required' => 'Username harus di isi',
            'min_length' => 'Username min 5 karakater',
            'is_unique' => 'Username sudah di gunakan. coba menggunakan username lain'
        ]);
        $this->form_validation->set_rules('newpass', 'Password baru', 'required|trim|min_length[5]|matches[repass]', [
            'required' => 'Password baru harus di isi',
            'min_length' => 'Password baru min 5 karakter',
            'matches' => 'Password baru tidak sama dengan Ulangi password baru'
        ]);
        $this->form_validation->set_rules('repass', 'Ulangi Password', 'required|trim|matches[newpass]', [
            'required' => 'Ulangi password lama harus di isi',
            'matches' => 'Ulangi password baru tidak sama dengan Password baru'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/add_admin');
            $this->load->view('templates/footer');
        } else {
            $this->admin->add_admin();
        }
    }
}
