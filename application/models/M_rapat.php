<?php

class M_rapat extends CI_Model
{

	function tampil_jadwal(){
		$this->db->order_by('rapat_tanggal', 'ASC');
		return $this->db->get_where('rapat_tbl', array(
			'rapat_lembaga' => $_SESSION['user_role'],
			'id_opmawa' => $_SESSION['user_opmawa']
		));	

	}

	function inputJadwalRapat($data) {
		$this->db->insert('rapat_tbl', $data);
	}

	function deleteJadwal($data) {
		$this->db->delete('rapat_tbl', $data);
	}

}

?>