<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kadaluarsa_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getAllData()
    {
        $query = $this->db->query("SELECT   masuk.kd_transaksi,
                                            masuk.kd_apotek,
                                            masuk.kode_produk,
                                            produk.nama_produk,
                                            masuk.jumlah_masuk,
                                            masuk.kadaluarsa 
                                            FROM tb_masuk AS masuk 
                                            LEFT JOIN tb_produk AS produk 
                                            ON masuk.kode_produk = produk.kode_produk 
                                            WHERE masuk.kd_apotek ='{$_SESSION['kd_apotek']}' 
                                            ORDER BY kadaluarsa ASC");
        return $query->result();
    }

    public function getKadaluarsa()
    {
        $query = $this->db->query("SELECT   kadaluarsa.kd_transaksi,
                                            kadaluarsa.kd_apotek,
                                            kadaluarsa.kode_produk,
                                            produk.nama_produk,
                                            kadaluarsa.jumlah_masuk,
                                            kadaluarsa.kadaluarsa 
                                            FROM tb_kadaluarsa AS kadaluarsa 
                                            LEFT JOIN tb_produk AS produk 
                                            ON kadaluarsa.kode_produk = produk.kode_produk 
                                            WHERE kadaluarsa.kd_apotek ='{$_SESSION['kd_apotek']}'
                                            ORDER BY kadaluarsa ASC");
        return $query->result();
    }

    public function deleteData($kd_transaksi)
    {
        $this->db->where('kd_transaksi', $kd_transaksi);
        $query = $this->db->get('tb_masuk');
        foreach ($query->result() as $row) {
            $this->db->insert('tb_kadaluarsa', $row);
        }
    }

    public function deleteData2($kd_transaksi)
    {
        $this->db->where('kd_transaksi', $kd_transaksi);
        $this->db->delete('tb_masuk');
    }

    public function getKode($kodeBarang)
    {
        $query = $this->db->query("SELECT max(kode) as kodeTerbesar FROM barang");
        $data = mysqli_fetch_array($query);
        $kodeBarang = $data['kodeTerbesar'];
        $urutan = (int)substr($kodeBarang, 3, 3);
        $urutan++;
        $huruf = "BRG";
        $kodeBarang = $huruf . sprintf("%03s", $urutan);
        return ($kodeBarang);
    }
}
