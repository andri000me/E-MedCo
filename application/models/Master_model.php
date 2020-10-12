<?php
class Master_model extends CI_Model{

//  GET DATA
    
	function getAllPenyakit(){
        return $this->db->query("select * from tb_penyakit")->result();
    }

	function getAllGejala(){
        return $this->db->query("select * from tb_gejala")->result();
    }

	function getAllPengetahuan(){
        return $this->db->query("select * from tb_pengetahuan")->result();
    }

    function getPG(){
        return $this->db->query("select g.poin_gejala from tmp_hasil as h, tb_gejala as g where h.kd_gejala=g.kd_gejala and h.poin_gejala='0'")->result();
    }

    function getHasil(){
        return $this->db->query("select h.kd_penyakit, h.kd_gejala, h.poin_gejala,h.poin_user, g.nama_gejala from tmp_hasil as h, tb_gejala as g where h.kd_gejala=g.kd_gejala and h.poin_gejala>'0'")->result();
    }

    function getPS(){
        return $this->db->query("select * from tmp_hasil as h, tb_penyakit as p, tb_gejala as g where h.kd_penyakit=p.kd_penyakit and h.kd_gejala=g.kd_gejala and h.poin_gejala>'0' limit 1")->result();
    }
    
	function getPenyakit(){
		if(isset($_GET['kd_penyakit'])) {
			$penyakit = $_GET['kd_penyakit'];
            $kd = $this->db->query("select * from tb_pengetahuan where kd_penyakit='".$penyakit."'")->row_array();
            $insert = "INSERT INTO tmp_relasi (kd_penyakit, kd_gejala) SELECT kd_penyakit, kd_gejala FROM tb_pengetahuan WHERE kd_penyakit='".$kd['kd_penyakit']."'";
            $this->db->query($insert);
		} else {
			$penyakit = 'null';
		}
		$this->db->select('*');
		$this->db->from('tb_pengetahuan');
		$this->db->where('kd_penyakit = ', ''.$penyakit.'');
		$this->db->limit('1');
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$out = $query->result();
			return $out;
		} else {
			return array();
		}
	}
    function getRelasi(){
        return $this->db->query("select * from tmp_relasi as r, tb_gejala as g where r.kd_gejala=g.kd_gejala")->result();
    }
	
//  GET DATA BY ID
    function getPenyakitById($id){
        $param = array('kd_penyakit'=>$id);
        return $this->db->get_where('tb_penyakit',$param);
    }
	function getGejalaById($id){
        $param = array('kd_gejala'=>$id);
        return $this->db->get_where('tb_gejala',$param);
    }
	function getDPengetahuanById($id){
        $param = array('kd_pengetahuan'=>$id);
        return $this->db->get_where('tb_pengetahuan',$param);
    }
	function getPengetahuanById($id){
        if(isset($_GET['kd_penyakit'])) {
			$kd_penyakit = $_GET['kd_penyakit'];
		} else {
		}
		$this->db->select('*');
		$this->db->from('tb_pengetahuan as pg');
		$this->db->from('tb_gejala as gj');
		$this->db->where('kd_penyakit',''.$kd_penyakit.'');
		$this->db->where('pg.kd_gejala = gj.kd_gejala');
		$query = $this->db->get();
		if($query->num_rows()>0){
			$out = $query->result();
			return $out;
		} else {
			return array();
		}
    }
	function getPertanyaanById($id){
        if(isset($_GET['kd_penyakit'])) {
			$kd_penyakit = $_GET['kd_penyakit'];
		} else {
		}
		$this->db->select('*');
		$this->db->from('tb_pengetahuan');
		$this->db->where('kd_penyakit',''.$kd_penyakit.'');
		$query = $this->db->get();
		if($query->num_rows()>0){
			$out = $query->result();
			return $out;
		} else {
			return array();
		}
    }
	
//  INSERT DATA
    function insertPenyakit($data){
        $query = $this->db->insert('tb_penyakit',$data);
        return $query;
    }
    function insertRelasi($data){
        $query = $this->db->insert('tmp_relasi',$data);
        return $query;
    }
    function insertHasil($data){
        $query = $this->db->insert('tb_hasil',$data);
        return $query;
    }
	function insertGejala($data){
        $query = $this->db->insert('tb_gejala',$data);
        return $query;
    }
	function insertPengetahuan($data){
        $query = $this->db->insert('tb_pengetahuan',$data);
        return $query;
    }
	function simpanRelasi()
    {
        $kdpenyakit         = $this->input->post('kd_penyakit');
        $penyakit           = $this->db->get_where('tb_pengetahuan',array('kd_penyakit'=>$kdpenyakit))->row_array();
        $data           = array('kd_penyakit'=>$kdpenyakit,
                                'kd_gejala'=>$penyakit['kd_gejala']);
        $this->db->insert('tmp_relasi',$data);
    }

//  UPDATE DATA
    function updatePenyakit($data,$id){
        $this->db->where('kd_penyakit',$id);
        $this->db->update('tb_penyakit',$data);
    }
	function updateGejala($data,$id){
        $this->db->where('kd_gejala',$id);
        $this->db->update('tb_gejala',$data);
    }
    function updatePengetahuan($data,$id){
        $this->db->where('kd_pengetahuan',$id);
        $this->db->update('tb_pengetahuan',$data);
    }
	
//  DELETE DATA
    function deletePenyakit($id){
        $this->db->where('kd_penyakit',$id);
        $delete = $this->db->delete('tb_penyakit');
        return $delete;
    }
	function deleteGejala($id){
        $this->db->where('kd_gejala',$id);
        $delete = $this->db->delete('tb_gejala');
        return $delete;
    }
	function deletePengetahuan($id){
        $this->db->where('kd_pengetahuan',$id);
        $delete = $this->db->delete('tb_pengetahuan');
        return $delete;
    }

//  KODE PENYAKIT
    function getKodePenyakit()
    {
        $q = $this->db->query("select MAX(RIGHT(kd_penyakit,3)) as kd_max from tb_penyakit");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "P".$kd;
    }
//  KODE GEJALA	
	function getKodeGejala()
    {
        $q = $this->db->query("select MAX(RIGHT(kd_gejala,3)) as kd_max from tb_gejala");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "G".$kd;
    }
//  KODE PENGETAHUAN	
	function getKodePengetahuan()
    {
        $q = $this->db->query("select MAX(RIGHT(kd_pengetahuan,3)) as kd_max from tb_pengetahuan");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "PG".$kd;
    }
}
