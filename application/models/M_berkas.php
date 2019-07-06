<?php 
 
class M_berkas extends CI_Model{

	function tampil_berkas(){
		return $this->db->get_where('berkas_tbl');
	}

	function upload_image($title,$image){
        $data = array(
            'title' => $title,
            'file_name' => $image, 
            );
        $result=$this->db->insert('gallery',$data);
        return $result;
    }

}