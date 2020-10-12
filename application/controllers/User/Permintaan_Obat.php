<?php

class Permintaan_Obat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('ProdukUser_model');
        $this->load->model('Request_model');
    }

    public function index()
    {
        $data['h2'] = 'Request Persediaan Obat';
        $data['title'] = 'Permintaan Obat';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['produk'] = $this->ProdukUser_model->get_produk();

        $this->load->view('layout/user/header', $data); //
        $this->load->view('pages/user/permintaan-obat', $data); // 
        $this->load->view('layout/user/footer', $data); // 
    }

    public function create()
    {
        $this->Request_model->createData();
        redirect('User/Obat');
    }

}