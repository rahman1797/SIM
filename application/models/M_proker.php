<?php 
 
class M_proker extends CI_Model{

	function tampil_proker(){
		return $this->db->get_where('proker_tbl');
	}

	function tampil_prokerDetail(){
		return $this->db->get_where('proker_tbl', array('proker_ID' => $_GET['id_proker']));
	}

			function tampil_prokerPosisi(){
				return $this->db->get_where('prokerPosisi_tbl', array('id_proker' => $_GET['id_proker']));
			}

			// Menghitung banyak nya jumlah data pada database dengan ketentuan tertentu
			function JumlahProkerPosisi()
			{   
			    $query = $this->db->get_where('prokerPosisi_tbl', array('id_proker' => $_GET['id_proker']));
			    if($query->num_rows()>0)
			    {
			      return $query->num_rows();
			    }
			    else
			    {
			      return 0;
			    }
			}

			function getProkerNama($id_proker)
			{
				
				 $query = $this->db->get_where('proker_tbl', array('proker_ID' => $id_proker));

        		 return $query->result_array();
				
			}

	function inputProker($data) {
		$this->db->insert('proker_tbl', $data);
	}

			function inputProkerPosisi($data) {
				$this->db->insert('prokerPosisi_tbl', $data);
			}

	function deleteProker($data) {
		$this->db->delete('proker_tbl', $data);
	}

			function deleteProkerPosisi($data) {
				$this->db->delete('prokerPosisi_tbl', $data);
			}

}