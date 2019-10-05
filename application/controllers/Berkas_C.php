<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berkas_C extends CI_Controller {

	function __Construct(){
        parent ::__construct();
        $this->load->model('M_proker');
        $this->load->model('M_user');
        $this->load->model('M_berkas');
        $this->load->helper('url');
        $this->load->helper('download');
        $this->load->library('upload');
    }
	//controller default
	public function index()
	{	
		$data['berkas_data'] = $this->M_berkas->tampil_berkas()->result();
		$this->load->view('layout/header');
		$this->load->view('layout/footer');
		$this->load->view('proker/detailProker/prokerBerkas',$data);

	}
	

	public function allBerkas()
	{	
		$data['berkas_data'] = $this->M_berkas->tampil_berkas()->result();
		
		$this->load->view('layout/header');
		$this->load->view('layout/footer');
		$this->load->view('berkas_all',$data);

	}
		
	function uploadBerkas(){
         		
         		$config['upload_path']= 'uploads/';
			     $config['allowed_types'] = 'gif|jpg|png|txt|pdf|xlsx|csv|xls|bmp|doc|docx'; 
			     $config['max_size']      = 10000; 

			     $this->upload->initialize($config);

			     $this->load->library('upload', $config); 
			     if ($this->upload->do_upload('userfile')) { //use this function

			        $data['error'] = false;
			        $upload_data = $this->upload->data();
			        $data['data'] = $upload_data;
			        $data['msg'] = 'Image Successfully Uploaded.';

			        $file_name = $data['data']['file_name'];

			        $database = array(
			            'berkas_nama' => $file_name,
			            'id_user' => $_SESSION['user_ID'],
			            'id_proker' => $_GET['id_proker'],
			            'berkas_lembaga' => $_SESSION['user_role'] 
			            );

			        $result = $this->db->insert('berkas_tbl', $database);

			        echo $file_name;

			     } else {

			        $data['msg'] = $this->upload->display_errors('', '<br>');

			     }

			    
			                 
    }


    // function upload(){
    // 	$config = array(
    // 				'upload_path' => 'uploads/',
    // 				'allowed_types' => 'gif|jpg|png|txt|pdf|xlsx|csv|xls|bmp',
    // 				'max_size' => 25000
    // 				);

    // 	$this->upload->initialize($config);

    // 	$file = $this->upload->data();

    // 	// print_r($file);
        

    //     $database = array(
    //         'berkas_nama' => $file,
    //         'id_user' => $_SESSION['user_ID'],
    //         'id_proker' => $_GET['id_proker'],
    //         'berkas_lembaga' => $_SESSION['user_role'] 
    //         );

    //     $result = $this->db->insert('berkas_tbl', $database);
        
    //     print_r($database);
    // }

    function download(){
    	$nama_file = $_GET['name'];
    	force_download("uploads/".$nama_file,NULL);
    }

}
