<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan_C extends CI_Controller {

	function __Construct(){
        parent ::__construct();
        $this->load->model('M_keuangan');
    }
	
	public function index()
	{	
		$data['proker_pemasukan'] = $this->M_keuangan->tampil_pemasukan()->result();
		$data['proker_pengeluaran'] = $this->M_keuangan->tampil_pengeluaran()->result();
		
		$this->load->view('layout/header');
		$this->load->view('proker/detailProker/prokerKeuangan', $data);
		$this->load->view('layout/footer');

	}

}
