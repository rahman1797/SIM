<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_C extends CI_Controller {

	function __Construct(){
        parent ::__construct();
        $this->load->model('M_sys');
        $this->load->model('M_proker');
        $this->load->model('M_berkas');
        $this->load->model('M_user');
        $this->load->model('M_keuangan');
    }
	
	function index()
	{	
		$data['data_proker'] = $this->M_proker->tampil_proker()->result();
		$data['data_tugasSaya'] = $this->M_proker->tampil_prokerTugasSaya()->result();
		$data['allBerkas'] = $this->M_berkas->JumlahBerkas();
		$this->load->view('layout/header');
		$this->load->view('beranda', $data);
		$this->load->view('layout/footer');

	}

	function profil()
	{
		$this->load->view('layout/header');
		$this->load->view('layout/footer');
		$this->load->view('user/profil');
	}

	function regProdi()
	{
		$data['data_prodi'] = $this->M_sys->tampil_regis_prodi()->result();
		$this->load->view('layout/header');
		$this->load->view('layout/footer');
		$this->load->view('System_Regis/regProdi', $data);		
	}

	function regPosisi()
	{
		$data['data_posisi'] = $this->M_sys->tampil_regis_posisi_byLembaga()->result();
		$this->load->view('layout/header');
		$this->load->view('layout/footer');
		$this->load->view('System_Regis/regPosisi', $data);		
	}

	function regOpmawa()
	{
		$data['data_opmawa'] = $this->M_sys->tampil_regis_opmawa()->result();
		$data['prodi_data'] = $this->M_sys->tampil_regis_prodi()->result();
		$data['user_data'] = $this->M_user->tampil_user()->result();
		$this->load->view('layout/header');
		$this->load->view('layout/footer');
		$this->load->view('System_Regis/regOpmawa', $data);		
	}

			function opmawaDetail()
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
	function addOPMAWA()
	{

		$namaKetua = $this->input->post('nama_user');
		$namaKabinet = $this->input->post('nama_kabinet');
		$tahunKepengurusan = $_SESSION['user_tahun'] + 1;
		$data = array(
			'opmawa_kabinet' => $namaKabinet,
			'id_user' => $namaKetua,
			'opmawa_tahun' => $tahunKepengurusan
		);
		$this->M_sys->inputOpmawa($data);	
	}

			function addDepartemen()
			{
				$nama_departemen = $this->input->post('nama_departemen');
				$idOpmawa = $this->input->post('id_opmawa');
				$data = array(
					'departemen_nama' => $nama_departemen,
					'id_opmawa' => $idOpmawa
				);
				$this->M_sys->inputDepartemen($data);	
			}

// SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
// SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS


	function addProdi()
	{
		$nama = $this->input->post('nama_prodi');
		$data = array(
			'prodi_nama' => $nama
		);
		$this->M_sys->inputProdi($data);
	}

	function addPosisi()
	{
		$namaPosisi = $this->input->post('nama_posisi');
		$namaLembaga = $this->input->post('nama_lembaga');
		$data = array(
			'posisi_nama' => $namaPosisi,
			'posisi_lembaga' => $namaLembaga
		);
		$this->M_sys->inputPosisi($data);		
	}

	function delProdi($id)
	{
		$idPro = array('prodi_ID' => $id);
		$this->M_sys->deleteProdi($idPro,'prodi_tbl');
		redirect(base_url('Main_C/regProdi'));
	}

	function delPosisi($id)
	{
		$idPos = array('posisi_ID' => $id);
		$this->M_sys->deletePosisi($idPos,'posisi_tbl');
		redirect(base_url('Main_C/regPosisi'));
	}

}
