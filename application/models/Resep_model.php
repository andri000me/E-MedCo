<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Resep_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function createData()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'kd_apotek' => $this->input->post('kd_apotek'),
            'nama' => $this->input->post('nama'),
            'detail' => $this->input->post('detail'),
            'tanggal' => $this->input->post('tanggal'),
            'waktu' => $this->input->post('waktu'),
            'img_bayar' => $this->_uploadImage(),
            'status' => 1
        );
        $this->db->insert('tb_pesan_resep', $data);
    }


    public function getData($id)
    {
        $query = $this->db->query('SELECT * FROM tb_pesan_resep WHERE `id` =' . $id);
        return $query->row();
    }

    public function getAllDataUser()
    {
        // $query = $this->db->query("SELECT * FROM tb_pesan_resep AS resep LEFT JOIN tb_apotek AS apotek ON resep.kd_apotek = apotek.kd_apotek WHERE nama ='{$_SESSION['name']}'");
        $query = $this->db->query("SELECT resep.id,apotek.nama_apotek,resep.nama,resep.detail,resep.tanggal,resep.waktu,resep.harga,resep.img_bayar,resep.status FROM tb_pesan_resep AS resep LEFT JOIN tb_apotek AS apotek ON resep.kd_apotek = apotek.kd_apotek WHERE nama ='{$_SESSION['name']}'");
        // $query = $this->db->query("SELECT * FROM tb_jadwal_konsul");
        return $query->result();
    }
    public function getAllDataApotek()
    {
        $query = $this->db->query("SELECT * FROM tb_pesan_resep WHERE kd_apotek ='{$_SESSION['kd_apotek']}' ORDER BY status ASC");
        // $query = $this->db->query("SELECT * FROM tb_jadwal_konsul");
        return $query->result();
    }

    public function _uploadImage()
    {
        $nmfile = "bayarresep_" . time();
        $config['upload_path']          = './images/bayar';
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

    public function getMenunggu()
    {
        $query = $this->db->query("SELECT COUNT(*) as total FROM tb_pesan_resep WHERE status = '1' AND kd_apotek ='{$_SESSION['kd_apotek']}'");
        return $query->row();
    }

    public function getSiap()
    {
        $query = $this->db->query("SELECT COUNT(*) as total FROM tb_pesan_resep WHERE status = '2' AND kd_apotek ='{$_SESSION['kd_apotek']}'");
        return $query->row();
    }

    public function getSelesai()
    {
        $query = $this->db->query("SELECT COUNT(*) as total FROM tb_pesan_resep WHERE status = '3' AND kd_apotek ='{$_SESSION['kd_apotek']}'");
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

    public function deleteData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_pesan_resep');
    }
}
