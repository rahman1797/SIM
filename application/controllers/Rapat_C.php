<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rapat_C extends CI_Controller {

	function __Construct(){
        parent ::__construct();
        $this->load->model('M_rapat');
    }
	
	public function index()
	{	
		$data['jadwal_rapat'] = $this->M_rapat->tampil_jadwal()->result();
		$this->load->view('layout/header');
		$this->load->view('rapat', $data);
		$this->load->view('layout/footer');

	}


}
