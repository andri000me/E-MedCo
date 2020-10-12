<?php

class Pemesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Pemesanan_model');
    }

    public function index()
    {
        $data['title'] = 'Data Master Pemesanan';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['result'] = $this->Pemesanan_model->getAllData();
        $data['menunggu'] = $this->Pemesanan_model->getMenunggu();
        $data['selesai'] = $this->Pemesanan_model->getselesai();

        $this->load->view('layout/apotek/header', $data); // 
        $this->load->view('layout/apotek/sidebar', $data); // 
        $this->load->view('layout/apotek/topbar', $data); // 
        $this->load->view('pages/apotek/pemesanan', $data); // 
        $this->load->view('layout/apotek/footer', $data); // 
    }

    public function status1($id)
    {
        $data = array(
            'status' => 2,
        );
        $this->db->where('id', $id);
        $this->db->update('tb_transaksi', $data);
        redirect('Apotek/Pemesanan');
    }

    public function status2($id)
    {
        $data = array(
            'status' => 1,
        );
        $this->db->where('id', $id);
        $this->db->update('tb_transaksi', $data);
        redirect('Apotek/Pemesanan');
    }

    public function pdf()
    {
        $data['judul'] = 'Laporan Pemesanan';
        $data['user'] = $this->db->get_where('tabel_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->library('dompdf_gen');
        $data['pemesanan'] = $this->Pemesanan_Model->getAllData('tb_transaksi');
        $this->load->view('pages/apotek/pdf/pemesanan_pdf', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('Laporan Pemesanan.pdf', array('Attachment' => 0));
    }
}
