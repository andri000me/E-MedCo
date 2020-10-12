<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peta_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function createData()
    {
        $data = array(
            'nama_apotek' => $this->input->post('nama_apotek'),
            'telp_apotek' => $this->input->post('telp_apotek'),
            'alamat_apotek' => $this->input->post('alamat_apotek'),
            'lat' => $this->input->post('lat'),
            'lng' => $this->input->post('lng'),
            'deskripsi' => $this->input->post('deskripsi'),
        );
        $this->db->insert('tb_apotek', $data);
    }
}
