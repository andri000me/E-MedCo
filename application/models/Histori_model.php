<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Histori_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getAllData()
    {
        // $query = $this->db->query("SELECT * FROM tb_transaksi WHERE pemesan ='{$_SESSION['name']}' ORDER BY status ASC");
        // $query = $this->db->query("SELECT * FROM tb_transaksi AS histori LEFT JOIN tb_apotek AS apotek ON histori.kd_apotek = apotek.kd_apotek WHERE pemesan ='{$_SESSION['name']}'");
        $query = $this->db->query("SELECT   pesanan.id,
                                            pesanan.pemesan,
                                            apotek.nama_apotek,
                                            pesanan.kode_produk,
                                            pesanan.produk,
                                            pesanan.qty,
                                            pesanan.total,
                                            pesanan.tgl_pesan,
                                            pesanan.waktu,
                                            pesanan.img_bayar,
                                            pesanan.status FROM tb_transaksi 
                                            AS pesanan LEFT JOIN tb_apotek 
                                            AS apotek ON pesanan.kd_apotek = apotek.kd_apotek
                                            WHERE pemesan ='{$_SESSION['name']}'");
        return $query->result();
    }

    public function deleteData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_transaksi');
    }

    public function _uploadImage()
    {
        $nmfile = "bayar_" . time();
        $config['upload_path']          = './upload-image/bayar'; // Letak File
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $nmfile;
        $config['overwrite']            = true;
        $config['max_size']             = 2000; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('img_bayar')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }

    public function getData($id)
    {
        $query = $this->db->query('SELECT * FROM tb_transaksi WHERE `id` =' . $id);
        return $query->row();
    }

}
