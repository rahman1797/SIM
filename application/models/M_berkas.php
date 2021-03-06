<?php 
 
class M_berkas extends CI_Model{

	function tampil_berkas(){
		return $this->db->get_where('berkas_tbl', array(
								// 'id_proker' => $_GET['id_proker'],
								'berkas_lembaga' => $_SESSION['user_role']
								));
	}

	function tampil_berkas_bem(){
		$id_proker = $_GET['id_proker'];
		if (!isset($id_proker)) {
			$id_proker = 0;
		}
		return $this->db->get_where('berkas_tbl', array(
							'berkas_lembaga' => 1,
							'id_opmawa' => $_SESSION['user_opmawa'],
							'id_proker' => $id_proker
						));		
	}

	function JumlahBerkasProker()
	{   
	    $query = $this->db->get_where('berkas_tbl', array('id_proker' => $_GET['id_proker']));
	   
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	      
	    }
	    else
	    {
	      return 0;
	    }
	}

	function JumlahBerkasAll($id_proker) {

		 $query = $this->db->get_where('berkas_tbl', array('id_proker' => $id_proker));
	   
		    if($query->num_rows()>0)
		    {
		      return $query->num_rows();
		      
		    }
		    else
		    {
		      return 0;
		    }

	}

	function JumlahBerkas()
	{   
	    $query = $this->db->get_where('berkas_tbl', array('berkas_lembaga' => $_SESSION['user_role']));
	   
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	      
	    }
	    else
	    {
	      return 0;
	    }
	}

	function getBerkasData($id)
	{
		
		 $query = $this->db->get_where('berkas_tbl', array('berkas_ID' => $id));

		 return $query->result_array();
		
	}


	function deleteBerkas($data) {
		$this->db->delete('berkas_tbl', $data);
	}


}