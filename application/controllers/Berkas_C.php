<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berkas_C extends CI_Controller {

	function __Construct() {
        parent ::__construct();
        $this->load->model('M_proker');
        $this->load->model('M_user');
        $this->load->model('M_sys');
        $this->load->model('M_berkas');
        $this->load->helper('download');
        $this->load->library('upload');
    }
	
	function index() {	
		$data['berkas_data'] = $this->M_berkas->tampil_berkas()->result();
		$data['proker_data'] = $this->M_proker->tampil_proker()->result();
		$this->load->view('layout/header');
		$this->load->view('layout/footer');
		$this->load->view('berkas_all',$data);
	}

	function proker() {	
		$data['berkas_data'] = $this->M_berkas->tampil_berkas()->result();
		$this->load->view('layout/header');
		$this->load->view('layout/footer');
		$this->load->view('proker/detailProker/prokerBerkas',$data);
	}
			
	function uploadBerkas() {
		$config['upload_path']= 'uploads/'.$_GET['id_proker'].'/';
	    $config['allowed_types'] = 'gif|jpg|png|txt|pdf|xlsx|csv|xls|bmp|doc|docx'; 
	    $config['max_size']      = 10000; 
	    if (!is_dir('uploads/' . $_GET['id_proker'])) {
			mkdir('./uploads/' . $_GET['id_proker'], 0777, TRUE);
		}
     	$this->upload->initialize($config);
     	$this->load->library('upload', $config); 
     	if ($this->upload->do_upload('userfile')) { //use this function
	        $data['error'] = false;
	        $upload_data = $this->upload->data();
	        $data['data'] = $upload_data;
	        $data['msg'] = 'Image Successfully Uploaded.';
	        $file_name = $data['data']['file_name'];
	        $jenis = $this->input->post('berkas_jenis');
	        $database = array(
	            'berkas_nama' => $file_name,
	            'id_user' => $_SESSION['user_ID'],
	            'id_proker' => $_GET['id_proker'],
	            'berkas_lembaga' => $_SESSION['user_role'],
	            'berkas_jenis' =>  $jenis,
	            'id_opmawa' => $_SESSION['user_opmawa']
	            );
	        $result = $this->db->insert('berkas_tbl', $database);
	        echo "<script>history.go(-1)</script>";
	    } else {
	    	$data['msg'] = $this->upload->display_errors('', '<br>');
	     }			    	                 
    }

    function berkas_link(){
    	$link = $this->input->post('berkas_nama');
    	$jenis = $this->input->post('berkas_jenis');
    	$id_proker = $this->input->post('id_proker');
    	if ($link != "") {
    		$database = array(
	            'berkas_nama' => $link,
	            'id_user' => $_SESSION['user_ID'],
	            'id_proker' => $id_proker,
	            'berkas_lembaga' => $_SESSION['user_role'],
	            'berkas_jenis' =>  $jenis,
	            'id_opmawa' => $_SESSION['user_opmawa']
	            );
	    	$result = $this->db->insert('berkas_tbl', $database);
		} else {
			echo "Terjadi Kesalahan";
		}
    }

    function download(){
    	$nama_file = $_GET['name'];
    	force_download('uploads/' . $_GET['id_proker'] . '/' . $nama_file,NULL);
    }

    function delBerkas($id){
    	$idBerkas = array('berkas_ID' => $id);
    	$idProker = $_GET['id_proker'];
    	$nama_file = $this->M_berkas->getBerkasData($id);
    	$delete_file = unlink('uploads/'. $idProker . '/' . $nama_file['0']['berkas_nama']);

    	if ($delete_file) {
    		$this->M_berkas->deleteBerkas($idBerkas);
    	}
    }

    function delLink($id){
    	$idBerkas = array('berkas_ID' => $id);
    	$this->M_berkas->deleteBerkas($idBerkas);
    }
}
