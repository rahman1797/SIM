<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proker_C extends CI_Controller {

	function __Construct(){
        parent ::__construct();
        $this->load->model('M_proker');
    }
	//controller default
	public function index()
	{	
		$data['proker_data'] = $this->M_proker->tampil_proker()->result();
		$this->load->view('layout/header');
		$this->load->view('proker/list',$data);
		$this->load->view('layout/footer');

	}

	public function prokerDetail()
	{	
		$data['proker_data'] = $this->M_proker->tampil_prokerDetail()->result();
		$this->load->view('layout/header');
		$this->load->view('proker/prokerDetail',$data);
		$this->load->view('layout/footer');

	}

	

}
