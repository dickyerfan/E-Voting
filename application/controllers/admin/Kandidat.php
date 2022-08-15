<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kandidat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('KandidatModel');
        if ($this->session->userdata('level') != 'admin') {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Kandidat';
        $data['rows'] = $this->db->get('kandidat')->result();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_topbar');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/kandidat');
        $this->load->view('templates/admin_footer');
    }


    public function edit($id)
    {
        $data['title'] = 'Edit Kandidat';
        $data['rows'] = $this->db->get_where('kandidat', ['id' => $id])->row();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_topbar');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/kandidat_edit', $data);
        $this->load->view('templates/admin_footer');
    }

    public function update()
    {
        $this->KandidatModel->update();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-warning alert-dismissible" style="width:50%">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-warning"></i> Berhasil di Update.!</h4>
          </div>
            ');
            redirect('admin/kandidat');
        }
    }
}
