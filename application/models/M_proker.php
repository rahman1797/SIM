<?php 
 
class M_proker extends CI_Model{

	function tampil_proker(){
		return $this->db->get_where('proker_tbl', array('proker_lembaga' => $_SESSION['user_role'] ));
	}

	function tampil_proker_BEM(){
		return $this->db->get_where('proker_tbl', array('proker_lembaga' => 1 ));
	}


// Tampil pada proker dan sub function nya
	function tampil_prokerDetail(){
		return $this->db->get_where('proker_tbl', array('proker_ID' => $_GET['id_proker']));
	}

			function tampil_prokerPosisi(){
				return $this->db->get_where('prokerPosisi_tbl', array('id_proker' => $_GET['id_proker']));
			}

			function tampil_prokerAnggota(){
				return $this->db->get_where('prokerAnggota_tbl', array('id_proker' => $_GET['id_proker']));	
			}

			function tampil_prokerTugas(){
				return $this->db->get_where('prokerTugas_tbl', array('id_proker' => $_GET['id_proker']));	
			}

			function tampil_prokerEvaluasi(){
				return $this->db->get_where('prokerEvaluasi_tbl', array('id_proker' => $_GET['id_proker']));	
			}

					function tampil_prokerTugasSaya()
					{
						return $this->db->get_where('prokerTugas_tbl', array('id_user' => $_SESSION['user_ID'] ));
					}


			// Menghitung banyak nya jumlah data pada database dengan ketentuan tertentu
			function JumlahProkerTugas()
			{   
			    $query = $this->db->get_where('prokerTugas_tbl', array('id_proker' => $_GET['id_proker']));
			    if($query->num_rows()>0)
			    {
			      return $query->num_rows();
			    }
			    else
			    {
			      return 0;
			    }
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

			// Menghitung banyak nya jumlah data pada database dengan ketentuan tertentu
			function JumlahEvaluasiProker()
			{   
			    $query = $this->db->get_where('prokerEvaluasi_tbl', array('id_proker' => $_GET['id_proker']));
			    if($query->num_rows()>0)
			    {
			      return $query->num_rows();
			    }
			    else
			    {
			      return 0;
			    }
			}

			// Menghitung banyak nya jumlah data pada database dengan ketentuan tertentu
			function JumlahProkerAnggota()
			{   
			    $query = $this->db->get_where('prokerAnggota_tbl', array('id_proker' => $_GET['id_proker']));
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

			function getPosisiNama($id_posisi)
			{
				
				 $query = $this->db->get_where('prokerPosisi_tbl', array('prokerPosisi_ID' => $id_posisi));

        		 return $query->result_array();
				
			}


// Input Proker yang terdaftar beserta sub function nya
	function inputProker($data) {
		$this->db->insert('proker_tbl', $data);
	}

			function inputProkerPosisi($data) {
				$this->db->insert('prokerPosisi_tbl', $data);
			}

			function inputProkerAnggota($data) {
				$this->db->insert('prokerAnggota_tbl', $data);
			}

			function inputProkerTugas($data) {
				$this->db->insert('prokerTugas_tbl', $data);
			}

			function inputProkerEvaluasi($data) {
				$this->db->insert('prokerEvaluasi_tbl', $data);
			}


// Delete Proker yang terdaftar beserta sub function nya
	function deleteProker($data) {
		$this->db->delete('proker_tbl', $data);
	}

			function deleteProkerPosisi($data) {
				$this->db->delete('prokerPosisi_tbl', $data);
			}

			function deleteProkerAnggota($data) {
				$this->db->delete('prokerAnggota_tbl', $data);
			}

			function deleteProkerTugas($data) {
				$this->db->delete('prokerTugas_tbl', $data);
			}

			function deleteProkerEvaluasi($data) {
				$this->db->delete('prokerEvaluasi_tbl', $data);
			}

}