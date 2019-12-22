<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_C extends CI_Controller {

	function __Construct(){
        parent ::__construct();
        $this->load->model('M_dosen');
        $this->load->model('M_proker');
    }

	function index()
	{	
		$data['data_proker_opmawa'] = $this->M_dosen->tampil_proker_opmawa()->result();
		// $data['prodi_data'] = $this->M_sys->tampil_regis_prodi()->result();
		// $data['posisi_data'] = $this->M_sys->tampil_regis_posisi_byLembaga()->result();
		// $data['departemen_data'] = $this->M_sys->tampil_departemenOpmawa()->result();
		$this->load->view('layout/header');
		$this->load->view('layout/footer');
		$this->load->view('dosen/index', $data);
		
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

		function ubah_profil()
		{
			$idUser = $this->input->post('user_ID');
			$nama = $this->input->post('user_nama');
			$NIM = $this->input->post('user_NIM');
			$prodi = $this->input->post('id_prodi');
			$departemen = $this->input->post('id_departemen');
			$posisi = $this->input->post('id_posisi');

			$where = array('user_ID' => $idUser);

			$data = array(

				'user_nama' => $nama,
				'user_NIM' => $NIM,
				'id_prodi' => $prodi,
				'id_departemen' => $departemen,
				'id_posisi' => $posisi
				
			);
			
			return $this->M_sys->updateData($where, $data, 'user_tbl');

			// if ($result) {
			// 	echo "berhasil";
			// }

			// else {
			// 	echo "tidak  berhasil";
			// }

		}

		function ubah_password()
		{

			$OldPass = $this->input->post('OldPassword');
			$NewPass = $this->input->post('NewPasswordConfirm');

			$idUser = $this->input->post('user_ID');

			$check_pass = $this->M_user->getProfil()->result_array();

			$check_old_pass = $check_pass['0']['user_pass'];

			if ($OldPass == $check_old_pass) {

				$where = array('user_ID' => $idUser);

				$data = array('user_pass' => $NewPass);
				
				$this->M_sys->updateData($where, $data, 'user_tbl');
				
				echo "berhasil";
			}

			else {

				echo "password lama salah";

			}

			return false;

		}



}
