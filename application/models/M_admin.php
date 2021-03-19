<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_admin extends CI_Model
{

    public function edit_nama()
    {
        $this->db->set('nama', htmlspecialchars($this->input->post('nama')));
        $this->db->where('username', $this->session->userdata('username'));
        if ($this->db->update('tbl_admin')) {
            $this->session->set_flashdata('true', 'Nama berhasil di edit');
            redirect('admin/edit_profile');
        } else {
            $this->session->set_flashdata('false', 'Nama gagal di edit');
            redirect('admin/edit_profile');
        }
    }

    public function edit_telp()
    {
        $this->db->set('no_telp', htmlspecialchars($this->input->post('telp')));
        $this->db->where('username', $this->session->userdata('username'));
        if ($this->db->update('tbl_admin')) {
            $this->session->set_flashdata('true', 'No telp berhasil di edit');
            redirect('admin/edit_profile');
        } else {
            $this->session->set_flashdata('false', 'No telp gagal di edit');
            redirect('admin/edit_profile');
        }
    }

    public function edit_pass()
    {
        $oldpass = htmlspecialchars($this->input->post('pl'));
        $newpass = htmlspecialchars($this->input->post('newpass'));
        $admin = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row();

        if ($oldpass == $newpass) {
            $this->session->set_flashdata('false', 'Password baru tidak boleh sama dengan password lama');
            redirect('admin/edit_password');
        } else if (md5($oldpass) != $admin->password) {
            $this->session->set_flashdata('false', 'Password lama salah');
            redirect('admin/edit_password');
        } else {
            $new_password = md5($newpass);
        }

        $this->db->set('password', $new_password);
        $this->db->where('username', $this->session->userdata('username'));
        if ($this->db->update('tbl_admin')) {
            $this->session->set_flashdata('true', 'Password berhasil di edit');
            redirect('admin/edit_profile');
        } else {
            $this->session->set_flashdata('false', 'Password gagal di edit');
            redirect('admin/edit_profile');
        }
    }

    public function add_admin()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama')),
            'username' => htmlspecialchars($this->input->post('username')),
            'password' => md5(htmlspecialchars($this->input->post('newpass'))),
            'no_telp' => htmlspecialchars($this->input->post('telp'))
        ];

        if ($this->db->insert('tbl_admin', $data)) {
            $this->session->set_flashdata('true', 'Admin baru berhasil di tambahkan');
            redirect('admin/edit_profile');
        } else {
            $this->session->set_flashdata('false', 'Admin baru gagal di tambahkan');
            redirect('admin/edit_profile');
        }
    }

    public function get_Saldo()
    {
        $query = "SELECT SUM(saldo) as jumlah FROM tbl_siswa";
        return $this->db->query($query)->row()->jumlah;
    }

    public function get_Transaksi()
    {
        $query = "SELECT SUM(jumlah) as total FROM tbl_transaksi WHERE status = 1";
        return $this->db->query($query)->row()->total;
    }

    public function get_Penarikan()
    {
        $query = "SELECT SUM(jumlah) as total FROM tbl_penarikan WHERE status = 1";
        return $this->db->query($query)->row()->total;
    }
}
