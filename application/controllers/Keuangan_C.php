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

	function inputPemasukan(){
		$nominal = $this->input->post('pemasukan_nominal');
		$deskripsi = $this->input->post('pemasukan_deskripsi');
		$tanggal = $this->input->post('pemasukan_tanggal');
		// $file = $this->input->post('pemasukan_file');
		$idProker = $this->input->post('id_proker');
		$lembaga = $this->input->post('pemasukan_lembaga');
		$idOpmawa = $this->input->post('id_opmawa');

		$data = array(
		
			'pemasukan_nominal' => $nominal,
			'pemasukan_deskripsi' => $deskripsi,
			'pemasukan_tanggal' => $tanggal,
			'id_proker' => $idProker,
			'pemasukan_lembaga' => $lembaga,
			'id_opmawa' => $idOpmawa, 

		);

		$this->M_keuangan->inputPemasukan($data);
		
	}

}
