<?php

class ApotekUser_model extends CI_Model
{
    public function __construct() 
    {
        $this->load->database();
    }

    public function get_apotek($id = FALSE)
    {
        if($id === FALSE)
        {
            $query = $this->db->get('tb_apotek');
            return $query->result_array();
        }
        $query = $this->db->get_where('tb_apotek', array('id' => $id));
        return $query->row_array();
    }

    public function get_produk($kode_produk = FALSE)
    {
        if($kode_produk === FALSE)
        {
            $query = $this->db->query('SELECT * FROM tb_produk WHERE kd_apotek = "'. $this->uri->segment(3) .'"');
            return $query->result_array();
        }
        $query = $this->db->get_where('tb_produk', array('kode_produk' => $kode_produk));
        return $query->row_array();
    }

    

}
// $query = $this->db->query('SELECT * FROM tb_produk WHERE kd_apotek = "' . $kd_apotek . '"');