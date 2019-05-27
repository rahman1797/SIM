<?php 
 
class M_user extends CI_Model{

	function getProdi($id_prodi) {
		return $this->db->get_where('prodi_ID', $$id_prodi);
	}

}