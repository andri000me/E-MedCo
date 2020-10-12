<?php

class Data_Penyakit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Pakar_model');
    }

    public function index()
    {
        $data['title'] = 'Data Master Penyakit';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['result'] = $this->Pakar_model->getAllDataPenyakit();

        $this->load->view('layout/apotek/header', $data); // 
        $this->load->view('layout/dokter/sidebar', $data); // 
        $this->load->view('layout/apotek/topbar', $data); // 
        $this->load->view('pages/dokter/data-penyakit', $data); // 
        $this->load->view('layout/apotek/footer', $data); // 
    }

    public function create()
    {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil ditambah ! </div>');
        $this->Pakar_model->createDataPenyakit();
        redirect('Dokter/Data_Gejala');
    }

    public function edit($id_penyakit)
    {
        $data['title'] = 'Edit Data Master Penyakit';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['row'] = $this->Pakar_model->getDataPenyakit($id_penyakit);

        $this->load->view('layout/apotek/header', $data); // 
        $this->load->view('layout/dokter/sidebar', $data); // 
        $this->load->view('layout/apotek/topbar', $data); // 
        $this->load->view('pages/dokter/edit/edit-data-penyakit', $data); // 
        $this->load->view('layout/apotek/footer', $data); //
    }

    public function update($id_penyakit)
    {
        if ($_FILES == '') {
            $data = array(
                'id_penyakit' => $this->input->post('id_penyakit'),
                'kd_penyakit' => $this->input->post('kd_penyakit'),
                'nama_penyakit' => $this->input->post('nama_penyakit'),
                'penyebab' => $this->input->post('penyebab'),
                'solusi' => $this->input->post('solusi'),
            );
            $this->db->where('id_penyakit', $id_penyakit);
            $this->db->update('tb_penyakit', $data);
            redirect('Dokter/Data_Penyakit');
        } else {
            $data = array(
                'id_penyakit' => $this->input->post('id_penyakit'),
                'kd_penyakit' => $this->input->post('kd_penyakit'),
                'nama_penyakit' => $this->input->post('nama_penyakit'),
                'penyebab' => $this->input->post('penyebab'),
                'solusi' => $this->input->post('solusi'),
            );

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil diedit ! </div>');
            $this->db->where('id_penyakit', $id_penyakit);
            $this->db->update('tb_penyakit', $data);
            redirect('Dokter/Data_Penyakit');
        }
    }

    public function delete($id_penyakit)
    {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data berhasil dihapus ! </div>');
        $this->Pakar_model->deleteDataPenyakit($id_penyakit);
        redirect('Dokter/Data_Gejala');
    }
}
