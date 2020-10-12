<?php

class Konsultasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Konsultasi_model');
    }

    public function index()
    {
        $data['h2'] = 'Riwayat Jadwal Konsultasi ';
        $data['title'] = 'Jadwal Konsultasi';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['result'] = $this->Konsultasi_model->getAllDataUser();

        $this->load->view('layout/user/header', $data); //
        $this->load->view('pages/user/riwayat/konsultasi', $data); // 
        $this->load->view('layout/user/footer', $data); // 
    }

    public function hapus_jadwal($id)
    {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Janji berhasil dihapus </div>');
        $this->Konsultasi_model->deleteData($id);
        redirect('User/Riwayat/Konsultasi');
    }

}