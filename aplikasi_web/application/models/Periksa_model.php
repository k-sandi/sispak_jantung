<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Periksa_model extends CI_Model {

		
	function get_dengan_where($table,$field,$where, $id) {
		$query = $this->db->query('SELECT `tb_periksa`.`'.$field.'`  FROM `'.$table.'` WHERE `tb_periksa`.`'.$where.'`='.$id.'');
		return $query;
	}

	function get_dengan_where_all($table, $where, $id) {
		$query = $this->db->query('SELECT * FROM `'.$table.'` WHERE `tb_periksa`.`'.$where.'`="'.$id.'"');
		return $query;
	}

	function get_tabel_kesimpulan(){
		$query = $this->db->query('SELECT `tb_hasil`.`id_hasil`, `tb_periksa`.`tgl_test`,  `tb_periksa`.`id_periksa`, `tb_user`.`nama_lengkap`, `tb_user`.`username`, `tb_user`.`gender`, `tb_periksa`.`var_usia`,`tb_hasil`.`z_score`,`tb_diagnosa`.`nama_diagnosa`
		FROM `tb_diagnosa` , `tb_periksa` , `tb_user`, `tb_hasil`
		WHERE `tb_diagnosa`.`id_diagnosa`= `tb_hasil`.`id_diagnosa` AND
		`tb_periksa`.`id_periksa`= `tb_hasil`.`id_periksa` AND
		`tb_user`.`username`= `tb_periksa`.`username`  
		ORDER BY `tb_hasil`.`id_hasil` ASC');

		return $query;
	}

	function DeleteAllData($table) {
		$query = $this->db->query('truncate table '.$table.'');
	}
	

}

/* End of file periksa_model.php */
/* Location: ./application/models/Perpus_model.php */