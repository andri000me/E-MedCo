<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getAllData()
    {
        $query = $this->db->query("SELECT * FROM tb_transaksi WHERE kd_apotek ='{$_SESSION['kd_apotek']}' ORDER BY status ASC");
        return $query->result();
    }

    public function getMenunggu()
    {
        $query = $this->db->query("SELECT COUNT(*) as total FROM tb_transaksi WHERE status = '1' AND kd_apotek ='{$_SESSION['kd_apotek']}'");
        return $query->row();
    }

    public function getSelesai()
    {
        $query = $this->db->query("SELECT COUNT(*) as total FROM tb_transaksi WHERE status = '2' AND kd_apotek ='{$_SESSION['kd_apotek']}'");
        return $query->row();
    }

    public function c_status1($id)
    {
        $data = array(
            'status' => 2,
        );
        $this->db->where('id', $id);
        $this->db->insert('tb_transaksi', $data);
    }
}
