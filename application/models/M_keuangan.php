<?php 
 
class M_keuangan extends CI_Model{

	function tampil_pemasukan_all(){
		return $this->db->get_where('pemasukan_tbl', array('id_proker' => '0'));
	}

		function tampil_pemasukan(){
			return $this->db->get_where('pemasukan_tbl', array('id_proker' => $_GET['id_proker']));
		}

	function tampil_pengeluaran_all(){
		return $this->db->get_where('pengeluaran_tbl', array(
			'id_proker' => '0',
			'id_opmawa' => $_SESSION['user_opmawa'],
			'pengeluaran_lembaga' => $_SESSION['user_role']
			 ));
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

	function pemasukan($id){
		$query = $this->db->select_sum('pemasukan_nominal');
		$query = $this->db->get_where('pemasukan_tbl', array('id_proker' => $id));
		$result = $query->result();

		return $result[0]->pemasukan_nominal;
	}

	function pengeluaran($id){
		$query = $this->db->select_sum('pengeluaran_nominal');
		$query = $this->db->get_where('pengeluaran_tbl', array('id_proker' => $id));
		$result = $query->result();

		return $result[0]->pengeluaran_nominal;
	}


	function getPemasukanAll()
	{
		
		 $query = $this->db->get_where('pemasukan_tbl', array('id_proker' => 0));

		 return $query->result_array();
		
	}

	function getPengeluaranAll()
	{
		
		 $query = $this->db->get_where('pengeluaran_tbl', array('id_proker' => 0));

		 return $query->result_array();
		
	}

	function delete_pemasukan_pengeluaran($where, $table) {
		
		$this->db->where($where);

		
		return $this->db->delete($table);
	
	}


}