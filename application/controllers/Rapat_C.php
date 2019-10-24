<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rapat_C extends CI_Controller {

	function __Construct(){
        parent ::__construct();
        $this->load->model('M_rapat');
    }
	
	function index()
	{	
		$data['jadwal_rapat'] = $this->M_rapat->tampil_jadwal()->result();
		$this->load->view('layout/header');
		$this->load->view('rapat', $data);
		$this->load->view('layout/footer');

	}

	function addJadwalRapat()
	{
		$tanggal = $this->input->post('rapat_tanggal');
		$deskripsi = $this->input->post('rapat_deskripsi');
		$idOpmawa = $this->input->post('id_opmawa');
		$lembaga = $this->input->post('rapat_lembaga');
		
		$data = array(
			'rapat_tanggal' => $tanggal,
			'rapat_deskripsi' => $deskripsi,
			'rapat_lembaga' => $lembaga,
			'id_opmawa' => $idOpmawa
		);
		$this->M_rapat->inputJadwalRapat($data);
	}


}
