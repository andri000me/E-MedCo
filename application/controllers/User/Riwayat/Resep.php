<?php

class Resep extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Resep_model');
    }

    public function index()
    {
        $data['h2'] = 'Riwayat Resep Obat';
        $data['title'] = 'Resep Obat';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['result'] = $this->Resep_model->getAllDataUser();

        $this->load->view('layout/user/header', $data); //
        $this->load->view('pages/user/riwayat/resep', $data); // 
        $this->load->view('layout/user/footer', $data); // 
    }

    public function create()
    {
        $this->Request_model->createData();
        redirect('User/Obat');
    }

}