<?php 
 
class M_sys extends CI_Model{

	function tampil_regis_prodi(){
		return $this->db->get_where('prodi_tbl');
	}

	function tampil_regis_posisi(){
		return $this->db->get_where('posisi_tbl');
	}

	function inputProdi($data) {
		$this->db->insert('prodi_tbl', $data);
	}

}