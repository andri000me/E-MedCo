<?php

class Pemesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Histori_model');
    }

    public function index()
    {
        $data['h2'] = 'Riwayat Pemesanan';
        $data['title'] = 'Pemesanan Obat';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['result'] = $this->Histori_model->getAllData();

        $this->load->view('layout/user/header', $data); //
        $this->load->view('pages/user/riwayat/pemesanan', $data); // 
        $this->load->view('layout/user/footer', $data); // 
    }

    public function Upload($id)
    {
        $data['h2'] = 'Upload Pembayaran Pemesanan Obat';
        $data['title'] = 'Upload Pembayaran';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['row'] = $this->Histori_model->getData($id);

        $this->load->view('layout/user/header', $data); //
        $this->load->view('pages/user/riwayat/upload-pemesanan', $data); // 
        $this->load->view('layout/user/footer', $data); // 
    }

    public function Update($id)
    {
        if ($_FILES == '') {
            $data = array(
                'id' => $this->input->post('id'),
                'img_bayar' => $this->_uploadImagebayarobat(),
            );
            $this->db->where('id', $id);
            $this->db->update('tb_transaksi', $data);
            redirect('User/Riwayat/Pemesanan');
        } else {
            $data = array(
                'id' => $this->input->post('id'),
                'img_bayar' => $this->_uploadImagebayarobat(),
            );
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil diedit ! </div>');

            $this->db->where('id', $id);
            $this->db->update('tb_transaksi', $data);
            redirect('User/Riwayat/Pemesanan');
        }
    }

    public function _uploadImagebayarobat()
    {
        $nmfile = "bayarobat_" . time();
        $config['upload_path']          = './upload-image/bayar'; // Letak File
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $nmfile;
        $config['overwrite']            = true;
        $config['max_size']             = 2000; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        // img_bayar = penamaan file
        if ($this->upload->do_upload('img_bayar')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }

    public function hapuspesanobat($id)
    {
        $this->Histori_model->deleteData($id);
        redirect('User/Riwayat/Pemesanan');
    }

    public function delete_request($id)
    {
        $this->Histori_model->deleteData('$id');
        redirect('User/Riwayat/Pemesanan');
    }
}
