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
        $data['title'] = 'Data Master Gejala';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['result'] = $this->Konsultasi_model->getAllDataDokter();

        $this->load->view('layout/apotek/header', $data); // 
        $this->load->view('layout/dokter/sidebar', $data); // Dokter
        $this->load->view('layout/apotek/topbar', $data); // 
        $this->load->view('pages/dokter/konsultasi', $data); // Dokter
        $this->load->view('layout/apotek/footer', $data); // 
    }

    public function statusa($id)
    {
        $data = array(
            'status' => 2,
        );
        $this->db->where('id', $id);
        $this->db->update('tb_jadwal_konsul', $data);
        redirect('Dokter/Konsultasi');
    }

    public function statusb($id)
    {
        $data = array(
            'status' => 1,
        );
        $this->db->where('id', $id);
        $this->db->update('tb_jadwal_konsul', $data);
        redirect('Dokter/Konsultasi');
    }
}
