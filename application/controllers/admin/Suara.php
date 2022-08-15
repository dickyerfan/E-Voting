<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suara extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SuaraModel');
        if ($this->session->userdata('level') != 'admin') {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Suara';
        $data['rows'] = $this->SuaraModel->getSuara()->result();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_topbar');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/suara');
        $this->load->view('templates/admin_footer');
    }

    public function hapus($id)
    {
        $this->db->delete('suara', ['id' => $id]);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-warning alert-dismissible" style="width:50%">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-warning"></i> Berhasil dihapus.!</h4>
            
          </div>
            ');
            redirect('admin/suara');
        }
    }
}
