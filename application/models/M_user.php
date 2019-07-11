<?php 
 
class M_user extends CI_Model{

	function cekLogin($table,$where){		
		return $this->db->get_where($table,$where);
	}

	function tampil_user(){
		return $this->db->get_where('user_tbl');
	}

			function tampil_user_byLembaga(){
				return $this->db->get_where('user_tbl', array('user_role' => $_SESSION['user_role']));
			}

			function getUserNama($id_user)
			{
				
				 $query = $this->db->get_where('user_tbl', array('user_ID' => $id_user));

        		 return $query->result_array();
				
			}

	public function getProdi($id_prodi){
        
        $query = $this->db->get_where('prodi_tbl', array('prodi_ID' => $id_prodi));

        return $query->result_array();
	}

	public function getPosisi($id_posisi){
        
        $query = $this->db->get_where('posisi_tbl', array('posisi_ID' => $id_posisi));

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