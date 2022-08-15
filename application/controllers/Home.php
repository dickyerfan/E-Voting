<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('HomeModel');
    }

    public function index()
    {
        $data['title'] = 'Home';
        $data['kandidat'] = $this->db->get('kandidat')->result();
        $data['kandidat1'] = $this->db->get_where('suara', ['nama_kandidat' => 'calon ke 1'])->num_rows();
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row();
        $data['kandidat2'] = $this->db->get_where('suara', ['nama_kandidat' => 'calon ke 2'])->num_rows();
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row();
        $data['kandidat3'] = $this->db->get_where('suara', ['nama_kandidat' => 'calon ke 3'])->num_rows();
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row();

        $this->load->view('templates/header', $data);
        $this->load->view('home', $data);
        $this->load->view('templates/footer');
    }

    public function visimisi($id_kandidat)
    {
        $data['title'] = 'Visi & Misi';
        $data['kandidat'] = $this->db->get_where('kandidat', ['id' => $id_kandidat])->row();
        $data['visimisi'] = $this->db->get_where('visi_misi', ['id_kandidat' => $id_kandidat])->row();

        $this->load->view('templates/header', $data);
        $this->load->view('visimisi', $data);
        $this->load->view('templates/footer');
    }

    public function pilih_kandidat()
    {
        $this->HomeModel->pilih_kandidat();
        $this->HomeModel->update_status_user();
        if ($this->db->affected_rows() > 0) {
            $result = ['success' => true];
        } else {
            $result = ['success' => false];
        }

        echo json_encode($result);
    }
}
