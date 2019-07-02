<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validasi extends MY_Controller {

	 public function __construct()
        {
            parent::__construct();
          
        }

	public function index(){
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
        {
			$data['head']="Validasi";
			$data['title']="Validasi Hasil Sistem";
			$data['data_kesimpulan'] = $this->Simple_CRUD->getAllData("tb_validasi");
			

			//count data
			$data['jml_total']=$this->Validasi_model->get_jml("tb_validasi");
			$data['jml_sesuai']=$this->Validasi_model->get_jml_where("tb_validasi","keterangan", "SESUAI");
			$data['jml_tdk_sesuai']=$this->Validasi_model->get_jml_where("tb_validasi","keterangan", "TIDAK SESUAI");
			//hitung persentase
		
		
			$data['persen_sesuai'] = $data['jml_sesuai']['jml'] / $data['jml_total']['jml']*100;
			$data['persen_tdk_sesuai'] = $data['jml_tdk_sesuai']['jml']/$data['jml_total']['jml']*100;

			$inside['content']=$this->load->view('admin/validasi/view_validasi',$data, TRUE);
			$this->load->view('admin/layout',$inside);


		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }
	}


	public function generate_tb_validasi(){
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
        {
        	$this->Validasi_model->DeleteAllData('tb_validasi');	
        	$generate_kesimpulan= $this->Validasi_model->generate_table()->result_array();
        	
        	foreach ($generate_kesimpulan as $key => $simpul) {
        		$data = array(
							  'id_kesimpulan'   => $simpul['id_kesimpulan'],
					 		  'tgl_test'   		=> $simpul['tgl_test'],
							  'id_periksa' 		=> $simpul['id_periksa'],
							  'username'   		=> $simpul['username'],
					 		  'nama_lengkap' 	=> $simpul['nama_lengkap'],
					 		  'jenis_kelamin' 	=> $simpul['jenis_kelamin'],
					 		  'usia' 			=> $simpul['usia'],
					 		  'z_total'			=> $simpul['z_total'],
					 		  'nama_diagnosa'	=> $simpul['nama_diagnosa'],
                      		);
        		$query=$this->Simple_CRUD->insertData('tb_validasi',$data);		

        	}
        	redirect("admin/Validasi/index","refresh");

		}
		else
        {
            header('location:'.base_url().'global/login/log');
		}
	}

	public function edit_tb_validasi(){
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
        {
        	$data['head']="Validasi";
			$data['title']="Validasi Hasil Sistem";
			$data['data_kesimpulan'] = $this->Simple_CRUD->getAllData("tb_validasi");
			$data['data_periksa'] = $this->Simple_CRUD->getAllData("tb_periksa");
	
			$inside['content']=$this->load->view('admin/validasi/edit_validasi',$data, TRUE);
			$this->load->view('admin/layout',$inside);
		}
		else
        {
            header('location:'.base_url().'global/login/log');
		}
	}


	public function update_validasi(){
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
        {
			$pakar = $this->input->post('pakar');
			$id_validasi = $this->input->post('id_validasi');
			
			$row_count = count($pakar);

			for ($i=0; $i < $row_count; $i++) { 
				$sistem = $this->Validasi_model->get_dengan_where('tb_validasi','nama_diagnosa','id_validasi',$id_validasi[$i])->row_array();
				if($sistem['nama_diagnosa'] == $pakar[$i]){
					$keterangan = "SESUAI";
				}else{
					$keterangan = "TIDAK SESUAI";
				}

				$data = array(
					'validasi_pakar' => $pakar[$i],
					'keterangan'     => $keterangan
				);

	 			$query=$this->Validasi_model->updateData('tb_validasi',$data,'id_validasi',$id_validasi[$i]);
			}
			redirect("admin/Validasi/index","refresh");
			
		}
		else
        {
            header('location:'.base_url().'global/login/log');
		}
	}







}
