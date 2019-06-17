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
