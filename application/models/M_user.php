<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_user extends CI_Model
{
    public function get_transaksi_limit()
    {
        $nisn = $this->session->userdata('nisn');
        $this->db->limit(5);
        $this->db->order_by('id_transaksi', 'DESC');
        return $this->db->get_where('tbl_transaksi', ['nisn' => $nisn])->result();
    }

    public function get_transaksi_nisn($nisn)
    {
        $this->db->order_by('id_transaksi', 'DESC');
        return $this->db->get_where('tbl_transaksi', ['nisn' => $nisn])->result();
    }

    public function get_penarikan_nisn($nisn)
    {
        $this->db->order_by('id_penarikan', 'DESC');
        return $this->db->get_where('tbl_penarikan', ['nisn' => $nisn])->result();
    }

    public function get_pengumuman()
    {
        $query = "SELECT * FROM tbl_pengumuman INNER JOIN tbl_admin ON tbl_pengumuman.id_admin = tbl_admin.id_admin WHERE tbl_pengumuman.status = 1 ORDER BY tbl_pengumuman.id_pengumuman DESC";
        return $this->db->query($query)->result();
    }
}
