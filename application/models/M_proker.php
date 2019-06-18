<?php 
 
class M_proker extends CI_Model{

	function tampil_proker(){
		return $this->db->get_where('proker_tbl');
	}

	function inputProker($data) {
		$this->db->insert('proker_tbl', $data);
	}

	function deleteProker($data) {
		$this->db->delete('proker_tbl', $data);
	}

}