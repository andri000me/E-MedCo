<?php

class Data_Gejala extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Pakar_model');
    }

    public function index()
    {
        $data['title'] = 'Data Master Gejala';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['result'] = $this->Pakar_model->getAllDataGejala();


        $this->load->view('layout/apotek/header', $data); // 
        $this->load->view('layout/dokter/sidebar', $data); // 
        $this->load->view('layout/apotek/topbar', $data); // 
        $this->load->view('pages/dokter/data-gejala', $data); // 
        $this->load->view('layout/apotek/footer', $data); // 
    }

    public function create()
    {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil ditambah ! </div>');
        $this->Pakar_model->createDataGejala();
        redirect('Dokter/Data_Gejala');
    }

    public function edit($id_gejala)
    {
        $data['title'] = 'Edit Data Master Gejala';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['row'] = $this->Pakar_model->getDataGejala($id_gejala);

        $this->load->view('layout/apotek/header', $data); // 
        $this->load->view('layout/dokter/sidebar', $data); // 
        $this->load->view('layout/apotek/topbar', $data); // 
        $this->load->view('pages/dokter/edit/edit-data-gejala', $data); // 
        $this->load->view('layout/apotek/footer', $data); //
    }

    public function update($id_gejala)
    {
        if ($_FILES == '') {
            $data = array(
                'kd_gejala' => $this->input->post('kd_gejala'),
                'nama_gejala' => $this->input->post('nama_gejala'),
                'poin_gejala' => $this->input->post('poin_gejala'),
            );
            $this->db->where('id_gejala', $id_gejala);
            $this->db->update('tb_gejala', $data);
            redirect('Dokter/Data_Gejala');
        } else {
            $data = array(
                'kd_gejala' => $this->input->post('kd_gejala'),
                'nama_gejala' => $this->input->post('nama_gejala'),
                'poin_gejala' => $this->input->post('poin_gejala'),
            );
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil diedit ! </div>');
            $this->db->where('id_gejala', $id_gejala);
            $this->db->update('tb_gejala', $data);
            redirect('Dokter/Data_Gejala');
        }
    }

    public function delete($id_gejala)
    {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data berhasil dihapus ! </div>');
        $this->Pakar_model->deleteDataGejala($id_gejala);
        redirect('Dokter/Data_Gejala');
    }
}
