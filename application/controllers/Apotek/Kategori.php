<?php

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Jenis_model');
    }

    public function index()
    {
        $data['title'] = 'Data Master Kategori';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['result'] = $this->Jenis_model->getAllData();


        $this->load->view('layout/apotek/header', $data); // 
        $this->load->view('layout/apotek/sidebar', $data); // 
        $this->load->view('layout/apotek/topbar', $data); // 
        $this->load->view('pages/apotek/kategori', $data); // 
        $this->load->view('layout/apotek/footer', $data); // 
    }

    public function create()
    {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil ditambah ! </div>');
        $this->Jenis_model->createData();
        redirect('Apotek/Kategori');
    }

    public function Edit($id_jenis)
    {
        $data['title'] = 'Data Master Kategori';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['row'] = $this->Jenis_model->getData($id_jenis);

        $this->load->view('layout/apotek/header', $data); // 
        $this->load->view('layout/apotek/sidebar', $data); // 
        $this->load->view('layout/apotek/topbar', $data); // 
        $this->load->view('pages/apotek/edit/edit-kategori', $data); // 
        $this->load->view('layout/apotek/footer', $data); //
    }

    public function Update($id_jenis)
    {
        if ($_FILES == '') {
            $data = array(
                'id_jenis' => $this->input->post('id_jenis'),
                'nama_jenis' => $this->input->post('nama_jenis'),
                'kode_jenis' => $this->input->post('kode_jenis'),
            );
            $this->db->where('id_jenis', $id_jenis);
            $this->db->update('tb_kategori', $data);
            redirect('Apotek/Kategori');
        } else {
            $data = array(
                'id_jenis' => $this->input->post('id_jenis'),
                'nama_jenis' => $this->input->post('nama_jenis'),
                'kode_jenis' => $this->input->post('kode_jenis'),
            );
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil diedit ! </div>');

            $this->db->where('id_jenis', $id_jenis);
            $this->db->update('tb_kategori', $data);
            redirect('Apotek/Kategori');
        }
    }

    public function Delete($id_jenis)
    {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data berhasil dihapus ! </div>');
        $this->Jenis_model->deleteData($id_jenis);
        redirect('Apotek/Kategori');
    }
}
