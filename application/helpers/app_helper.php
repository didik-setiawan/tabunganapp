<?php
function login_admin()
{
    $app = get_instance();
    if ($app->session->userdata('nisn')) {
        redirect('user');
    } elseif (!$app->session->userdata('username')) {
        redirect('auth');
    }
}

function login_user()
{
    $app = get_instance();
    if ($app->session->userdata('username')) {
        redirect('admin');
    } elseif (!$app->session->userdata('nisn')) {
        redirect('auth');
    }
}

function for_auth()
{
    $app = get_instance();
    if ($app->session->userdata('username')) {
        redirect('admin');
    } elseif ($app->session->userdata('nisn')) {
        redirect('user');
    }
}

function edit_siswa($id)
{
    $app = get_instance();
    $siswa = $app->db->get_where('tbl_siswa', ['md5(nisn)' => $id])->row();
    if ($id == null) {
        redirect('masterdata/siswa');
    } elseif (md5($siswa->nisn) != $id) {
        redirect('masterdata/siswa');
    }
}
