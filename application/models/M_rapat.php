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

	// function rapat_terdekat(){
	// 		$this->db->order_by('rapat_tanggal', 'ASC');
	// 	return $this->db->get_where('rapat_tbl', array(
	// 		'rapat_lembaga' => $_SESSION['user_role'],
	// 		'id_opmawa' => $_SESSION['user_opmawa']
	// 	));	
	// }

		function tampil_evaluasi(){
			// $this->db->order_by('rapat_tanggal', 'ASC');
			return $this->db->get_where('evaluasirapat_tbl', array(
				'id_rapat' => $_GET['id_rapat']
				// 'id_opmawa' => $_SESSION['user_opmawa']
			));	
		}

	function getRapatTanggal($id_rapat)
	{
		
		 $query = $this->db->get_where('rapat_tbl', array('rapat_ID' => $id_rapat));

		 return $query->result_array();
		
	}

	function inputJadwalRapat($data) {
		$this->db->insert('rapat_tbl', $data);
	}

		function inputEvaluasiRapat($data) {
			$this->db->insert('evaluasirapat_tbl', $data);
		}

	function deleteJadwal($data) {
		$this->db->delete('rapat_tbl', $data);
	}
		function deleteEvaluasiRapat($data) {
			$this->db->delete('evaluasirapat_tbl', $data);
		}

}

?>