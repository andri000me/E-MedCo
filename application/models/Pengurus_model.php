<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengurus_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function createData()
    {
        $data = array(
            'nik' => $this->input->post('nik'),
            'kd_apotek' => $this->input->post('kd_apotek'),
            'nama' => $this->input->post('nama'),
            'jabatan' => $this->input->post('jabatan'),
            'alamat' => $this->input->post('alamat'),
            'telp' => $this->input->post('telp'),
        );
        $this->db->insert('tb_pengurus', $data);
    }

    public function updateData($id)
    {
        $data = array(
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'jabatan' => $this->input->post('jabatan'),
            'alamat' => $this->input->post('alamat'),
            'telp' => $this->input->post('telp'),
        );
        $this->db->where('id', $id);
        $this->db->update('tb_pengurus', $data);
    }

    public function getAllData2()
    {
        $query = $this->db->query('SELECT * FROM tb_produk joni join tb_jenis kampang on kampang.id_jenis = joni.id_jenis');
        return $query->result();
    }

    public function getAllData()
    {
        // $query = $this->db->query("SELECT * FROM tb_produk joni join tb_jenis kampang on kampang.id_jenis = joni.id_jenis");
        $query = $this->db->query("SELECT * FROM tb_pengurus WHERE kd_apotek ='{$_SESSION['kd_apotek']}'");
        return $query->result();
    }

    public function getData($id)
    {
        $query = $this->db->query('SELECT * FROM tb_pengurus WHERE `id` =' . $id);
        return $query->row();
    }

    public function deleteData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_pengurus');
    }
}
