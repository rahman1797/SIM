<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_C extends CI_Controller {

	function __Construct(){
        parent ::__construct();
        $this->load->model('M_sys');
        $this->load->model('M_proker');
        $this->load->model('M_berkas');
        $this->load->model('M_user');
    }
	
	public function index()
	{	
		$data['data_proker'] = $this->M_proker->tampil_proker()->result();
		$data['data_tugasSaya'] = $this->M_proker->tampil_prokerTugasSaya()->result();
		$this->load->view('layout/header');
		$this->load->view('beranda', $data);
		$this->load->view('layout/footer');

	}

	public function Sysregis()
	{
		$data['data_prodi'] = $this->M_sys->tampil_regis_prodi()->result();
		$data['data_posisi'] = $this->M_sys->tampil_regis_posisi_byLembaga()->result();
		$data['data_opmawa'] = $this->M_sys->tampil_regis_opmawa()->result();
		$this->load->view('layout/header');
		$this->load->view('layout/footer');
		$this->load->view('System_Regis/Sysregis', $data);		
	}

			public function opmawaDetail()
			{
				$data['detail_opmawa'] = $this->M_sys->tampil_opmawaDetail()->result();
				$data['detail_departemenOpmawa'] = $this->M_sys->tampil_departemenOpmawaDetail()->result();
				$this->load->view('layout/header');
				$this->load->view('layout/footer');
				$this->load->view('System_Regis/opmawa/opmawaDetail', $data);		
			}



// ON PROGGRESSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
//	SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
//	SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
	public function addOPMAWA()
	{
		$namaKetua = $this->input->post('nama_ketua');
		$namaKabinet = $this->input->post('nama_kabinet');
		$tahunKepengurusan = $_SESSION['user_tahun'] + 1;
		$data = array(
			'opmawa_kabinet' => $namaKabinet,
			'opmawa_ketua' => $namaKetua,
			'opmawa_tahun' => $tahun_kepengurusan
		);
		$this->M_sys->inputOpmawa($data);	
	}

			function addDepartemen()
			{
				$nama_departemen = $this->input->post('nama_departemen');
				$idOpmawa = $this->input->$_GET['id_opmawa'];
				$data = array(
					'departemen_nama' => $nama_departemen,
					'id_opmawa' => $idOpmawa
				);
				$this->M_sys->inputDepartemen($data);	
			}

// SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
// SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS


	public function addProdi()
	{
		$nama = $this->input->post('nama_prodi');
		$data = array(
			'prodi_nama' => $nama
		);
		$this->M_sys->inputProdi($data);
	}

	public function addPosisi()
	{
		$namaPosisi = $this->input->post('nama_posisi');
		$namaLembaga = $this->input->post('nama_lembaga');
		$data = array(
			'posisi_nama' => $namaPosisi,
			'posisi_lembaga' => $namaLembaga
		);
		$this->M_sys->inputPosisi($data);		
	}

	public function delProdi($id)
	{
		$idPro = array('prodi_ID' => $id);
		$this->M_sys->deleteProdi($idPro,'prodi_tbl');
		redirect(base_url('Main_C/Sysregis'));
	}

	public function delPosisi($id)
	{
		$idPos = array('posisi_ID' => $id);
		$this->M_sys->deletePosisi($idPos,'posisi_tbl');
		redirect(base_url('Main_C/Sysregis'));
	}

}
