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
		$this->load->view('layout/footer');
		$this->load->view('proker/list',$data);

	}

	public function prokerDetail()
	{	
		$data['proker_data'] = $this->M_proker->tampil_prokerDetail()->result();
		$this->load->view('layout/header');
		$this->load->view('layout/footer');
		$this->load->view('proker/prokerDetail',$data);

	}

	public function addProker()
	{
		$namaProker = $this->input->post('proker_nama');
		$tanggalProker = $this->input->post('proker_tanggal');
		$tahunProker = $this->input->post('proker_tahun');
		$lembagaProker = $this->input->post('proker_lembaga');
		$data = array(
			'proker_nama' => $namaProker,
			'proker_tanggal' => $tanggalProker,
			'proker_tahun' => $tahunProker,
			'proker_lembaga' => $lembagaProker
		);
		// print_r($_POST);
		$this->M_proker->inputProker($data);
	}

	

}
