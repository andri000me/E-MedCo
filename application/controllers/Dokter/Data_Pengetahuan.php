<?php

class Data_Pengetahuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Pakar_model');
    }

    public function index()
    {
        $data['title'] = 'Data Master Pengetahuan';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['result'] = $this->Pakar_model->getAllDataPengetahuan();


        $this->load->view('layout/apotek/header', $data); // 
        $this->load->view('layout/dokter/sidebar', $data); // 
        $this->load->view('layout/apotek/topbar', $data); // 
        $this->load->view('pages/dokter/data-pengetahuan', $data); // 
        $this->load->view('layout/apotek/footer', $data); // 
    }

    public function create()
    {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil ditambah ! </div>');
        $this->Pakar_model->createDataPengetahuan();
        redirect('Dokter/Data_Gejala');
    }

    public function edit($id_pengetahuan)
    {
        $data['title'] = 'Edit Data Master Pengetahuan';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['row'] = $this->Pakar_model->getDataPengetahuan($id_pengetahuan);

        $this->load->view('layout/apotek/header', $data); // 
        $this->load->view('layout/dokter/sidebar', $data); // 
        $this->load->view('layout/apotek/topbar', $data); // 
        $this->load->view('pages/dokter/edit/edit-data-pengetahuan', $data); // 
        $this->load->view('layout/apotek/footer', $data); //
    }

    public function update($id_pengetahuan)
    {
        if ($_FILES == '') {
            $data = array(
                'kd_pengetahuan' => $this->input->post('kd_pengetahuan'),
                'kd_penyakit' => $this->input->post('kd_penyakit'),
                'kd_gejala' => $this->input->post('kd_gejala'),
                'pertanyaan' => $this->input->post('pertanyaan'),
            );
            $this->db->where('id_pengetahuan', $id_pengetahuan);
            $this->db->update('tb_pengetahuan', $data);
            redirect('Dokter/Data_Pengetahuan');
        } else {
            $data = array(
                'kd_pengetahuan' => $this->input->post('kd_pengetahuan'),
                'kd_penyakit' => $this->input->post('kd_penyakit'),
                'kd_gejala' => $this->input->post('kd_gejala'),
                'pertanyaan' => $this->input->post('pertanyaan'),
            );

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil diedit ! </div>');
            $this->db->where('id_pengetahuan', $id_pengetahuan);
            $this->db->update('tb_penyakit', $data);
            redirect('Dokter/Data_Pengetahuan');
        }
    }

    public function delete($id_pengetahuan)
    {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data berhasil dihapus ! </div>');
        $this->Pakar_model->deleteDataGejala($id_pengetahuan);
        redirect('Dokter/Data_Gejala');
    }
}
