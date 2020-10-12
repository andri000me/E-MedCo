<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('ProdukUser_model');
        $this->load->model('ApotekUser_model');
    }

    public function index()
    {
        $data['title'] = 'Home';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['produk'] = $this->ProdukUser_model->get_produk();

        $this->load->view('layout/user/header-1', $data); //
        $this->load->view('pages/user/home', $data); // 
        $this->load->view('layout/user/footer', $data); // 
    }

    public function Detail($kd_produk = NULL, $kd_apotek = NULL)
    {
        $data['title'] = 'Cari Obat';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['listproduk'] = $this->ProdukUser_model->get_produk($kd_produk, $kd_apotek);
        $data['produk'] = $this->ProdukUser_model->get_produk();

        $this->load->view('layout/user/header', $data); //
        $this->load->view('pages/user/obat/detail-obat', $data); // 
        $this->load->view('layout/user/footer', $data); //

        if (empty($data['listproduk'])) {
            show_404();
        }
    }

    public function Pesan($kd_produk = NULL)
    {
        $data['title'] = 'Pesan Obat';
        $data['h2'] = 'Pesan Obat';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['row'] = $this->ProdukUser_model->get_pesanan($kd_produk);

        $this->load->view('layout/user/header', $data); //
        $this->load->view('pages/user/obat/pesan-obat', $data); // 
        $this->load->view('layout/user/footer', $data); //

        if (empty($data['row'])) {
            show_404();
        }
    }

    public function create()
    {
        $this->ProdukUser_model->CreateData();
        redirect('User/Obat');
    }
}
