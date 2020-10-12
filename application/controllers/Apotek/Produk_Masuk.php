<?php

class Produk_Masuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('ProdukMasuk_model');
    }

    public function index()
    {
        $data['title'] = 'Data Master Produk Masuk';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['result'] = $this->ProdukMasuk_model->getAllData();
        $data['produk'] = $this->ProdukMasuk_model->getProduk();

        $this->load->view('layout/apotek/header', $data); // 
        $this->load->view('layout/apotek/sidebar', $data); // 
        $this->load->view('layout/apotek/topbar', $data); // 
        $this->load->view('pages/apotek/produk-masuk', $data); // 
        $this->load->view('layout/apotek/footer', $data); // 
    }

    public function create()
    {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil ditambah ! </div>');
        $this->ProdukMasuk_model->createData();
        redirect('Apotek/Produk_Masuk');
    }

    public function pdf()
    {
        $data['judul'] = 'Data Master Produk Masuk';
        $data['user'] = $this->db->get_where('tabel_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->library('dompdf_gen');
        $data['result'] = $this->Produk_Masuk_Model->getAllData('tb_masuk');
        $this->load->view('apotek/pdf/produk_masuk_pdf', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('Laporan Produk Masuk.pdf', array('Attachment' => 0));
    }
}
