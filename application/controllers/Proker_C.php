<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proker_C extends CI_Controller {

	function __Construct(){
        parent ::__construct();
        $this->load->model('M_proker');
        $this->load->model('M_user');
        $this->load->model('M_berkas');
        $this->load->model('M_keuangan');
        $this->load->model('M_sys');
    }
	
	function index()
	{	
		$data['proker_data'] = $this->M_proker->tampil_proker()->result();
		$this->load->view('layout/header');
		$this->load->view('layout/footer');
		$this->load->view('proker/list',$data);
	}

	function proker_bem()
	{	
		$data['proker_BEM'] = $this->M_proker->tampil_proker_BEM()->result();
		$this->load->view('layout/header');
		$this->load->view('layout/footer');
		$this->load->view('proker/listBEM',$data);

	}

	function ubah_output()
	{
		$idProker = $this->input->post('id_proker');
		$output = $this->input->post('proker_output');

		$where = array('proker_ID' => $idProker);

		$data = array(

			'proker_output' => $output
				
		);
			
			return $this->M_sys->updateData($where, $data, 'proker_tbl');
	}

		function nilai_proker_bem()
		{
			$idProker  = $this->input->post('proker_ID');
			$nilai = $this->input->post('proker_nilai');

			$where = array('proker_ID' => $idProker);
			$data = array('proker_nilai' => $nilai);
			$this->M_sys->updateData($where, $data, 'proker_tbl');
								
		}

		function proker_bem_detail()
		{
			$data['proker_data'] = $this->M_proker->tampil_prokerDetail()->result();
			$data['proker_anggota'] = $this->M_proker->tampil_prokerAnggota()->result();
			$data['proker_posisi'] = $this->M_proker->tampil_prokerPosisi()->result();
			$data['user_data'] = $this->M_user->tampil_user()->result();
			$data['proker_pemasukan'] = $this->M_keuangan->tampil_pemasukan()->result();
			$data['proker_pengeluaran'] = $this->M_keuangan->tampil_pengeluaran()->result();
			$data['proker_evaluasi'] = $this->M_proker->tampil_prokerEvaluasi()->result();

			$this->load->view('layout/header');
			$this->load->view('layout/footer');
			$this->load->view('proker/legis/proker_bem_detail', $data);
		
		}


// TAMPIL PROKER
	function prokerDetail()
	{	
		$data['proker_data'] = $this->M_proker->tampil_prokerDetail()->result();
		$data['totalPosisiKepanitiaan'] = $this->M_proker->JumlahProkerPosisi();
		$data['totalAnggotaKepanitiaan'] = $this->M_proker->JumlahProkerAnggota();
		$data['totalTugas'] = $this->M_proker->JumlahProkerTugas();
		$data['totalBerkas'] = $this->M_berkas->JumlahBerkasProker();
		$data['totalEvaluasi'] = $this->M_proker->JumlahEvaluasiProker();
		$this->load->view('layout/header');
		$this->load->view('layout/footer');
		$this->load->view('proker/prokerDetail',$data);

	}

			function prokerPosisi()
			{	
				$data['proker_posisi'] = $this->M_proker->tampil_prokerPosisi()->result();
				$this->load->view('layout/header');
				$this->load->view('layout/footer');
				$this->load->view('proker/detailProker/prokerPosisi',$data);

			}	

			function prokerAnggota()
			{	
				$data['proker_anggota'] = $this->M_proker->tampil_prokerAnggota()->result();
				$data['proker_posisi'] = $this->M_proker->tampil_prokerPosisi()->result();
				$data['user_data'] = $this->M_user->tampil_user()->result();
				$this->load->view('layout/header');
				$this->load->view('layout/footer');
				$this->load->view('proker/detailProker/prokerAnggota',$data);

			}	

			function prokerTugas()
			{	
				$data['proker_tugas'] = $this->M_proker->tampil_prokerTugas()->result();
				$data['anggota_data'] = $this->M_proker->tampil_prokerAnggota()->result();
				$this->load->view('layout/header');
				$this->load->view('layout/footer');
				$this->load->view('proker/detailProker/prokerTugas',$data);

			}

			function prokerEvaluasi()
			{
				$data['proker_evaluasi'] = $this->M_proker->tampil_prokerEvaluasi()->result();

				$this->load->view('layout/header');
				$this->load->view('layout/footer');
				$this->load->view('proker/detailProker/prokerEvaluasi',$data);				
			}

				function checkTugas() {
					$status  = $this->input->post('prokerTugas_status');
					$idTugas = $this->input->post('prokerTugas_ID');

					if ($status == 0) {
						$where = array('prokerTugas_ID' => $idTugas);
						$data = array('prokerTugas_status' => 1);
						$this->M_sys->updateData($where, $data, 'prokerTugas_tbl');
						
					}

					elseif ($status == 1) {
						$where = array('prokerTugas_ID' => $idTugas);
						$data = array('prokerTugas_status' => 0);
						$this->M_sys->updateData($where, $data, 'prokerTugas_tbl');
						
					}

				}
#END# TAMPIL PROKER



// CRUD PROKER
	function addProker()
	{
		$namaProker = $this->input->post('proker_nama');
		$tanggalProker = $this->input->post('proker_tanggal');
		$tahunProker = $this->input->post('proker_tahun');
		$deskripsiProker = $this->input->post('proker_deskripsi');
		$jenisProker = $this->input->post('proker_jenis');
		$lembagaProker = $this->input->post('proker_lembaga');
		$data = array(
			'proker_nama' => $namaProker,
			'proker_tanggal' => $tanggalProker,
			'proker_deskripsi' => $deskripsiProker,
			'proker_jenis' => $jenisProker,
			'proker_tahun' => $tahunProker,
			'proker_lembaga' => $lembagaProker
		);
		$this->M_proker->inputProker($data);
	}

			function addProkerPosisi()
			{
				$namaPosisi = $this->input->post('prokerPosisi_nama');
				$idProker = $this->input->post('id_proker');
				$data = array(
					'prokerPosisi_nama' => $namaPosisi,
					'id_proker' => $idProker
				);
				$this->M_proker->inputProkerPosisi($data);
			}

			function addProkerAnggota()
			{
				$anggotaNama = $this->input->post('prokerAnggota_nama');
				$anggotaPosisi = $this->input->post('prokerAnggota_posisi');
				$idProker = $this->input->post('id_proker');
				$data = array(
					'id_user' => $anggotaNama,
					'id_proker' => $idProker,
					'id_posisi' => $anggotaPosisi
				);
				$this->M_proker->inputProkerAnggota($data);
			}

			function addProkerTugas()
			{
				$tugasPj = $this->input->post('prokerTugas_pj');
				$tugasDeskripsi = $this->input->post('prokerTugas_deskripsi');
				$idProker = $this->input->post('id_proker');
				$data = array(
					'id_user' => $tugasPj,
					'id_proker' => $idProker,
					'prokerTugas_deskripsi' => $tugasDeskripsi
				);
				$this->M_proker->inputProkerTugas($data);
			}

			function addProkerEvaluasi()
			{
				$isi = $this->input->post('prokerEvaluasi_isi');
				$idUser = $this->input->post('id_user');
				$idProker = $this->input->post('id_proker');
				$data = array(
					'id_user' => $idUser,
					'id_proker' => $idProker,
					'prokerEvaluasi_isi' => $isi
				);
				$this->M_proker->inputProkerEvaluasi($data);
			}

	function delProker($id)
	{
		$idProker = array('proker_ID' => $id);
		$this->M_proker->deleteProker($idProker,'proker_tbl');
		redirect(base_url('Proker_C/index'));
	}

			function delProkerPosisi($id)
			{
				$idPosisi = array('prokerPosisi_ID' => $id);
				$this->M_proker->deleteProkerPosisi($idPosisi,'prokerPosisi_tbl');
				echo "<script>
					window.history.back();
				</script>";
			}

			function delProkerAnggota($id)
			{
				$idAnggota = array('prokerAnggota_ID' => $id);
				$this->M_proker->deleteProkerAnggota($idAnggota,'prokerAnggota_tbl');
				echo "<script>
					window.history.back();
				</script>";
			}

			function delProkerTugas($id)
			{
				$idTugas = array('prokerTugas_ID' => $id);
				$this->M_proker->deleteProkerTugas($idTugas,'prokerTugas_tbl');
				echo "<script>
					window.history.back();
				</script>";
			}

			function delProkerEvaluasi($id)
			{
				$idEvaluasi = array('prokerEvaluasi_ID' => $id);
				$this->M_proker->deleteProkerEvaluasi($idEvaluasi,'prokerEvaluasi_tbl');
				echo "<script>
					window.history.back();
				</script>";
			}
 #END# CRUD PROKER

}
