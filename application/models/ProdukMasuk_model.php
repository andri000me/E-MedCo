<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProdukMasuk_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function createData()
    {
        $data = array(
            'kd_transaksi' => $this->input->post('kd_transaksi'),
            'kd_apotek' => $this->input->post('kd_apotek'),
            'tanggal' => $this->input->post('tanggal'),
            'kode_produk' => $this->input->post('kode_produk'),
            'jumlah_masuk' => $this->input->post('jumlah_masuk'),
            'kadaluarsa' => $this->input->post('kadaluarsa'),
        );

        $kode_produk = $this->input->post('kode_produk');
        $a = $this->db->query("SELECT stok_produk FROM tb_produk WHERE kode_produk = '{$kode_produk}'");
        // $a = $this->db->query("SELECT stok_produk FROM tb_produk WHERE kode_produk = 'OB008'");
        // var_dump($a->row()->stok_produk); die;
        $b = $this->input->post('jumlah_masuk');
        $total = $a->row()->stok_produk + $b;
        // var_dump($total); die;


        $this->db->insert('tb_masuk', $data);

        $total = array(
            'stok_produk' => $total,
        );
        $this->db->where('kode_produk', $kode_produk);
        $this->db->update('tb_produk', $total);
    }



    public function getAllData1()
    {
        $query = $this->db->query("SELECT * FROM tb_masuk WHERE kd_apotek ='{$_SESSION['kd_apotek']}' ORDER BY kd_transaksi ASC");
        return $query->result();
    }

    public function getAllData()
    {
        // $query = $this->db->query("SELECT * FROM tb_produk joni join tb_jenis kampang on kampang.id_jenis = joni.id_jenis");
        $query = $this->db->query("SELECT * FROM tb_masuk AS masuk LEFT JOIN tb_produk AS produk ON masuk.kode_produk = produk.kode_produk WHERE masuk.kd_apotek ='{$_SESSION['kd_apotek']}' ORDER BY kd_transaksi DESC");
        return $query->result();
    }

    public function getAllData2()
    {
        // $query = $this->db->query("SELECT * FROM tb_produk joni join tb_jenis kampang on kampang.id_jenis = joni.id_jenis");
        $query = $this->db->query("SELECT * FROM tb_masuk AS masuk LEFT JOIN tb_produk AS produk ON masuk.kode_produk = produk.kode_produk WHERE masuk.kd_apotek ='{$_SESSION['kd_apotek']}' ORDER BY kadaluarsa ASC");
        return $query->result();
    }

    public function getProduk()
    {
        $this->db->select('*');
        $this->db->from('tb_produk');
        return $this->db->get()->result();
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
