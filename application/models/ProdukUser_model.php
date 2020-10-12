<?php

class ProdukUser_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_produk($kode_produk = FALSE, $kd_apotek = FALSE)
    {
        if ($kode_produk === FALSE) {
            $query = $this->db->get('tb_produk');
            return $query->result_array();
        }
        $query = $this->db->get_where('tb_produk', array('kode_produk' => $kode_produk, 'kd_apotek' => $kd_apotek));
        // $query = $this->db->get_where('tb_produk', array('kode_produk' => $kode_produk, 'kd_apotek' => "' . $this->uri->segment(3) . '"));
        // $query = $this->db->get_where('tb_produk', array('kode_produk' => $kode_produk, 'kd_apotek' => 'AP001'));
        return $query->row_array();
    }

    public function get_produk2($kode_produk = FALSE, $kd_apotek = FALSE)
    {
        if ($kode_produk === FALSE) {
            $this->db->select('*');
            $this->db->from('tb_produk');
            $this->db->join('tb_apotek', 'tb_apotek.kd_apotek = tb_produk.kd_apotek');
            $query = $this->db->get();
            return $query->result_array();
        }
        $query = $this->db->get_where('tb_produk', array('kode_produk' => $kode_produk, 'kd_apotek' => $kd_apotek));
        // $query = $this->db->get_where('tb_produk', array('kode_produk' => $kode_produk, 'kd_apotek' => "' . $this->uri->segment(3) . '"));
        // $query = $this->db->get_where('tb_produk', array('kode_produk' => $kode_produk, 'kd_apotek' => 'AP001'));
        return $query->row_array();
    }

    public function get_produk3($kode_produk = FALSE, $kd_apotek = FALSE)
    {
        if ($kode_produk === FALSE) {
            $query = $this->db->query('SELECT   produk.id_produk,
                                                produk.kode_produk,
                                                produk.nama_produk,
                                                produk.harga_produk,
                                                produk.id_jenis,
                                                produk.stok_produk,
                                                produk.img_produk,
                                                produk.deskripsi_produk,
                                                apotek.nama_apotek FROM tb_produk 
                                                AS produk LEFT JOIN tb_apotek 
                                                AS apotek ON produk.kd_apotek = apotek.kd_apotek');
            return $query->result_array();
        }
        $query = $this->db->get_where('tb_produk', array('kode_produk' => $kode_produk, 'kd_apotek' => $kd_apotek));
        // $query = $this->db->get_where('tb_produk', array('kode_produk' => $kode_produk, 'kd_apotek' => "' . $this->uri->segment(3) . '"));
        // $query = $this->db->get_where('tb_produk', array('kode_produk' => $kode_produk, 'kd_apotek' => 'AP001'));
        return $query->row_array();
    }

    public function getAllDataUser()
    {
        $query = $this->db->query("SELECT * FROM tb_produk AS produk LEFT JOIN tb_apotek AS apotek ON produk.kd_apotek = apotek.kd_apotek");
        // $query = $this->db->query("SELECT * FROM tb_jadwal_konsul");
        return $query->result();
    }

    public function getAllData()
    {
        $query = $this->db->query('SELECT * FROM tb_apotek');
        return $query->result_array();
    }

    public function getJenis()
    {
        $this->db->select('*');
        $this->db->from('tb_jenis');
        return $this->db->get()->result();
    }

    public function get_pesanan($kode_produk)
    {
        if ($kode_produk === FALSE) {
            $query = $this->db->get('tb_produk');
            return $query->result_array();
        }
        $query = $this->db->get_where('tb_produk', array('kode_produk' => $kode_produk));
        return $query->row_array();
    }

    public function createData()
    {
        $data = array(
            'pemesan' => $this->input->post('pemesan'),
            'kode_produk' => $this->input->post('kode_produk'),
            'kd_apotek' => $this->input->post('kd_apotek'),
            'produk' => $this->input->post('produk'),
            'qty' => $this->input->post('qty'),
            'total' => $this->input->post('total'),
            'tgl_pesan' => $this->input->post('tgl_pesan'),
            'waktu' => $this->input->post('waktu'),
            'status' => 1,
        );
        $this->db->insert('tb_transaksi', $data);
    }
}
