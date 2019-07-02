<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	//get count data (without condition)
	function get_jml($nama_table){
		$query=$this->db->query('SELECT COUNT(*) as jml FROM '.$nama_table.'');
		
		return $query->row_array();
	}

	//get count data (with 1 condition)
	function get_jml_where($nama_table, $field, $where){
		$query=$this->db->query('SELECT COUNT(*) as jml FROM '.$nama_table.' WHERE '.$field.' = '.$where.'');
		
		return $query->row_array();
	}

	//get last check (with  condition)--> tb_kesimpulan
	function get_last_check($nama_table, $field1, $where1){
		$query=$this->db->query('SELECT z_score AS score FROM '.$nama_table.' WHERE '.$field1.' = '.$where1.' ORDER BY id_periksa DESC');
		
		return $query->row_array();
	}

	//get last date (with 2 condition)--> tb_periksa
	function get_last_date($nama_table, $field1, $where1, $field2, $where2){
		$query=$this->db->query('SELECT tgl_test FROM '.$nama_table.' WHERE '.$field1.' = '.$where1.' AND '.$field2.'= '.$where2.' ORDER BY id_periksa DESC');
		
		return $query->row_array();
	}

	//get count data (with 2 condition)
	function get_jml_where2($nama_table, $field1, $where1, $field2, $where2){
		$query=$this->db->query('SELECT COUNT(*) as jml FROM '.$nama_table.' WHERE '.$field1.' = '.$where1.' AND '.$field2.'= '.$where2.'');
		
		return $query->row_array();
	}






	
}

/* End of file Dashboard_model.php */
/* Location: ./application/models/Dashboard_model.php */