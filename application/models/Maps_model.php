<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Maps_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_list()
    {

        $query = $this->db->get('tb_apotek');
        return $query->result();
    }
}
