<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_C extends CI_Controller {

	function __Construct(){
        parent ::__construct();
        $this->load->model('M_proker');
        $this->load->model('M_user');
        $this->load->model('M_berkas');
        $this->load->helper('url');
         $this->load->library('upload');
    }
	//controller default
	public function index()
	{	
		$this->load->view('layout/header');
		$this->load->view('layout/footer');
		$this->load->view('proker/detailProker/prokerBerkas');

	}
		
	function do_upload(){
        $config['upload_path'] = './resources/uploads/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //Allowing types
        $config['encrypt_name'] = TRUE; //encrypt file name 
 
        $this->upload->initialize($config);
        if(!empty($_FILES['filefoto']['name'])){
 
            if ($this->upload->do_upload('filefoto')){
 
                $data   = $this->upload->data();
                $image  = $data['file_name']; //get file name
                $title  = $this->input->post('title');
                $this->upload_model->upload_image($title,$image);
                echo "Upload Successful";
 
            }else{
                echo "Upload failed. Image file must be gif|jpg|png|jpeg|bmp";
            }
                      
        }else{
            echo "Failed, Image file is empty.";
        }
                 
    }


}
