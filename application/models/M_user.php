<?php 
 
class M_user extends CI_Model{

	function cekLogin($table,$where){		
		return $this->db->get_where($table,$where);
	}

	function tampil_data(){
		return $this->db->get_where('user_tbl');
	}

	public function getProdi($id_prodi){
        
        $query = $this->db->get_where('prodi_tbl', array('prodi_ID' => $id_prodi));

        return $query->result_array();
	}

}