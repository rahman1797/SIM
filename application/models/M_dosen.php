<?php 
 
class M_dosen extends CI_Model{

	function tampil_proker_opmawa(){
		return $this->db->get_where('proker_tbl');
	}

	function cekLogin($table,$where){		
		return $this->db->get_where($table,$where);
	}

	function tampil_user(){
		return $this->db->get_where('user_tbl', array('user_role' => $_SESSION['user_role']));
	}

			function tampil_user_byLembaga(){
				return $this->db->get_where('user_tbl', array('user_role' => $_SESSION['user_role']));
			}

			function getUserNama($id_user)
			{
				
				 $query = $this->db->get_where('user_tbl', array('user_ID' => $id_user));

        		 return $query->result_array();
				
			}

	function getProfil(){
		return $this->db->get_where('dosen_tbl', array('dosen_ID' => $_SESSION['user_ID']));
	}

	function getProdi($id_prodi){
        
        $query = $this->db->get_where('prodi_tbl', array('prodi_ID' => $id_prodi));

        return $query->result_array();
	}

	function getPosisi($id_posisi){
        
        $query = $this->db->get_where('posisi_tbl', array('posisi_ID' => $id_posisi));

        return $query->result_array();
	}

	function getKabinet($id_opmawa){
        
        $query = $this->db->get_where('opmawa_tbl', array('opmawa_ID' => $id_opmawa));

        return $query->result_array();
	}

	function getDepartemen($id_departemen){
        
        $query = $this->db->get_where('departemen_tbl', array('departemen_ID' => $id_departemen));

        return $query->result_array();
	}

	function inputAnggota($data) {
		print_r($data);
		$this->db->insert('user_tbl', $data);
	}

	function deleteAnggota($data) {
		$this->db->delete('user_tbl', $data);
	}

}