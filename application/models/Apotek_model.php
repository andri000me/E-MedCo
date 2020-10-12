<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apotek_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function updateData($id)
    {
        $data = array(
            'nama_apotek' => $this->input->post('nama_apotek'),
            'telp_apotek' => $this->input->post('telp_apotek'),
            'alamat_apotek' => $this->input->post('alamat_apotek'),
            'lat' => $this->input->post('lat'),
            'lng' => $this->input->post('lng'),
            'deskripsi' => $this->input->post('deskripsi'),
        );
        $this->db->where('id', $id);
        $this->db->update('tb_apotek', $data);
    }

    public function getAllData()
    {
        $query = $this->db->query('SELECT * FROM tb_apotek');
        return $query->result();
    }

    public function getData($id)
    {
        $query = $this->db->query('SELECT * FROM tb_apotek WHERE `id` =' . $id);
        return $query->row();
    }

    public function deleteData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_apotek');
    }
}
