<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsultasi_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function createData()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'user' => $this->input->post('user'),
            'nama_pasien' => $this->input->post('nama_pasien'),
            'keluhan' => $this->input->post('keluhan'),
            'tanggal' => $this->input->post('tanggal'),
            'jam' => $this->input->post('jam'),
            'lokasi' => $this->input->post('lokasi'),
            'status' => 1
        );
        $this->db->insert('tb_jadwal_konsul', $data);
    }

    public function updateData($id_jenis)
    {
        $data = array(
            'id' => $this->input->post('id'),
            'nama_pasien' => $this->input->post('nama_pasien'),
            'keluhan' => $this->input->post('keluhan'),
            'tanggal' => $this->input->post('tanggal'),
            'jam' => $this->input->post('jam'),
            'lokasi' => $this->input->post('lokasi')
        );
        $this->db->where('id', $id_jenis);
        $this->db->update('tb_jadwal_konsul', $data);
    }

    public function getData($id)
    {
        $query = $this->db->query('SELECT * FROM tb_jadwal_konsul WHERE `id` =' . $id);
        return $query->row();
    }

    public function getAllDataUser()
    {
        $query = $this->db->query("SELECT * FROM tb_jadwal_konsul WHERE user ='{$_SESSION['name']}'");
        return $query->result();
    }

    public function getAllDataDokter()
    {
        $query = $this->db->query("SELECT * FROM tb_jadwal_konsul ORDER BY status ASC");
        return $query->result();
    }

    public function deleteData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_jadwal_konsul');
    }
}
