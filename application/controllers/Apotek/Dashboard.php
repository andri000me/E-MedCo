<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Pemesanan_model');
        $this->load->model('Dashboard_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menunggu'] = $this->Pemesanan_model->getMenunggu();
        $data['selesai'] = $this->Pemesanan_model->getselesai();
        $data['t_apotek'] = $this->Dashboard_model->getApotek();

        $this->load->view('layout/apotek/header', $data); // 
        $this->load->view('layout/apotek/sidebar', $data); // 
        $this->load->view('layout/apotek/topbar', $data); // 
        $this->load->view('pages/apotek/dashboard', $data); // 
        $this->load->view('layout/apotek/footer', $data); // 
    }
}
