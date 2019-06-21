<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proker_C extends CI_Controller {

	function __Construct(){
        parent ::__construct();
        $this->load->model('M_proker');
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

	public function delProker($id)
	{
		$idProker = array('proker_ID' => $id);
		$this->M_proker->deleteProker($idProker,'proker_tbl');
		redirect(base_url('Proker_C/index'));
	}

			public function delProkerPosisi($id)
			{
				$idProker = array('prokerPosisi_ID' => $id);
				$this->M_proker->deleteProkerPosisi($idProker,'prokerPosisi_tbl');
				echo "<script>
					window.history.back();
				</script>";
			}
 #END# CRUD PROKER
	

}
