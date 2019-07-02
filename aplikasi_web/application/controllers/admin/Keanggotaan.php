<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keanggotaan extends MY_Controller {

	 public function __construct()
        {
            parent::__construct();
          
        }
	
	public function list_keanggotaan()
	{
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
        {
        	$data['head']="keanggotaan";
			$data['title']="List keanggotaan";
			$data['data_keanggotaan'] = $this->Simple_CRUD->getAllData("tb_keanggotaan");
			$data['data_variabel'] = $this->Simple_CRUD->getAllData("tb_variabel");
			$inside['content']=$this->load->view('admin/keanggotaan/list_keanggotaan',$data, TRUE);
			$this->load->view('admin/layout',$inside);
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }
	}

	public function hapus_keanggotaan(){
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$id_keanggotaan = $this->input->get('id_keanggotaan', TRUE);			
			$hapus = array('id_keanggotaan' => $id_keanggotaan);
			
			$this->Simple_CRUD->deleteData('tb_keanggotaan',$hapus);
			header('location:'.base_url().'admin/keanggotaan/list_keanggotaan');
		}
		else
		{
			 header('location:'.base_url().'global/login/log');
		}
	}

	public function add_keanggotaan(){
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
        {
				$this->form_validation->set_rules('id_variabel', 'id_variabel', 'required');
				$this->form_validation->set_rules('b_bawah', 'b_bawah', 'required');
				$this->form_validation->set_rules('b_tengah', 'b_tengah', 'required');
				$this->form_validation->set_rules('b_atas', 'b_atas', 'required');
				
				if($this->form_validation->run()==FALSE)
				{
					
					$data['head']='keanggotaan';
					$data['title']='Add keanggotaan';
					/*data yang ditampilkan*/
					$data['data_variabel'] = $this->Simple_CRUD->getAllData("tb_variabel");
					$inside['content']=$this->load->view('admin/keanggotaan/add_keanggotaan',$data, TRUE);
					$this->load->view('admin/layout',$inside);
				}
			 	else
				{
								
								
					 $data = array(
					 		  'id_variabel' => $this->input->post('id_variabel'),
					 		  'b_bawah' => $this->input->post('b_bawah'),
					 		  'b_tengah' => $this->input->post('b_tengah'),
					 		  'b_atas' => $this->input->post('b_atas'),
                      		  'keterangan' => $this->input->post('keterangan'),
                      		);
					                         				
					$query=$this->Simple_CRUD->insertData('tb_keanggotaan',$data);				
					redirect("admin/keanggotaan/list_keanggotaan","refresh");
					
				}
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }
	}	

	

	public function edit_keanggotaan(){
 		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
        {
        	$data['head']="keanggotaan";
			$data['title']="Edit keanggotaan";
			$id = $this->input->get('id_keanggotaan', TRUE);
			$data['data_variabel'] = $this->Simple_CRUD->getAllData("tb_variabel");
			$data['keanggotaan'] = $this->Simple_CRUD->get_detail1("tb_keanggotaan","id_keanggotaan",$id);
			$inside['content']=$this->load->view('admin/keanggotaan/edit_keanggotaan',$data, TRUE);
			$this->load->view('admin/layout',$inside);
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }
 	}

 	public function update_keanggotaan(){
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
        {
				$id = $this->input->post('id_keanggotaan');	
				$this->form_validation->set_rules('id_variabel', 'id_variabel', 'required');
				$this->form_validation->set_rules('b_bawah', 'b_bawah', 'required');
				$this->form_validation->set_rules('b_tengah', 'b_tengah', 'required');
				$this->form_validation->set_rules('b_atas', 'b_atas', 'required');
				if($this->form_validation->run()==FALSE)
				{
					$data['head']="keanggotaan";
					$data['title']="Edit keanggotaan";
					$data['data_variabel'] = $this->Simple_CRUD->getAllData("tb_variabel");
					$data['keanggotaan'] = $this->Simple_CRUD->get_detail1("tb_keanggotaan","id_keanggotaan",$id);
					$inside['content']=$this->load->view('admin/keanggotaan/edit_keanggotaan',$data, TRUE);
					$this->load->view('admin/layout',$inside);
				}
			 	else
				{

					 $id = $this->input->post('id_keanggotaan');				
					 $data = array(
					 		  'id_variabel' => $this->input->post('id_variabel'),
					 		  'b_bawah' => $this->input->post('b_bawah'),
					 		  'b_tengah' => $this->input->post('b_tengah'),
					 		  'b_atas' => $this->input->post('b_atas'),
                      		  'keterangan' => $this->input->post('keterangan'),
                      		);
					                         				
						$quer=$this->Simple_CRUD->updateData1('tb_keanggotaan',$data,'id_keanggotaan',$id);
						redirect("admin/keanggotaan/list_keanggotaan","refresh");
				
				}
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }
 	}
}
