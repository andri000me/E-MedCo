<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function createData()
    {
        $data = array(
            'kd_apotek' => $this->input->post('kd_apotek'),
            'kode_produk' => $this->input->post('kode_produk'),
            'nama_produk' => $this->input->post('nama_produk'),
            'id_jenis' => $this->input->post('nama_jenis'),
            'harga_produk' => $this->input->post('harga_produk'),
            'img_produk' => $this->_uploadImage(),
            'stok_produk' => $this->input->post('stok_produk'),
            'deskripsi_produk' => $this->input->post('deskripsi_produk'),
        );
        $this->db->insert('tb_produk', $data);
    }

    public function updateData($id_produk)
    {
        $data = array(
            'kd_apotek' => $this->input->post('kd_apotek'),
            'kode_produk' => $this->input->post('kode_produk'),
            'nama_produk' => $this->input->post('nama_produk'),
            'id_jenis' => $this->input->post('id_jenis'),
            'harga_produk' => $this->input->post('harga_produk'),
            'stok_produk' => $this->input->post('stok_produk'),
            'deskripsi_produk' => $this->input->post('deskripsi_produk'),
        );
        $this->db->where('id_produk', $id_produk);
        $this->db->update('tb_produk', $data);
    }

    public function getAllData()
    {
        $query = $this->db->query('SELECT *     FROM tb_produk produk join tb_jenis jenis 
                                                on jenis.id_jenis = produk.id_jenis');
        return $query->result();
    }

    public function getAllData2()
    {
        $query = $this->db->query("SELECT *     FROM tb_produk A join tb_jenis B 
                                                on B.id_jenis = A.id_jenis 
                                                WHERE A.kd_apotek ='{$_SESSION['kd_apotek']}'");
        return $query->result();
    }

    public function getJenis()
    {
        $this->db->select('*');
        $this->db->from('tb_jenis');
        return $this->db->get()->result();
    }

    public function _uploadImage()
    {
        $nmfile = "produk_" . time();
        $config['upload_path']          = './upload-image/product'; // file upload produk
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $nmfile;
        $config['overwrite']            = true;
        $config['max_size']             = 2000; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('img_produk')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }

    public function getData($id_produk)
    {
        $query = $this->db->query('SELECT * FROM tb_produk WHERE `id_produk` =' . $id_produk);
        return $query->row();
    }

    public function deleteData($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        $this->db->delete('tb_produk');
    }
}
