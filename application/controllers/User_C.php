<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_C extends CI_Controller {

	function __Construct(){
        parent ::__construct();
        $this->load->model('M_user');
    }

	//controller default
	public function index()
	{	
		$data['user_data'] = $this->M_user->tampil_data()->result();
		$this->load->view('layout/header');
		$this->load->view('layout/footer');
		$this->load->view('user/list', $data);
		
	}

	
	//**controller default

}
