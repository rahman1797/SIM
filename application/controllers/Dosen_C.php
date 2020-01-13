<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_C extends CI_Controller {

	function __Construct(){
        parent ::__construct();
        $this->load->model('M_dosen');
        $this->load->model('M_proker');
        $this->load->model('M_user');
        $this->load->model('M_sys');
        $this->load->model('M_keuangan');
        $this->load->library('pdf');
    }

	function index(){	
		$data['data_proker_opmawa'] = $this->M_dosen->tampil_proker_opmawa()->result();
		$data['proker_berkas_lpj'] = $this->M_dosen->tampil_berkas_opmawa()->result();
		$this->load->view('layout/header');
		$this->load->view('layout/footer');
		$this->load->view('dosen/index', $data);	
	}

	function profil(){
		$data['profil'] = $this->M_dosen->getProfil()->result();
		$data['prodi_data'] = $this->M_sys->tampil_regis_prodi()->result();
		$this->load->view('layout/header');
		$this->load->view('layout/footer');
		$this->load->view('dosen/profil', $data);
	}

		function ubah_profil(){
			$idUser = $this->input->post('dosen_ID');
			$nama = $this->input->post('dosen_nama');
			$NIM = $this->input->post('doseb_nik');
			$prodi = $this->input->post('id_prodi');

			$where = array('dosen_ID' => $idUser);

			$data = array(
				'user_nama' => $nama,
				'user_NIM' => $NIM,
				'id_prodi' => $prodi
			);
			return $this->M_sys->updateData($where, $data, 'dosen_tbl');
		}

		function ubah_password(){
			$OldPass = $this->input->post('OldPassword');
			$NewPass = $this->input->post('NewPasswordConfirm');
			$idUser = $this->input->post('dosen_ID');
			$check_pass = $this->M_dosen->getProfil()->result_array();
			$check_old_pass = $check_pass['0']['dosen_password'];

			if ($OldPass == $check_old_pass) {
				$where = array('dosen_ID' => $idUser);
				$data = array('dosen_password' => $NewPass);
				$this->M_sys->updateData($where, $data, 'dosen_tbl');
				echo "berhasil";
			} else {
				echo "password lama salah";
			}
			return false;
		}

		function proker_opmawa_detail(){
			$data['proker_data'] = $this->M_proker->tampil_prokerDetail()->result();
			$data['proker_anggota'] = $this->M_proker->tampil_prokerAnggota()->result();
			$data['proker_posisi'] = $this->M_proker->tampil_prokerPosisi()->result();
			$data['user_data'] = $this->M_user->tampil_user()->result();
			$data['proker_pemasukan'] = $this->M_keuangan->tampil_pemasukan()->result();
			$data['proker_pengeluaran'] = $this->M_keuangan->tampil_pengeluaran()->result();
			$data['proker_berkas_lpj'] = $this->M_dosen->tampil_berkas_opmawa()->result();

			$this->load->view('layout/header');
			$this->load->view('layout/footer');
			$this->load->view('dosen/info_proker', $data);
		}

		function print_to_pdf(){	

			 	$data_opmawa_user = $this->M_sys->getOpmawaData($_SESSION['user_opmawa']);

				$tahun = $_GET['tahun'];
				$role = $_GET['role'];
				if ($role == 1) {
					$lembaga = "Eksekutif";
				}
				else if ($role == 2) {
					$lembaga = "Legislatif";
				}
				$pdf = new FPDF('p','mm','A4');
				$pdf->SetRightMargin(20);
			    // membuat halaman baru
			    $pdf->AddPage();

			    $pdf->SetFont('Arial','B',16);
			    $pdf->Cell(190,7,'Data program kerja Opmawa FMIPA tahun ' . $tahun ,0,1,'C');

			    $pdf->SetFont('Arial','',12);
			    $pdf->Cell(190,7, 'Diadakan oleh Lembaga ' . $lembaga  ,0,1,'C');

			    $result = $this->db->get_where('proker_tbl', array('proker_tahun' => $tahun, 'proker_lembaga' => $role))->result();
			    $no = 0;
			    foreach ($result as $r){

		    	$data_opmawa_proker = $this->M_sys->getOpmawaData($r->id_opmawa);
                                    
                // Memfilter opmawa berdasarkan tingkatan level dan prodi
                if ($data_opmawa_user["0"]["opmawa_level"] == $data_opmawa_proker["0"]["opmawa_level"]) {

				    $pdf->Ln(15);
				    $no++;

				    $pdf->SetFont('Arial','B',12);
				    $pdf->Cell(190,6,'Nama Program Kerja '. $no ,0);
				    $pdf->ln(4);
				    $pdf->SetFont('Arial','',12);
				    $pdf->Cell(190,12,$r->proker_nama,0,0);
				    $pdf->ln(7);
		
				    $pdf->SetFont('Arial','B',12);	
				    $pdf->Cell(85,12,'Deskripsi :',0);
				    $pdf->ln(5);
				    $pdf->SetFont('Arial','',12);
				    $pdf->ln(6);

				    if ($r->proker_deskripsi == "") {
				    	$pdf->Cell(190,12,'Tidak ada deskripsi',0);
				    }
				    else {
				    	$pdf->Multicell(170,5,$r->proker_deskripsi,0);
				    }
			    } }
			    $pdf->Output();	
		}
}