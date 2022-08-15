<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Auth';
        $data['kelas'] = $this->db->get('kelas')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('auth', $data);
        $this->load->view('templates/footer');
    }

    public function registrasi()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
            'required' => '%s masih kosong'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[user.email]', [
            'required' => '%s masih kosong',
            'is_unique' => '%s sudah ada'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => '%s masih kosong'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = [
                'id_kelas' => $this->input->post('id_kelas', true),
                'nama' => $this->input->post('nama', true),
                'email' => $this->input->post('email', true),
                'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
                'level' => 'siswa'
            ];

            $this->db->insert('user', $data);
            if ($this->db->affected_rows() > 0) {
                echo "<script>
                alert('Akun Berhasil di registrasi');
                window.location.href = '" . site_url('auth') . "';
                </script>";
            }
        }
    }

    public function login()
    {
        $cek_email = $this->db->get_where('user', ['email' => $this->input->post('email1', true)])->row();

        if ($cek_email) {
            //jika emailnya ada
            //lalu cek password
            if (password_verify($this->input->post('password1'), $cek_email->password)) {
                //jika password sama
                if ($cek_email->level == 'admin') { //admin
                    $data_session = [
                        'id' => $cek_email->id,
                        'level' => $cek_email->level,
                        'nama' => $cek_email->nama,
                    ];
                    $this->session->set_userdata($data_session);
                    $this->session->set_flashdata('info', '<div class="alert bg-maroon" role="alert">Selamat, Anda Berhasil Login</div>');
                    redirect('admin/dashboard');
                } else { // siswa
                    $data_session = [
                        'id' => $cek_email->id,
                        'level' => $cek_email->level,
                        'nama' => $cek_email->nama,
                    ];
                    $this->session->set_userdata($data_session);
                    redirect('home');
                }
            } else {
                //jika password tidak ada
                //     echo "<script>
                // alert('Password Anda Salah');
                // window.location.href = '" . site_url('auth') . "';
                // </script>";
                $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Login Gagal, Password Anda Salah.!</div>');
                redirect('Auth');
            }
        } else {
            //jika email tidak ada
            // echo "<script>
            // alert('Email Anda Salah');
            // window.location.href = '" . site_url('auth') . "';
            // </script>";
            $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Login Gagal, Email Anda Salah.!</div>');
            redirect('Auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('nama');
        $this->session->set_flashdata('info', '<div class="alert alert-primary" role="alert">Selamat, Anda Berhasil Logout</div>');
        redirect('auth');
    }
}
