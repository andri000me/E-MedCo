<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pakar_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }


    //  CREAT DATA 


    //  CREAT DATA Gejala
    public function createDataGejala()
    {
        $data = array(
            'kd_gejala' => $this->input->post('kd_gejala'),
            'nama_gejala' => $this->input->post('nama_gejala'),
            'poin_gejala' => $this->input->post('poin_gejala'),
        );
        $this->db->insert('tb_gejala', $data); // tbl Gejala = nama database Gejala
    }


    // CREATE DATA PENYAKIT
    public function createDataPenyakit()
    {
        $data = array(
            'kd_penyakit' => $this->input->post('kd_penyakit'),
            'nama_penyakit' => $this->input->post('nama_penyakit'),
            'penyebab' => $this->input->post('penyebab'),
            'solusi' => $this->input->post('solusi'),
        );
        $this->db->insert('tb_penyakit', $data); // tbl penyakit = nama database Penyakit
    }


    // CREATE DATA PENGETAHUAN
    public function createDataPengetahuan()
    {
        $data = array(
            'kd_pengetahuan' => $this->input->post('kd_pengetahuan'),
            'kd_penyakit' => $this->input->post('kd_penyakit'),
            'kd_gejala' => $this->input->post('kd_gejala'),
            'pertanyaan' => $this->input->post('pertanyaan'),
        );
        $this->db->insert('tb_pengetahuan', $data); // tbl penyakit = nama database Penyakit
    }

    // LAST CREATE DATA


    // UPDATE DATA


    // UPDATE DATA GEJALA
    public function updateDataGejala($id_gejala)
    {
        $data = array(
            'kd_gejala' => $this->input->post('kd_gejala'),
            'nama_gejala' => $this->input->post('nama_gejala'),
            'poin_gejala' => $this->input->post('poin_gejala'),
        );
        $this->db->where('id_gejala', $id_gejala);
        $this->db->update('tb_gejala', $data); // tbl Gejala = nama database Gejala
    }


    // UPDATE DATA PENYAKIT
    public function updateDataPenyakit($id_penyakit)
    {
        $data = array(
            'kd_penyakit' => $this->input->post('kd_penyakit'),
            'nama_penyakit' => $this->input->post('nama_penyakit'),
            'penyebab' => $this->input->post('penyebab'),
            'solusi' => $this->input->post('solusi'),
        );
        $this->db->where('id_penyakit', $id_penyakit);
        $this->db->update('tb_penyakit', $data); // tbl penyakit = nama database Penyakit
    }


    // UPDATE DATA PENGETAHUAN
    public function updateDataPengetahuan($id_pengetahuan)
    {
        $data = array(
            'kd_pengetahuan' => $this->input->post('kd_pengetahuan'),
            'kd_penyakit' => $this->input->post('kd_penyakit'),
            'kd_gejala' => $this->input->post('kd_gejala'),
            'pertanyaan' => $this->input->post('pertanyaan'),
        );
        $this->db->where('id_pengetahuan', $id_pengetahuan);
        $this->db->update('tb_pengetahuan', $data); // tbl penyakit = nama database Penyakit
    }

    // LAST UPDATE DATA


    // DELETE DATA


    // DELETE DATA GEJALA
    public function deleteDataGejala($id_gejala)
    {
        $this->db->where('id_gejala', $id_gejala);
        $this->db->delete('tb_gejala');
    }


    // DELETE DATA PENYAKIT
    public function deleteDataPenyakit($id_penyakit)
    {
        $this->db->where('id_penyakit', $id_penyakit);
        $this->db->delete('tb_penyakit');
    }


    // DELETE DATA PENGETAHUAN
    public function deleteDataPengetahuan($id_pengetahuan)
    {
        $this->db->where('id_pengetahuan', $id_pengetahuan);
        $this->db->delete('tb_pengetahuan');
    }


    // LAST DELETE DATA



    // GET DATA


    // GET DATA GEJALA
    public function getDataGejala($id_gejala)
    {
        $query = $this->db->query('SELECT * FROM tb_gejala WHERE `id_gejala` =' . $id_gejala);
        return $query->row();
    }


    // GET DATA PENYAKIT
    public function getDataPenyakit($id_penyakit)
    {
        $query = $this->db->query('SELECT * FROM tb_penyakit WHERE `id_penyakit` =' . $id_penyakit);
        return $query->row();
    }


    // GET DATA PENGETAHUAN
    public function getDataPengetahuan($id_pengetahuan)
    {
        $query = $this->db->query('SELECT * FROM tb_pengetahuan WHERE `id_pengetahuan` =' . $id_pengetahuan);
        return $query->row();
    }


    // LAST GET DATA



    // GET ALL DATA


    // GET ALL DATA GEJALA
    public function getAllDataGejala()
    {
        $query = $this->db->query('SELECT * FROM tb_gejala');
        return $query->result();
    }


    // GET ALL DATA PENYAKIT
    public function getAllDataPenyakit()
    {
        $query = $this->db->query('SELECT * FROM tb_penyakit');
        return $query->result();
    }


    // GET ALL DATA PENGETAHUAN
    public function getAllDataPengetahuan()
    {
        $query = $this->db->query('SELECT * FROM tb_pengetahuan');
        return $query->result();
    }


    // LAST GET ALL DATA



    // 
    function getPG()
    {
        $query = $this->db->query('SELECT `poin_gejala` FROM `tmp_hasil`
        `tb_gejala` as where `kd_gejala` = `kd_gejala`.`poin_gejala`= `0` ');
        return $query->result();
    }

    function getHasil()
    {
        $query = $this->db->query('SELECT `kd_penyakit` , `kd_gejala` , `poin_gejala`, `poin_user`, `nama_gejala`
         FROM `tmp_hasil`, `tb_gejala` as Where `kd_gejala` = `kd_gejala` . `poin_gejala` >`0` ');
        return $query->result();
    }

    function getPS()
    {
        $query = ('SELECT * FROM `tmp_hasil` , `tb_penyakit`, 
        `tb_gejala` as Where `kd_penyakit` = `kd_penyakit` . `kd_gejala` = `kd_gejala` . `poin_gejala` >`0` limit 1');
        return $query->result();
    }

    // LAST GET


    // 



    // GET RELASI
    function getRelasi()
    {
        $query = $this->db->query('SELECT * FROM `tmp_hasil` as Where `kd_gejala` = `kd_gejala` ');
        return $query->result();
    }
}
