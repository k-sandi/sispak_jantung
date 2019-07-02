<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kesimpulan extends MY_Controller {

	 public function __construct()
        {
            parent::__construct();
          
        }

    public function get_table_kesimpulan(){
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='operator')
        {
        	$data['head']="Kesimpulan";
			$data['title']="Kesimpulan Hasil Pemeriksaan";
			$data['data_kesimpulan'] = $this->Simple_CRUD->getAllData("tb_kesimpulan");
			$inside['content']=$this->load->view('operator/periksa/view_table_kesimpulan',$data, TRUE);
			$this->load->view('operator/layout',$inside);
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }
	}

	 public function update_tbl_kesimpulan(){
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='operator')
        {
        	$this->Periksa_model->DeleteAllData('tb_kesimpulan');	
        	$generate_kesimpulan= $this->Periksa_model->get_tabel_kesimpulan()->result_array();
        	
        	foreach ($generate_kesimpulan as $key => $simpul) {
        		$data = array(
					 		  'tgl_test' => $simpul['tgl_test'],
					 		  'id_periksa' => $simpul['id_periksa'],
					 		  'nama_lengkap' => $simpul['nama_lengkap'],
					 		  'jenis_kelamin' => $simpul['gender'],
					 		  'usia' =>$simpul['var_usia'],
					 		  'z_total'=>$simpul['z_score'],
					 		  'nama_diagnosa'=>$simpul['nama_diagnosa'],
                      		);
        		$query=$this->Simple_CRUD->insertData('tb_kesimpulan',$data);		

        	}
        	redirect("operator/Kesimpulan/get_table_kesimpulan","refresh");


		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }
	}





}
