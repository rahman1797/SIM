<?php 
 
class M_berkas extends CI_Model{

	function tampil_berkas(){
		return $this->db->get_where('berkas_tbl', array(
								// 'id_proker' => $_GET['id_proker'],
								'berkas_lembaga' => $_SESSION['user_role']
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
	    $query = $this->db->get_where('berkas_tbl');
	   
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