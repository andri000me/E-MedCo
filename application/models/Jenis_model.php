<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function createData()
    {
        $data = array(
            'id_jenis' => $this->input->post('id_jenis'),
            'nama_jenis' => $this->input->post('nama_jenis'),
            'kode_jenis' => $this->input->post('kode_jenis'),
            'kd_apotek' => $this->input->post('kd_apotek'),
        );
        $this->db->insert('tb_jenis', $data);
    }

    public function updateData($id_jenis)
    {
        $data = array(
            'id_jenis' => $this->input->post('id_jenis'),
            'nama_jenis' => $this->input->post('nama_jenis'),
            'kode_jenis' => $this->input->post('kode_jenis')
        );
        $this->db->where('id_jenis', $id_jenis);
        $this->db->update('tb_jenis', $data);
    }

    public function getAllData()
    {
        $query = $this->db->query("SELECT * FROM tb_jenis WHERE kd_apotek ='{$_SESSION['kd_apotek']}'");
        return $query->result();
    }

    public function getJenis()
    {
        $this->db->select('*');
        $this->db->from('tb_jenis');
        return $this->db->get()->result();
    }



    public function getData($id_jenis)
    {
        $query = $this->db->query('SELECT * FROM tb_jenis WHERE `id_jenis` =' . $id_jenis);
        return $query->row();
    }

    public function deleteData($id_jenis)
    {
        $this->db->where('id_jenis', $id_jenis);
        $this->db->delete('tb_jenis');
    }
}
