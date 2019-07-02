<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Variabel_model extends CI_Model {

		
		function get_list_detail($table,$id_table,$id) {
			$this->db->where($id_table,$id);
			$query = $this->db->get($table);
			return $query;
		}

	

}

/* End of file Perpus_model.php */
/* Location: ./application/models/Perpus_model.php */