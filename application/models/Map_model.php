<?php

class Map_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_apotek($id = FALSE)
    {
        if ($id === FALSE) {
                $query = $this->db->get('tb_apotek');
                return $query->result_array();
            }
        $query = $this->db->get_where('tb_apotek', array('id' => $id));
        return $query->row_array();
    }
}
