<?php 
 
class M_user extends CI_Model{

	function cekLogin($table,$where){		
		return $this->db->get_where($table,$where);
	}

}