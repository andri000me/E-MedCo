<?php

class Pesanan_Resep extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Resep_model');
    }

    public function index()
    {
        $data['title'] = 'Data Master Pesanan Resep';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['result'] = $this->Resep_model->getAllDataApotek();
        $data['disiapkan'] = $this->Resep_model->getMenunggu();
        $data['siap'] = $this->Resep_model->getSiap();
        $data['selesai'] = $this->Resep_model->getSelesai();

        $this->load->view('layout/apotek/header', $data); // 
        $this->load->view('layout/apotek/sidebar', $data); // 
        $this->load->view('layout/apotek/topbar', $data); // 
        $this->load->view('pages/apotek/pesan-resep', $data); // 
        $this->load->view('layout/apotek/footer', $data); // 
    }

    public function harga($id)
    {
        $data['title'] = 'Data Master Pesanan Resep';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['row'] = $this->Resep_model->getData($id);

        $this->load->view('layout/apotek/header', $data); // 
        $this->load->view('layout/apotek/sidebar', $data); // 
        $this->load->view('layout/apotek/topbar', $data); // 
        $this->load->view('pages/apotek/edit/edit-pesan-resep', $data); // 
        $this->load->view('layout/apotek/footer', $data); //

    }

    public function update($id)
    {
        if ($_FILES == '') {
            $data = array(
                'id' => $this->input->post('id'),
                'harga' => $this->input->post('harga'),
            );
            $this->db->where('id', $id);
            $this->db->update('tb_pesan_resep', $data);
            redirect('Apotek/Pesanan_Resep');
        } else {
            $data = array(
                'id' => $this->input->post('id'),
                'harga' => $this->input->post('harga'),
            );
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil diedit ! </div>');

            $this->db->where('id', $id);
            $this->db->update('tb_pesan_resep', $data);
            redirect('Apotek/Pesanan_Resep');
        }
    }

    public function statusSiap($id)
    {
        $data = array(
            'status' => 2,
        );
        $this->db->where('id', $id);
        $this->db->update('tb_pesan_resep', $data);
        redirect('Apotek/Pesanan_Resep');
    }

    public function statusSelesai($id)
    {
        $data = array(
            'status' => 3,
        );
        $this->db->where('id', $id);
        $this->db->update('tb_pesan_resep', $data);
        redirect('Apotek/Pesanan_Resep');
    }

    public function statusMenunggu($id)
    {
        $data = array(
            'status' => 1,
        );
        $this->db->where('id', $id);
        $this->db->update('tb_pesan_resep', $data);
        redirect('Apotek/Pesanan_Resep');
    }

    public function pdf()
    {
        $data['judul'] = 'Data Master Pesanan Resep';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->library('dompdf_gen');
        $data['result'] = $this->Resep_model->getAllDataApotek('tabel_pesanan_resep');
        $this->load->view('pages/apotek/pdf/pesanan_resep_pdf', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('Laporan Pesanan Resep.pdf', array('Attachment' => 0));
    }
}
