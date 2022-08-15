<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VisimisiModel extends CI_Model
{
    public function getVisimisi()
    {
        $this->db->select('*, visi_misi.id as id_visimisi');
        $this->db->from('visi_misi');
        $this->db->join('kandidat', 'kandidat.id = visi_misi.id_kandidat');
        return $this->db->get();
    }

    public function simpan()
    {
        $data = [
            'id_kandidat' => $this->input->post('id_kandidat'),
            'visi' => $this->input->post('visi', true),
            'misi' => $this->input->post('misi', true)
        ];
        $this->db->insert('visi_misi', $data);
    }

    public function update()
    {
        $data = [
            'id_kandidat' => $this->input->post('id_kandidat'),
            'visi' => $this->input->post('visi', true),
            'misi' => $this->input->post('misi', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('visi_misi', $data);
    }
}
