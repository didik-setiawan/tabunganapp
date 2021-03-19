<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
    public function index()
    {
        for_auth();
        $this->form_validation->set_rules('username', 'Username', 'required|trim', ['required' => 'Username harus di isi']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'Password harus di isi']);
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/index');
        } else {
            $this->pv_login();
        }
    }

    private function pv_login()
    {
        $username = htmlspecialchars($this->input->post('username'));
        $password = md5(htmlspecialchars($this->input->post('password')));
        $nis = htmlspecialchars($this->input->post('password'));

        $admin = $this->db->get_where('tbl_admin', ['username' => $username])->row();
        $user = $this->db->get_where('tbl_siswa', ['nisn' => $username])->row();

        if ($admin) {
            if ($admin->password == $password) {
                $this->session->set_userdata('username', $username);
                redirect('admin');
            } else {
                $this->session->set_flashdata('salah', 'Password salah. Coba cek kembali');
                redirect('auth');
            }
        } elseif ($user) {
            if ($user->nis == $nis) {
                $this->session->set_userdata('nisn', $username);
                redirect('user');
            } else {
                $this->session->set_flashdata('salah', 'NISN atau NIS salah. Coba cek kembali');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('salah', 'Username/NISN tidak terdaftar');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
