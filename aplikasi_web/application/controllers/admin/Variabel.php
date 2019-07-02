<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Variabel extends MY_Controller {

	 public function __construct()
        {
            parent::__construct();
          
        }
	
	/* melihat list variabel yang ada.*/
	public function list_Variabel()
	{
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
        {
        	$data['head']="Variabel";
			$data['title']="List Variabel";
			$data['data_Variabel'] = $this->Simple_CRUD->getAllData("tb_Variabel");
			$inside['content']=$this->load->view('admin/Variabel/list_Variabel',$data, TRUE);
			$this->load->view('admin/layout',$inside);
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }
	}

	/* menghapus variabel yang ada.*/
	public function hapus_Variabel(){
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$id_variabel = $this->input->get('id_variabel', TRUE);			
			$hapus = array('id_variabel' => $id_variabel);
			
			$this->Simple_CRUD->deleteData('tb_variabel',$hapus);
			header('location:'.base_url().'admin/Variabel/list_Variabel');
		}
		else
		{
			 header('location:'.base_url().'global/login/log');
		}
	}

	/* menambah variabel yang ada.*/
	public function add_Variabel(){
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
        {
				$this->form_validation->set_rules('nama_variabel', 'nama_variabel', 'required');
				
				if($this->form_validation->run()==FALSE)
				{
					
					$data['head']='Variabel';
					$data['title']='Add Variabel';
					/*data yang ditampilkan*/
					$inside['content']=$this->load->view('admin/Variabel/add_Variabel',$data, TRUE);
					$this->load->view('admin/layout',$inside);
				}
			 	else
				{
								$this->db->where('nama_Variabel',$this->input->post('nama_Variabel'));
								$isi=$this->db->count_all_results('tb_Variabel');
								if ($isi == 0) {

									 $data = array(
									 		  'nama_variabel' => $this->input->post('nama_variabel'),
			                          		  'keterangan' => $this->input->post('keterangan'),
					                         
			                        );
									
									$query=$this->Simple_CRUD->insertData('tb_Variabel',$data);
									
									redirect("admin/Variabel/list_Variabel","refresh");
								}
								else
								{
										$data['head']='Variabel';
										$data['title']='Add Variabel';
										/*data yang ditampilkan*/
										$inside['content']=$this->load->view('admin/Variabel/add_Variabel',$data, TRUE);
										$this->load->view('admin/layout',$inside);
									
									
								}	
					
				}
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }
	}	

	/* melakukan edit variabel yang ada.*/
	public function edit_Variabel(){
 		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
        {
        	$data['head']="Variabel";
			$data['title']="Edit Variabel";
			$id = $this->input->get('id_variabel', TRUE);
			$data['variabel'] = $this->Simple_CRUD->get_detail1("tb_variabel","id_variabel",$id);
			$inside['content']=$this->load->view('admin/Variabel/edit_Variabel',$data, TRUE);
			$this->load->view('admin/layout',$inside);
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }
 	}

 	/* melakukan update berdasarkan data yang telah di edit.*/
 	public function update_Variabel(){
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
        {
				$id = $this->input->post('id_variabel');	
				$this->form_validation->set_rules('nama_variabel', 'nama_variabel', 'required');
				if($this->form_validation->run()==FALSE)
				{
					$data['head']="Variabel";
					$data['title']="Edit Variabel";
					$data['variabel'] = $this->Simple_CRUD->get_detail1("tb_variabel","id_variabel",$id);
					$inside['content']=$this->load->view('admin/Variabel/edit_Variabel',$data, TRUE);
					$this->load->view('admin/layout',$inside);
				}
			 	else
				{

						$data = array(
			                         	'nama_variabel' => $this->input->post('nama_variabel'),
			                         	'keterangan' => $this->input->post('keterangan'),
			                        );
						$quer=$this->Simple_CRUD->updateData1('tb_Variabel',$data,'id_variabel',$id);
						redirect("admin/Variabel/list_Variabel","refresh");
				
				}
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }
 	}


 	/* melihat detail keanggotaan pada setiap variabel
 	 * hanya keanggotaan pada variabel tersebut yang akan muncul
 	 * Fungsi dalam halaman tsb -> tambah, ubah, hapus yang mengarah pada tabel keanggotaan
	 */
 	public function detail_var_keanggotaan(){
 		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
        {
        	$id = $this->input->get('id_variabel');	
        	$data['head']="Variabel";
        	$data['id']=$id;
			$data['title']="List Detail Keanggotaan per Variabel";
			$data['data_variabel'] = $this->Simple_CRUD->getAllData("tb_variabel");
			$data['detail_var_keanggotaan'] = $this->Variabel_model->get_list_detail('tb_keanggotaan','id_variabel',$id);
			$inside['content']=$this->load->view('admin/Variabel/list_var_keanggotaan',$data, TRUE);
			$this->load->view('admin/layout',$inside);
				
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }

 	}

 	public function edit_var_keanggotaan(){
 		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
        {
        	$data['head']="Keanggotaan";
			$data['title']="Edit keanggotaan";
			$id = $this->input->get('id_keanggotaan', TRUE);
			$data['id_variabel']=$this->input->get('id_variabel', TRUE);
			$data['data_variabel'] = $this->Simple_CRUD->getAllData("tb_variabel");
			$data['keanggotaan'] = $this->Simple_CRUD->get_detail1("tb_keanggotaan","id_keanggotaan",$id);
			$inside['content']=$this->load->view('admin/variabel/edit_var_keanggotaan',$data, TRUE);
			$this->load->view('admin/layout',$inside);
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }
 	}

 	public function update_var_keanggotaan(){
 		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
        {
				$id = $this->input->post('id_keanggotaan');	
				$this->form_validation->set_rules('b_bawah', 'b_bawah', 'required');
				$this->form_validation->set_rules('b_tengah', 'b_tengah', 'required');
				$this->form_validation->set_rules('b_atas', 'b_atas', 'required');
				if($this->form_validation->run()==FALSE)
				{
					$data['head']="Keanggotaan";
					$data['title']="Edit keanggotaan";
					$data['id_variabel']=$this->input->post('id_variabel', TRUE);
					$data['data_variabel'] = $this->Simple_CRUD->getAllData("tb_variabel");
					$data['keanggotaan'] = $this->Simple_CRUD->get_detail1("tb_keanggotaan","id_keanggotaan",$id);
					$inside['content']=$this->load->view('admin/variabel/edit_var_keanggotaan',$data, TRUE);
					$this->load->view('admin/layout',$inside);
				}
			 	else
				{

					 $id = $this->input->post('id_keanggotaan');		
					 $id_variabel=$this->input->post('id_variabel');		
					 $data = array(
					 		  'id_variabel' => $id_variabel,
					 		  'b_bawah' => $this->input->post('b_bawah'),
					 		  'b_tengah' => $this->input->post('b_tengah'),
					 		  'b_atas' => $this->input->post('b_atas'),
                      		  'keterangan' => $this->input->post('keterangan'),
                      		);
					                         				
						$quer=$this->Simple_CRUD->updateData1('tb_keanggotaan',$data,'id_keanggotaan',$id);
						redirect('admin/variabel/detail_var_keanggotaan/?id_variabel='.$id_variabel.'');
				
				}
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }
 	}

 	public function hapus_var_keanggotaan(){
 		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$id_keanggotaan = $this->input->get('id_keanggotaan', TRUE);

			$id_variabel = $this->input->get('id_variabel', TRUE);			
			$hapus = array('id_keanggotaan' => $id_keanggotaan);
			
			$this->Simple_CRUD->deleteData('tb_keanggotaan',$hapus);
			redirect('admin/variabel/detail_var_keanggotaan/?id_variabel='.$id_variabel.'');
		}
		else
		{
			 header('location:'.base_url().'global/login/log');
		}
 	}

 	public function add_var_keanggotaan(){
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
        {
        		$id_variabel=$this->input->get('id_variabel',TRUE);
				$this->form_validation->set_rules('b_bawah', 'b_bawah', 'required');
				$this->form_validation->set_rules('b_tengah', 'b_tengah', 'required');
				$this->form_validation->set_rules('b_atas', 'b_atas', 'required');
				
				if($this->form_validation->run()==FALSE)
				{
					
					$data['head']='Keanggotaan';
					$data['title']='Add keanggotaan';
					/*data yang ditampilkan*/
					$data['data_variabel'] = $this->Simple_CRUD->getAllData("tb_variabel");
					$data['id']=$id_variabel;
					$inside['content']=$this->load->view('admin/variabel/add_var_keanggotaan',$data, TRUE);
					$this->load->view('admin/layout',$inside);
				}
			 	else
				{	$id_variabel= $this->input->post('id_variabel');
					 $data = array(
					 		  'id_variabel' =>$id_variabel,
					 		  'b_bawah' => $this->input->post('b_bawah'),
					 		  'b_tengah' => $this->input->post('b_tengah'),
					 		  'b_atas' => $this->input->post('b_atas'),
                      		  'keterangan' => $this->input->post('keterangan'),
                      		);
					                         				
					$query=$this->Simple_CRUD->insertData('tb_keanggotaan',$data);		

					redirect('admin/variabel/detail_var_keanggotaan/?id_variabel='.$id_variabel.'');		
					
					
				}
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }
	}	
	





 }


