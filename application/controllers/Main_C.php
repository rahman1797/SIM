<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_C extends CI_Controller {

	function __Construct(){
        parent ::__construct();
        $this->load->model('M_sys');
    }
	//controller default
	public function index()
	{	

		$this->load->view('layout/header');
		$this->load->view('beranda');
		$this->load->view('layout/footer');

	}

	public function Sysregis()
	{
		$data['data_prodi'] = $this->M_sys->tampil_regis_prodi()->result();
		$data['data_posisi'] = $this->M_sys->tampil_regis_posisi()->result();
		$this->load->view('layout/header');
		$this->load->view('layout/footer');
		$this->load->view('System_Regis/Sysregis', $data);		
	}
	//**controller default

}
