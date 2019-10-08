<?php 
 
class M_keuangan extends CI_Model{

	function tampil_pemasukan(){
		return $this->db->get_where('pemasukan_tbl', array('id_proker' => $_GET['id_proker']));
	}

	function tampil_pengeluaran(){
		return $this->db->get_where('pengeluaran_tbl', array('id_proker' => $_GET['id_proker']));
	}

// FUNGSI INPUT DATA
	function inputPemasukan($data) {
		$this->db->insert('pemasukan_tbl', $data);
	}

	function inputPengeluaran($data) {
		$this->db->insert('pengeluaran_tbl', $data);
	}

// HITUNG KEUANGAN

	function pengeluaran($id){
		return $this->db->get_where('pengeluaran_tbl', array('id_proker' => $id));
	}

	function pemasukan($id){
		return $this->db->get_where('pemasukan_tbl', array('id_proker' => $id));
	}
	// function hitungPemasukan($id){
	// 	$this->db->select('pemasukan_nominal');
	// 	$this->db->get_where('pemasukan_tbl', array(
	// 		'id_proker' => $id
	// 	));
	// }

}