<?php 
 
class M_keuangan extends CI_Model{

	function tampil_pemasukan(){
		return $this->db->get_where('pemasukan_tbl', array('id_proker' => $_GET['id_proker']));
	}

	function tampil_pengeluaran(){
		return $this->db->get_where('pengeluaran_tbl', array('id_proker' => $_GET['id_proker']));
	}

}