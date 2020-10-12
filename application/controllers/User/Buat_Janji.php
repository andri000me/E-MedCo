<?php

class Buat_Janji extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Konsultasi_model');
    }

    public function index()
    {
        $data['h2'] = 'Buat Jadwal Dengan Dokter';
        $data['title'] = 'Buat Jadwal Konsultasi';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('layout/user/header', $data); //
        $this->load->view('pages/user/diagnosa/buat-janji', $data); // 
        $this->load->view('layout/user/footer', $data); // 
    }

    public function create()
    {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Janji berhasil dibuat, silahkan tunggu persetujuan dokter </div>');
        $this->Konsultasi_model->createData();
        redirect('User/Riwayat/Konsultasi');
    }

    public function hapus($id)
    {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Janji berhasil dihapus </div>');
        $this->Konsultasi_model->deleteData($id);
        redirect('User/Riwayat/Konsultasi');
    }

    public function edit($id)
    {
        $data['h2'] = 'Jadwal Konsultasi';
        $data['judul'] = 'Jadwal Konsultasi';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['row'] = $this->Konsultasi_model->getData($id);

        $this->load->view('layout/user/header-1', $data); //
        $this->load->view('pages/user/konsultasi/edit', $data); // 
        $this->load->view('layout/user/footer', $data); // 
    }
}
