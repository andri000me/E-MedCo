<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Permintaan
class Request_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function createData()
    {
        $data = array(
            'judul' => $this->input->post('judul'),
            'nama' => $this->input->post('nama'),
            'detail' => $this->input->post('detail'),
            'alasan' => $this->input->post('alasan'),
            'date' => $this->input->post('date'),
        );
        $this->db->insert('tb_request', $data);
    }

    public function getAllData()
    {
        $query = $this->db->query("SELECT * FROM tb_request");
        return $query->result();
    }

    public function deleteData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_request');
    }
}
