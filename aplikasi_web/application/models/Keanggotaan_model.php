<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Keanggotaan_model extends CI_Model {

		
		function get_keanggotaan_by_var($table,$id_table,$id) {
			$this->db->where($id_table,$id);
			$query = $this->db->get($table);
			$isi=$query->result_array();
			return $isi;
		}

		function reset_keanggotaan($table,$id_periksa)
		{
			$data=array('id_periksa' => $id_periksa);
			$this->db->delete($table, $data);
		}

		function hasil_keanggotaan($id_periksa){
			$query = $this->db->query('SELECT `tb_variabel`.kelompok, `tb_hasil_periksa`.id_variabel,`tb_variabel`.nama_variabel, `tb_keanggotaan`.keterangan, `tb_hasil_periksa`.mem_func, `tb_hasil_periksa`.id_periksa  FROM `tb_hasil_periksa`, `tb_variabel`, `tb_keanggotaan` WHERE `tb_variabel`.id_variabel=`tb_hasil_periksa`.`id_variabel` AND `tb_keanggotaan`.`id_keanggotaan`=`tb_hasil_periksa`.`id_keanggotaan` AND `tb_hasil_periksa`.id_periksa='.$id_periksa.' ORDER BY `tb_variabel`.kelompok ASC' );
			return $query->result_array();
		}

	

}

/* End of file Perpus_model.php */
