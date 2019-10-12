<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan_C extends CI_Controller {

	function __Construct(){
        parent ::__construct();
        $this->load->model('M_keuangan');
        $this->load->helper('url');
        $this->load->helper('download');
        $this->load->library('upload');
    }
	
	public function index()
	{	
		$data['proker_pemasukan'] = $this->M_keuangan->tampil_pemasukan()->result();
		$data['proker_pengeluaran'] = $this->M_keuangan->tampil_pengeluaran()->result();
		
		$this->load->view('layout/header');
		$this->load->view('proker/detailProker/prokerKeuangan', $data);
		$this->load->view('layout/footer');

	}

	function inputPemasukan(){
		$nominal = $this->input->post('pemasukan_nominal');
		$deskripsi = $this->input->post('pemasukan_deskripsi');
		$tanggal = $this->input->post('pemasukan_tanggal');
		$file = $this->input->post('pemasukan_file');
		$idProker = $this->input->post('id_proker');
		$lembaga = $this->input->post('pemasukan_lembaga');
		$idOpmawa = $this->input->post('id_opmawa');


		// START UPLOAD

		if (isset($file)) {
			 // print_r($_POST);
			$config['upload_path']	 = 'uploads/';
		    $config['allowed_types'] = 'jpg|png|jpeg';
		    $config['max_size'] 	 = 20000; 

		    $this->upload->initialize($config);

		    $this->load->library('upload', $config); 
		   
		    if ($this->upload->do_upload('pemasukan_file')) { //use this function

		    	print_r($_POST);

		       $data['error'] = false;
		       $upload_data = $this->upload->data();
		       $data['data'] = $upload_data;
		       $data['msg'] = 'Image Successfully Uploaded.';

		       $file_name = time();

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
			}

			else {
					echo "string";
			        $data['msg'] = $this->upload->display_errors('', '<br>');

			     }
		}

		// END UPLOAD

		

		// $data = array(
		
		// 	'pemasukan_nominal' => $nominal,
		// 	'pemasukan_deskripsi' => $deskripsi,
		// 	'pemasukan_tanggal' => $tanggal,
		// 	'id_proker' => $idProker,
		// 	'pemasukan_lembaga' => $lembaga,
		// 	'id_opmawa' => $idOpmawa, 

		// );

		// $this->M_keuangan->inputPemasukan($data);

		// print_r($_POST);

		// echo time();
		
	}

}
