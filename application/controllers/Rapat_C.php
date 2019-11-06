<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rapat_C extends CI_Controller {

	function __Construct(){
        parent ::__construct();
        $this->load->model('M_rapat');
        $this->load->model('M_user');
    }
	
	function index()
	{	
		$data['jadwal_rapat'] = $this->M_rapat->tampil_jadwal()->result();
		$this->load->view('layout/header');
		$this->load->view('rapat', $data);
		$this->load->view('layout/footer');

	}

	function evaluasiRapat()
	{
		$data['evaluasi_rapat'] = $this->M_rapat->tampil_evaluasi()->result();
		$this->load->view('layout/header');
		$this->load->view('evaluasi_rapat', $data);
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

		function addEvaluasiRapat()
		{
			$idRapat = $this->input->post('id_rapat');
			$idUser = $this->input->post('id_user');
			$isiEvaluasi = $this->input->post('evaluasiRapat_isi');
			
			$data = array(
				'id_rapat' => $idRapat,
				'id_user' => $idUser,
				'evaluasiRapat_isi' => $isiEvaluasi,
			);
			$this->M_rapat->inputEvaluasiRapat($data);
		}

	function hapusJadwal()
	{
		$idRapat = array('rapat_ID' => $_GET['id']);
		$this->M_rapat->deleteJadwal($idRapat,'rapat_tbl');
		redirect(base_url('Rapat_C'));
	}

		function hapusEvaluasiRapat()
		{
			$idEvaluasi = array('evaluasiRapat_ID' => $_GET['id_evaluasi']);
			$this->M_rapat->deleteEvaluasiRapat($idEvaluasi, 'evaluasirapat_tbl');
			echo "<script>
					window.history.back();
				</script>";	
		}

}
