<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'admin') {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['total_users'] = $this->db->get('user')->num_rows();
        $data['total_suara'] = $this->db->get('suara')->num_rows();

        $data['kandidat'] = $this->db->get('kandidat')->result();
        $data['kandidat1'] = $this->db->get_where('suara', ['nama_kandidat' => 'calon ke 1'])->num_rows();
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row();
        $data['kandidat2'] = $this->db->get_where('suara', ['nama_kandidat' => 'calon ke 2'])->num_rows();
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row();
        $data['kandidat3'] = $this->db->get_where('suara', ['nama_kandidat' => 'calon ke 3'])->num_rows();
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_topbar');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/admin_footer');
    }
}
