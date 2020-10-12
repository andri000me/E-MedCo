<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getApotek()
    {
        $query = $this->db->query('SELECT COUNT(*) as total FROM tb_apotek');
        return $query->row();
    }
}
