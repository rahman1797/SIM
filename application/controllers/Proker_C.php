<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proker_C extends CI_Controller {

	function __Construct(){
        parent ::__construct();
        $this->load->model('M_proker');
        $this->load->model('M_user');
    }
	//controller default
	public function index()
	{	
		$data['proker_data'] = $this->M_proker->tampil_proker()->result();
		$this->load->view('layout/header');
		$this->load->view('layout/footer');
		$this->load->view('proker/list',$data);

	}


// TAMPIL PROKER
	public function prokerDetail()
	{	
		$data['proker_data'] = $this->M_proker->tampil_prokerDetail()->result();
		$data['totalPosisiKepanitiaan'] = $this->M_proker->JumlahProkerPosisi();
		$data['totalAnggotaKepanitiaan'] = $this->M_proker->JumlahProkerAnggota();
		$this->load->view('layout/header');
		$this->load->view('layout/footer');
		$this->load->view('proker/prokerDetail',$data);

	}

			public function prokerPosisi()
			{	
				$data['proker_posisi'] = $this->M_proker->tampil_prokerPosisi()->result();
				$this->load->view('layout/header');
				$this->load->view('layout/footer');
				$this->load->view('proker/detailProker/prokerPosisi',$data);

			}	

			public function prokerAnggota()
			{	
				$data['proker_anggota'] = $this->M_proker->tampil_prokerAnggota()->result();
				$data['proker_posisi'] = $this->M_proker->tampil_prokerPosisi()->result();
				$data['user_data'] = $this->M_user->tampil_data()->result();
				$this->load->view('layout/header');
				$this->load->view('layout/footer');
				$this->load->view('proker/detailProker/prokerAnggota',$data);

			}	
#END# TAMPIL PROKER



// CRUD PROKER
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
		$this->M_proker->inputProker($data);
	}

			public function addProkerPosisi()
			{
				$namaPosisi = $this->input->post('prokerPosisi_nama');
				$idProker = $this->input->post('id_proker');
				$data = array(
					'prokerPosisi_nama' => $namaPosisi,
					'id_proker' => $idProker
				);
				$this->M_proker->inputProkerPosisi($data);
			}

			public function addProkerAnggota()
			{
				$anggotaNama = $this->input->post('prokerAnggota_nama');
				$anggotaPosisi = $this->input->post('prokerAnggota_posisi');
				$idProker = $this->input->post('id_proker');
				$data = array(
					'prokerAnggota_nama' => $anggotaNama,
					'id_proker' => $idProker,
					'id_posisi' => $anggotaPosisi
				);
				$this->M_proker->inputProkerAnggota($data);
			}

	public function delProker($id)
	{
		$idProker = array('proker_ID' => $id);
		$this->M_proker->deleteProker($idProker,'proker_tbl');
		redirect(base_url('Proker_C/index'));
	}

			public function delProkerPosisi($id)
			{
				$idPosisi = array('prokerPosisi_ID' => $id);
				$this->M_proker->deleteProkerPosisi($idPosisi,'prokerPosisi_tbl');
				echo "<script>
					window.history.back();
				</script>";
			}

			public function delProkerAnggota($id)
			{
				$idAnggota = array('prokerAnggota_ID' => $id);
				$this->M_proker->deleteProkerAnggota($idAnggota,'prokerAnggota_tbl');
				echo "<script>
					window.history.back();
				</script>";
			}
 #END# CRUD PROKER
	

}
