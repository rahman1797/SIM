<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_C extends CI_Controller {

	function __Construct(){
        parent ::__construct();
        $this->load->model('M_user');
        $this->load->model('M_sys');
    }

	function index()
	{	
		$data['user_data'] = $this->M_user->tampil_user_byLembaga()->result();
		$data['prodi_data'] = $this->M_sys->tampil_regis_prodi()->result();
		$data['posisi_data'] = $this->M_sys->tampil_regis_posisi_byLembaga()->result();
		$data['departemen_data'] = $this->M_sys->tampil_departemenOpmawa()->result();
		$this->load->view('layout/header');
		$this->load->view('layout/footer');
		$this->load->view('user/list', $data);
		
	}

	function profil()
	{
		$data['profil'] = $this->M_user->getProfil()->result();
		$data['prodi_data'] = $this->M_sys->tampil_regis_prodi()->result();
		$data['posisi_data'] = $this->M_sys->tampil_regis_posisi_byLembaga()->result();
		$data['departemen_data'] = $this->M_sys->tampil_departemenOpmawa()->result();
		$this->load->view('layout/header');
		$this->load->view('layout/footer');
		$this->load->view('user/profil', $data);
	}

	function addAnggota()
	{
		$nama = $this->input->post('user_nama');
		$NIM = $this->input->post('user_NIM');
		$pass = $this->input->post('user_pass_check');
		$prodi = $this->input->post('user_prodi');
		$posisi = $this->input->post('user_posisi');
		$idOpmawa = $this->input->post('user_opmawa');
		$idDepartemen = $this->input->post('user_departemen');
		$tahun = $this->input->post('user_tahun');
		$role = $this->input->post('user_role');
		$data = array(
			'user_nama' => $nama,
			'user_NIM' => $NIM,
			'user_pass' => $pass,
			'id_prodi' => $prodi,
			'id_posisi' => $posisi,
			'id_opmawa' => $idOpmawa,
			'id_departemen' => $idDepartemen,
			'user_tahun' => $tahun,
			'user_role' => $role
		);
		$this->M_user->inputAnggota($data);
	}

	function delAnggota($id)
	{
		$idUser = array('user_ID' => $id);
		$this->M_user->deleteAnggota($idUser,'user_tbl');
		redirect(base_url('User_C/index'));
	}

}
