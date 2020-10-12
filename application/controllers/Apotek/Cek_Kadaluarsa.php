<?php

class Cek_Kadaluarsa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('ProdukMasuk_model');
        $this->load->model('Kadaluarsa_model');
    }

    public function index()
    {
        $data['title'] = 'Data Master Cek Kadaluarsa';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['result'] = $this->ProdukMasuk_model->getAllData2();

        $this->load->view('layout/apotek/header', $data); // 
        $this->load->view('layout/apotek/sidebar', $data); // 
        $this->load->view('layout/apotek/topbar', $data); // 
        $this->load->view('pages/apotek/cek-kadaluarsa', $data); // 
        $this->load->view('layout/apotek/footer', $data); // 
    }

    public function delete($kd_transaksi)
    {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Produk berhasil ditarik ! Silahkan cek menu Kadaluarsa.</div>');
        $this->Kadaluarsa_model->deleteData($kd_transaksi);
        redirect('Apotek/Cek_Kadaluarsa');
    }
}
