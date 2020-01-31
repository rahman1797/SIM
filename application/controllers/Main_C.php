<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_C extends CI_Controller {

	function __Construct(){
        parent ::__construct();
        $this->load->model('M_sys');
        $this->load->model('M_proker');
        $this->load->model('M_berkas');
        $this->load->model('M_user');
        $this->load->model('M_rapat');
        $this->load->model('M_keuangan');
    }
	
	function index()
	{	
		$data['data_proker'] = $this->M_proker->tampil_proker()->result();
		$data['data_tugasSaya'] = $this->M_proker->tampil_prokerTugasSaya()->result();
		$data['rapat_terdekat'] = $this->M_rapat->tampil_jadwal()->result();
		$data['allBerkas'] = $this->M_berkas->JumlahBerkas();

		$this->load->view('layout/header');
		$this->load->view('beranda', $data);
		$this->load->view('layout/footer');

	}

	function backup_database() {
		$this->load->dbutil();
		$prefs = array(
			'format' => 'zip',
			'filename' => 'sim.sql'
		);
		$backup = & $this->dbutil->backup($prefs);
		$db_name = 'sim-bckup-' . date("s-i-H-d-m-Y") . '.zip';
		$save = 'assets/sql/' . $db_name;
		$this->load->helper('file');
		write_file($save, $backup);
		$this->load->helper('download');
		force_download($db_name, $backup);
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
		$this->load->view('layout/header');
		$this->load->view('layout/footer');
		$this->load->view('System_Regis/regOpmawa', $data);		
	}

			function opmawaDetail()
			{
				$data['detail_opmawa'] = $this->M_sys->tampil_opmawaDetail()->result();
				$data['detail_departemenOpmawa'] = $this->M_sys->tampil_departemenOpmawaDetail()->result();
				$data['user_data'] = $this->M_user->tampil_user()->result();
				$this->load->view('layout/header');
				$this->load->view('layout/footer');
				$this->load->view('System_Regis/opmawa/opmawaDetail', $data);		
			}



// ON PROGGRESSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
//	SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
//	SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
	function addOpmawa()
	{
		// $namaKetua = $this->input->post('nama_user');
		$namaKabinet = $this->input->post('nama_kabinet');
		$tahunKepengurusan = $_SESSION['user_tahun'] + 1;
		$level = $this->input->post('opmawa_level');
		$data = array(
			'opmawa_kabinet' => $namaKabinet,
			// 'id_user' => $namaKetua,
			'opmawa_tahun' => $tahunKepengurusan,
			'opmawa_level' => $level
		);
		$this->M_sys->inputOpmawa($data);	

		redirect(base_url('Main_C/regOpmawa'));

	}

			function addKetuaOpmawa(){

				$nama = $this->input->post('user_nama');
				echo $nama;
				$idToUser = $this->M_user->getUserNama($nama);
				
				$NIM = $idToUser['0']['user_NIM']."-".$idToUser['0']['user_tahun'];;
				// $pass = $idToUser['0']['user_pass'];
				// $prodi = $idToUser['0']['id_prodi'];
				// $posisi = $idToUser['0']['id_posisi'];
				$idOpmawa = $this->input->post('id_opmawa');
				$idDepartemen = $this->input->post('user_departemen');
				$tahun = $idToUser['0']['user_tahun'];
				// $role = $idToUser['0']['user_role'];
				$data = array(
					// 'user_nama' => $nama,
					// 'user_NIM' => $NIM,
					// 'user_pass' => $pass,
					// 'id_prodi' => $prodi,
					'id_posisi' => 1, //update
					'id_opmawa' => $idOpmawa, //update
					'id_departemen' => $idDepartemen, //update
					'user_tahun' => $tahun + 1, //update
					// 'user_role' => $role
				);

				$where = array('user_ID' => $idToUser['0']['user_ID']);
				$this->M_sys->updateData($where, $data, 'user_tbl');

				// update data ketua opmawa
				$data_ketua = array(
					'id_user' => $nama
				);
				$where = array('opmawa_ID' => $idOpmawa);
				$this->M_sys->updateData($where, $data_ketua, 'opmawa_tbl');

				// menambah backup opmawa sebelumnya
				$nama = $idToUser['0']['user_nama'];
				$NIM = $idToUser['0']['user_NIM']."-".$idToUser['0']['user_tahun'];;
				$pass = $idToUser['0']['user_pass'];
				$prodi = $idToUser['0']['id_prodi'];
				$posisi = $idToUser['0']['id_posisi'];
				$idOpmawa = $idToUser['0']['id_opmawa'];
				$idDepartemen = $idToUser['0']['id_departemen'];
				$tahun = $idToUser['0']['user_tahun'];
				$role = $idToUser['0']['user_role'];
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

	function delOpmawa($id)
	{
		$idOp = array('opmawa_ID' => $id);
		$this->M_sys->deleteOpmawa($idOp,'opmawa_tbl');
		redirect(base_url('Main_C/regOpmawa'));
	}

	function delDepartemen($id)
	{
		$idDep = array('departemen_ID' => $id);
		$this->M_sys->deleteDepartemen($idDep,'departemen_tbl');
		// redirect(base_url('Main_C/opmawaDetail?id_opmawa=' + $idOp));
		echo "<script>window.history.back()</script>";
	}

	function delPosisi($id)
	{
		$idPos = array('posisi_ID' => $id);
		$this->M_sys->deletePosisi($idPos,'posisi_tbl');
		redirect(base_url('Main_C/regPosisi'));
	}

}
