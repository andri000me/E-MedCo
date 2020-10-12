<?php

class Permintaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Request_model');
    }

    public function index()
    {
        $data['title'] = 'Data Master Permintaan';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['result'] = $this->Request_model->getAllData();


        $this->load->view('layout/apotek/header', $data); // 
        $this->load->view('layout/apotek/sidebar', $data); // 
        $this->load->view('layout/apotek/topbar', $data); // 
        $this->load->view('pages/apotek/permintaan', $data); // 
        $this->load->view('layout/apotek/footer', $data); // 
    }

    public function delete($id)
    {
        $this->Request_model->deleteData($id);
        redirect('Apotek/Permintaan');
    }

    public function pdf()
    {
        $data['judul'] = 'Data Master Permintaan';
        $data['username'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->library('dompdf_gen');
        $data['permintaan'] = $this->Request_model->getAllData('tb_request');
        $this->load->view('apotek/pdf/permintaan_pdf', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('Laporan Permintaan.pdf', array('Attachment' => 0));
        // Laporan Permintaan adalah nama file
    }
}
