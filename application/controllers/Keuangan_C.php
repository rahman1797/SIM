<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan_C extends CI_Controller {

	function __Construct() {
        parent ::__construct();
        $this->load->model('M_keuangan');
        $this->load->model('M_proker');
        $this->load->model('M_sys');
        $this->load->helper('url');
        $this->load->helper('download');
        $this->load->library('upload');
    }
	
	function index(){	
		$data['proker_pemasukan'] = $this->M_keuangan->tampil_pemasukan_all()->result();
		$data['proker_pengeluaran'] = $this->M_keuangan->tampil_pengeluaran_all()->result();
		$data['data_proker'] = $this->M_proker->tampil_proker()->result();
		
		$this->load->view('layout/header');
		$this->load->view('keuangan_all', $data);
		$this->load->view('layout/footer');
	}

	function keuangan_proker(){	
		$data['proker_pemasukan'] = $this->M_keuangan->tampil_pemasukan()->result();
		$data['proker_pengeluaran'] = $this->M_keuangan->tampil_pengeluaran()->result();
		
		$this->load->view('layout/header');
		$this->load->view('proker/detailProker/prokerKeuangan', $data);
		$this->load->view('layout/footer');
	}

	function inputPemasukan(){
		$nominal = $this->input->post('pemasukan_nominal');
		$nominal = str_replace(',','', $nominal);
		$deskripsi = $this->input->post('pemasukan_deskripsi');
		$tanggal = $this->input->post('pemasukan_tanggal');
		$file = $this->input->post('pemasukan_file');
		$idProker = $this->input->post('id_proker');
		$lembaga = $this->input->post('pemasukan_lembaga');
		$idOpmawa = $this->input->post('id_opmawa');

		$rand_number = mt_rand();

		if (!isset($idProker)) {
			$idProker = 0;
		}

		// START UPLOAD
		$config['upload_path']	 = 'uploads/keuangan/';
	    $config['allowed_types'] = 'jpg|png|jpeg';
	    $config['max_size'] 	 = 20000; 
	    $config['file_name']	 = $idProker."-".$idOpmawa."-".$rand_number;

	    $this->load->library('upload', $config); 

	    $this->upload->initialize($config);
	   
	    if ($this->upload->do_upload('pemasukan_file')) { //use this function

	       $data['error'] = false;
	       $upload_data = $this->upload->data();
	       $data['data'] = $upload_data;
	       $data['msg'] = 'Image Successfully Uploaded.';

	       $path_parts = pathinfo($_FILES["pemasukan_file"]["name"]);
		   $extension = $path_parts['extension'];

	       $file_name = $idProker."-".$idOpmawa."-".$rand_number.".".$extension;

	       $database = array(
	       	   'pemasukan_nominal' => $nominal,
	       	   'pemasukan_deskripsi' => $deskripsi,
	       	   'pemasukan_tanggal' => $tanggal,
	           'pemasukan_file' => $file_name,
	           'id_proker' => $idProker,
	           'pemasukan_lembaga' => $lembaga,
	           'id_opmawa' => $idOpmawa
	           );

	       $this->db->insert('pemasukan_tbl', $database);
	       echo "<script>
					window.history.back();
				</script>";

		}

		else {

			$database = array(
	       	   'pemasukan_nominal' => $nominal,
	       	   'pemasukan_deskripsi' => $deskripsi,
	       	   'pemasukan_tanggal' => $tanggal,   
	           'id_proker' => $idProker,
	           'pemasukan_lembaga' => $lembaga,
	           'id_opmawa' => $idOpmawa
	           );

	       $this->db->insert('pemasukan_tbl', $database);

			echo "<script>window.history.back();
			$('.formPemasukan')[0].reset();</script>";
		}

		// END UPLOAD
	}

	function inputPengeluaran(){
		$nominal = $this->input->post('pengeluaran_nominal');
		$nominal = str_replace(',', '', $nominal);
		$deskripsi = $this->input->post('pengeluaran_deskripsi');
		$tanggal = $this->input->post('pengeluaran_tanggal');
		$file = $this->input->post('pengeluaran_file');
		$idProker = $this->input->post('id_proker');
		$lembaga = $this->input->post('pengeluaran_lembaga');
		$idOpmawa = $this->input->post('id_opmawa');

		// START UPLOAD

		$config['upload_path']	 = 'uploads/keuangan/';
	    $config['allowed_types'] = 'jpg|png|jpeg';
	    $config['max_size'] 	 = 20000; 
	    $config['file_name']	 = time();

	    $this->load->library('upload', $config); 

	    $this->upload->initialize($config);
	   
	    if ($this->upload->do_upload('pengeluaran_file')) { //use this function

	       $data['error'] = false;
	       $upload_data = $this->upload->data();
	       $data['data'] = $upload_data;
	       $data['msg'] = 'Image Successfully Uploaded.';

	       $path_parts = pathinfo($_FILES["pengeluaran_file"]["name"]);
		   $extension = $path_parts['extension'];

		   echo $extension;

	       $file_name = time().".".$extension;

	       $database = array(
	       	   'pengeluaran_nominal' => $nominal,
	       	   'pengeluaran_deskripsi' => $deskripsi,
	       	   'pengeluaran_tanggal' => $tanggal,
	           'pengeluaran_file' => $file_name,
	           'id_proker' => $idProker,
	           'pengeluaran_lembaga' => $lembaga,
	           'id_opmawa' => $idOpmawa
	           );

	       $this->db->insert('pengeluaran_tbl', $database);

	       echo "<script>
					window.history.back();
				</script>";
		}

		else {

			$database = array(
	       	   'pengeluaran_nominal' => $nominal,
	       	   'pengeluaran_deskripsi' => $deskripsi,
	       	   'pengeluaran_tanggal' => $tanggal,
	           
	           'id_proker' => $idProker,
	           'pengeluaran_lembaga' => $lembaga,
	           'id_opmawa' => $idOpmawa
	           );

	       $this->db->insert('pengeluaran_tbl', $database);

				// echo "BBBBBBB";
		  //      $error = array('error' => $this->upload->display_errors());
				// print_r($error);

				echo "<script>
					window.history.back();
				</script>";

		     }
		
		// END UPLOAD
		
	}

function delete_pemasukan() {
	$id = array('pemasukan_ID' => $_GET['id']);

	$query = $this->M_keuangan->delete_pemasukan_pengeluaran($id,'pemasukan_tbl');
	
	if ($query) {

		echo "delete berhasil";
	
	}
}

function delete_pengeluaran() {
	$id = array('pengeluaran_ID' => $_GET['id']);

	$query = $this->M_keuangan->delete_pemasukan_pengeluaran($id,'pengeluaran_tbl');
	if ($query) {

		echo "delete berhasil";
	
	}
}

}
