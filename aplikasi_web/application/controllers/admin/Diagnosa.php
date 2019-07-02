<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diagnosa extends MY_Controller {

	 public function __construct()
        {
            parent::__construct();
          
        }
	
	public function list_diagnosa()
	{
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
        {
        	$data['head']="Diagnosa";
			$data['title']="List Diagnosa";
			$data['data_diagnosa'] = $this->Simple_CRUD->getAllData("tb_diagnosa");
			$inside['content']=$this->load->view('admin/diagnosa/list_Diagnosa',$data, TRUE);
			$this->load->view('admin/layout',$inside);
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }
	}

	public function hapus_Diagnosa(){
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$id_diagnosa = $this->input->get('id_diagnosa', TRUE);			
			$hapus = array('id_diagnosa' => $id_diagnosa);
			
			$this->Simple_CRUD->deleteData('tb_diagnosa',$hapus);
			header('location:'.base_url().'admin/diagnosa/list_diagnosa');
		}
		else
		{
			 header('location:'.base_url().'global/login/log');
		}
	}

	public function add_Diagnosa(){
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
        {
				$this->form_validation->set_rules('nama_diagnosa', 'nama_diagnosa', 'required');
				
				if($this->form_validation->run()==FALSE)
				{
					
					$data['head']='Diagnosa';
					$data['title']='Add Diagnosa';
					/*data yang ditampilkan*/
					$inside['content']=$this->load->view('admin/diagnosa/add_Diagnosa',$data, TRUE);
					$this->load->view('admin/layout',$inside);
				}
			 	else
				{
								$this->db->where('nama_diagnosa',$this->input->post('nama_diagnosa'));
								$isi=$this->db->count_all_results('tb_diagnosa');
								if ($isi == 0) {

									 $data = array(
									 		  'nama_diagnosa' => $this->input->post('nama_diagnosa'),
			                          		  'keterangan' => $this->input->post('keterangan'),
					                         
			                        );
									
									$query=$this->Simple_CRUD->insertData('tb_diagnosa',$data);
									
									redirect("admin/diagnosa/list_diagnosa","refresh");
								}
								else
								{
										$data['head']='Diagnosa';
										$data['title']='Add Diagnosa';
										/*data yang ditampilkan*/
										$inside['content']=$this->load->view('admin/diagnosa/add_Diagnosa',$data, TRUE);
										$this->load->view('admin/layout',$inside);
									
									
								}	
					
				}
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }
	}	

	public function edit_diagnosa(){
 		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
        {
        	$data['head']="Diagnosa";
			$data['title']="Edit Diagnosa";
			$id = $this->input->get('id_diagnosa', TRUE);
			$data['diagnosa'] = $this->Simple_CRUD->get_detail1("tb_diagnosa","id_diagnosa",$id);
			$inside['content']=$this->load->view('admin/diagnosa/edit_diagnosa',$data, TRUE);
			$this->load->view('admin/layout',$inside);
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }
 	}

 	public function update_diagnosa(){
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
        {
				$id = $this->input->post('id_diagnosa');	
				$this->form_validation->set_rules('nama_diagnosa', 'nama_diagnosa', 'required');
				if($this->form_validation->run()==FALSE)
				{
					$data['head']="Diagnosa";
					$data['title']="Edit Diagnosa";
					$data['diagnosa'] = $this->Simple_CRUD->get_detail1("tb_diagnosa","id_diagnosa",$id);
					$inside['content']=$this->load->view('admin/diagnosa/edit_diagnosa',$data, TRUE);
					$this->load->view('admin/layout',$inside);
				}
			 	else
				{

						$data = array(
			                         	'nama_diagnosa' => $this->input->post('nama_diagnosa'),
			                         	'keterangan' => $this->input->post('keterangan'),
			                        );
						$quer=$this->Simple_CRUD->updateData1('tb_diagnosa',$data,'id_diagnosa',$id);
						redirect("admin/diagnosa/list_diagnosa","refresh");
				
				}
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }
 	}
}
