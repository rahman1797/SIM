<?php 
 
class M_sys extends CI_Model{

	function tampil_regis_prodi(){
		return $this->db->get_where('prodi_tbl');
	}

	function tampil_regis_opmawa(){
		return $this->db->get_where('opmawa_tbl');
	}

			function tampil_opmawaDetail(){
				return $this->db->get_where('opmawa_tbl', array('opmawa_ID' => $_GET['id_opmawa']));
			}

					function tampil_departemenOpmawaDetail(){
						return $this->db->get_where('departemen_tbl', array('id_opmawa' => $_GET['id_opmawa']));
					}

			function tampil_departemenOpmawa(){
				return $this->db->get_where('departemen_tbl', array('id_opmawa' => $_SESSION['user_opmawa']));
			}

	// function tampil_regis_posisi(){
	// 	return $this->db->get_where('posisi_tbl');
	// }

			function tampil_regis_posisi_byLembaga(){
				return $this->db->get_where('posisi_tbl', array('posisi_lembaga' => $_SESSION['user_role'] ));
			}

	function inputProdi($data) {
		$this->db->insert('prodi_tbl', $data);
	}

	function inputOpmawa($data) {
		$this->db->insert('opmawa_tbl', $data);
	}

	function inputDepartemen($data) {
		$this->db->insert('departemen_tbl', $data);
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


	function updateData($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

}