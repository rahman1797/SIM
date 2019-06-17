<?php 
 
class M_sys extends CI_Model{

	function tampil_regis_prodi(){
		return $this->db->get_where('prodi_tbl');
	}

	function tampil_regis_posisi(){
		return $this->db->get_where('posisi_tbl');
	}

			function tampil_regis_posisi_byLembaga(){
				return $this->db->get_where('posisi_tbl', array('posisi_lembaga' => $_SESSION['user_role'] ));
			}

	function inputProdi($data) {
		$this->db->insert('prodi_tbl', $data);
	}

	function inputPosisi($data) {
		$this->db->insert('posisi_tbl', $data);
	}

	function deleteProdi($data) {
		$this->db->delete('prodi_tbl', $data);
	}

	function deletePosisi($data) {
		$this->db->delete('posisi_tbl', $data);
	}

}