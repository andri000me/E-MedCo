<?php

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('html');
        $this->load->library('form_validation');
        $this->load->model('Produk_model');
    }

    public function index()
    {
        $data['title'] = 'Data Master Produk';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['result'] = $this->Produk_model->getAllData2();

        $this->load->view('layout/apotek/header', $data); // 
        $this->load->view('layout/apotek/sidebar', $data); // 
        $this->load->view('layout/apotek/topbar', $data); // 
        $this->load->view('pages/apotek/produk', $data); // 
        $this->load->view('layout/apotek/footer', $data); // 
    }

    public function create()
    {
        
        
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil ditambah ! </div>');
        $this->Produk_model->createData();
        redirect('Apotek/Produk');
    }

    public function edit($id_produk)
    {
        $data['title'] = 'Data Master Produk';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['row'] = $this->Produk_model->getData($id_produk);
        $data['jenis'] = $this->Produk_model->getJenis();

        $this->load->view('layout/apotek/header', $data); // 
        $this->load->view('layout/apotek/sidebar', $data); // 
        $this->load->view('layout/apotek/topbar', $data); // 
        $this->load->view('pages/apotek/edit/edit-produk', $data); // 
        $this->load->view('layout/apotek/footer', $data); //
    }


    public function update($id_produk)
    {
        if ($_FILES == '') {
            $data = array(
                'kode_produk' => $this->input->post('kode_produk'),
                'nama_produk' => $this->input->post('nama_produk'),
                'id_jenis' => $this->input->post('id_jenis'),
                'harga_produk' => $this->input->post('harga_produk'),
                'stok_produk' => $this->input->post('stok_produk'),
                'deskripsi_produk' => $this->input->post('deskripsi_produk'),
            );
            $this->db->where('id_produk', $id_produk);
            $this->db->update('tb_produk', $data);
            redirect('Apotek/Produk');
        } else {
            $data = array(
                'kode_produk' => $this->input->post('kode_produk'),
                'nama_produk' => $this->input->post('nama_produk'),
                'id_jenis' => $this->input->post('nama_jenis'),
                'harga_produk' => $this->input->post('harga_produk'),
                'img_produk' => $this->Produk_model->_uploadImage(),
                'stok_produk' => $this->input->post('stok_produk'),
                'deskripsi_produk' => $this->input->post('deskripsi_produk'),
            );
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil diedit ! </div>');

            $this->db->where('id_produk', $id_produk);
            $this->db->update('tb_produk', $data);
            redirect('Apotek/Produk');
        }
    }

    public function delete($id_produk)
    {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data berhasil dihapus ! </div>');
        $this->Produk_model->deleteData($id_produk);
        redirect('Apotek/Produk');
    }

    public function pdf()
    {
        $data['judul'] = 'Data Master Produk';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->library('dompdf_gen');
        $data['produk'] = $this->Produk_model->getAllData2('tb_produk');
        $this->load->view('pages/apotek/pdf/produk_pdf', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('Laporan Produk.pdf', array('Attachment' => 0));
    }
}
