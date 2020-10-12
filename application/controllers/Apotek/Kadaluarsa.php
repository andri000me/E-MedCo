<?php

class Kadaluarsa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Kadaluarsa_model');
    }

    public function index()
    {
        $data['title'] = 'Data Master Kadaluarsa';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['result'] = $this->Kadaluarsa_model->getKadaluarsa();

        $this->load->view('layout/apotek/header', $data); // 
        $this->load->view('layout/apotek/sidebar', $data); // 
        $this->load->view('layout/apotek/topbar', $data); // 
        $this->load->view('pages/apotek/kadaluarsa', $data); // 
        $this->load->view('layout/apotek/footer', $data); // 
    }

    public function pdf()
    {
        $data['judul'] = 'Laporan Kadaluarsa';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->library('dompdf_gen');
        $data['result'] = $this->Kadaluarsa_Model->getKadaluarsa('tb_kadaluarsa');
        $this->load->view('pages/apotek/pdf/kadaluarsa_pdf', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('Laporan Kadaluarsa.pdf', array('Attachment' => 0));
    }
}
