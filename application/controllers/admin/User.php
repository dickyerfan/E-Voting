<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        if ($this->session->userdata('level') != 'admin') {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'User';
        $data['rows'] = $this->UserModel->getUser()->result();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_topbar');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/user');
        $this->load->view('templates/admin_footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah User';
        $data['kelas'] = $this->db->get('kelas')->result();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_topbar');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/user_tambah',);
        $this->load->view('templates/admin_footer');
    }

    public function simpan()
    {
        $this->UserModel->simpan();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-info alert-dismissible" style="width:50%">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-warning"></i> User Berhasil di buat.!</h4>
          </div>
            ');
            redirect('admin/user');
        }
    }


    public function edit($id)
    {
        $data['title'] = 'Edit User';
        $data['rows'] = $this->db->get_where('user', ['id' => $id])->row();
        $data['kelas'] = $this->db->get('kelas')->result();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_topbar');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/user_edit', $data);
        $this->load->view('templates/admin_footer');
    }

    public function update()
    {
        $this->UserModel->update();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-warning alert-dismissible" style="width:50%">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-warning"></i> Berhasil di Update.!</h4>
          </div>
            ');
            redirect('admin/user');
        }
    }

    public function hapus($id)
    {
        $this->db->delete('user', ['id' => $id]);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible" style="width:50%">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-warning"></i> Berhasil di Hapus.!</h4>
          </div>
            ');
            redirect('admin/user');
        }
    }
}
