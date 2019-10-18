<?php

class M_rapat extends CI_Model
{

	function tampil_jadwal(){
		return $this->db->get_where('rapat_tbl', array(
			'rapat_lembaga' => $_SESSION['user_role'],
			'id_opmawa' => $_SESSION['user_opmawa']
		));	
	}

}

?>