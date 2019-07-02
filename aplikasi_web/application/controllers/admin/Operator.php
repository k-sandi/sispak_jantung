<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operator extends MY_Controller {

	public function list_operator(){
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
        {
        	$data['head']="Operator";
			$data['title']="List Operator";
			$data['data_petugas'] = $this->Simple_CRUD->getAllData("tb_petugas");
			$data['data_login'] = $this->Simple_CRUD->getAllData("tb_login");
			$inside['content']=$this->load->view('admin/operator/list_operator',$data, TRUE);
			$this->load->view('admin/layout',$inside);
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }

	}

	public function hapus_operator(){
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$username = $this->input->get('username', TRUE);			
			$hapus = array('username' => $username);
			$this->db->where('username',$username);
     								$query = $this->db->get('tb_petugas');
     								$row = $query->row();

     								if(!empty($row)){
     								unlink("./gambar_petugas/$row->img");
     								}
			$this->Simple_CRUD->deleteData('tb_petugas',$hapus);
			$this->Simple_CRUD->deleteData('tb_login',$hapus);
			header('location:'.base_url().'admin/operator/list_operator');
		}
		else
		{
			 header('location:'.base_url().'global/login/log');
		}
	}

	public function view_operator(){
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
        {
        	$id = $this->input->get('username', TRUE);	
        	$data['head']="Operator";
			$data['title']="View Operator";
			$data['operator']=$this->Simple_CRUD->get_detail1('tb_petugas','username',$id);
			$inside['content']=$this->load->view('admin/operator/view_operator',$data, TRUE);
			$this->load->view('admin/layout',$inside);
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }

	}

	public function edit_operator(){
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
        {
        	$data['head']="Operator";
			$data['title']="Edit Operator";
			$id = $this->input->get('username', TRUE);	
			$data['petugas'] = $this->Simple_CRUD->get_detail1('tb_petugas','username',$id);
			$inside['content']=$this->load->view('admin/operator/edit_operator',$data, TRUE);
			$this->load->view('admin/layout',$inside);
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }
	}

	public function update_operator(){
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
        {
				$id = $this->input->post('username');	
				$this->form_validation->set_rules('nama', 'nama', 'required');
				$this->form_validation->set_rules('gender', 'gender', 'required');
				$this->form_validation->set_rules('alamat', 'alamat', 'required');
				$this->form_validation->set_rules('hp', 'hp', 'required');
				if($this->form_validation->run()==FALSE)
				{
					$data['head']="Operator";
					$data['title']="Edit Operator";
					$data['petugas'] = $this->Simple_CRUD->get_detail1('tb_petugas','username',$id);
					$inside['content']=$this->load->view('admin/operator/edit_operator',$data, TRUE);
					$this->load->view('admin/layout',$inside);
				}
			 	else
				{
					$gambar=$_FILES['foto']['name'];
					if (empty($gambar))
					{
						$id = $this->input->post('username');	
						$field='username';
					
			            $data = array(
			                          		  'nama' => $this->input->post('nama'),
					                          'gender' => $this->input->post('gender'),
					                          'alamat' => $this->input->post('alamat'),                  
					                          'hp' => $this->input->post('hp'),
					                          'ket' => $this->input->post('ket')
			                        );
						$query=$this->Simple_CRUD->updateData1('tb_petugas',$data,$field,$id);
						redirect("admin/operator/list_operator","refresh");
					}	
					else
					{
						$id = $this->input->post('username');
						$alphanum="ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
						$nama=str_shuffle($alphanum);//random nama dengan alphanum
						$config['file_name'] = $nama; 
						$config['upload_path'] = "gambar_petugas"; // lokasi penyimpanan file
						$config['allowed_types'] = 'gif|jpg|JPEG|png|JPEG|BMP|bmp'; // format foto yang diizinkan 
						$this->load->library('upload',$config);
						$this->upload->initialize($config);
						//$this->upload->do_upload('foto');
						if( !$this->upload->do_upload('foto'))
						{
							//echo $$_FILES['file_name'];
							$pesan=$this->upload->display_errors();
							$data=$this->session->set_flashdata('error', $pesan);
							redirect('admin/profile/edit_profile'); 
							
						}
						else
						{

						$this->db->where('username',$id);
     								$query = $this->db->get('tb_petugas');
     								$row = $query->row();

     								if(!empty($row)){
     								unlink("./gambar_petugas/$row->img");
     								}

						$data = array(
			                          		  'nama' => $this->input->post('nama'),
					                          'img'=> $this->upload->file_name,
					                          'gender' => $this->input->post('gender'),
					                          'alamat' => $this->input->post('alamat'),       
					                          'hp' => $this->input->post('hp'),
					                          'ket' => $this->input->post('ket')
			                        );
						$quer=$this->Simple_CRUD->updateData1('tb_petugas',$data,'username',$id);
						redirect("admin/operator/list_operator","refresh");
						}
					}
				}
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }
 	}

 	public function edit_password(){
 		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
        {
        	$data['head']="Operator";
			$data['title']="Edit Password";
			$id = $this->input->get('username', TRUE);
			$data['petugas'] = $this->Simple_CRUD->get_detail1("tb_login","username",$id);
			$inside['content']=$this->load->view('admin/operator/edit_password',$data, TRUE);
			$this->load->view('admin/layout',$inside);
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }
 	}

 	public function update_password(){
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
        {
				$id = $this->input->post('username');	
				$this->form_validation->set_rules('password', 'password', 'required');
				if($this->form_validation->run()==FALSE)
				{
					$data['head']="Operator";
					$data['title']="Edit Password";
					$data['petugas'] = $this->Simple_CRUD->get_detail1("tb_login","username",$id);
					$inside['content']=$this->load->view('admin/operator/edit_password',$data, TRUE);
					$this->load->view('admin/layout',$inside);

				}
			 	else
				{

						$data = array(
			                         	'password' => get_hash($this->input->post('password'))
			                        );
						$quer=$this->Simple_CRUD->updateData1('tb_login',$data,'username',$id);
						redirect("admin/operator/list_operator","refresh");
				
				}
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }
 	}

	public function add_operator(){
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
        {
				$this->form_validation->set_rules('username', 'username', 'required');
				$this->form_validation->set_rules('password', 'password', 'required');
				$this->form_validation->set_rules('nama', 'nama', 'required');
				$this->form_validation->set_rules('gender', 'gender', 'required');
				$this->form_validation->set_rules('alamat', 'alamat', 'required');
				$this->form_validation->set_rules('status', 'status', 'required');
				$this->form_validation->set_rules('hp', 'hp', 'required');
				if($this->form_validation->run()==FALSE)
				{
					
					$data['head']='Operator';
					$data['title']='Add Operator';
					/*data yang ditampilkan*/
					$inside['content']=$this->load->view('admin/operator/add_operator',$data, TRUE);
					$this->load->view('admin/layout',$inside);
				}
			 	else
				{
					$gambar=$_FILES['foto']['name'];
					if (empty($gambar))
					{
								$this->db->where('username',$this->input->post('username'));
								$isi=$this->db->count_all_results('tb_petugas');
								if ($isi == 0) {

									 $data = array(
									 		  'username' => $this->input->post('username'),
			                          		  'nama' => $this->input->post('nama'),
					                          'gender' => $this->input->post('gender'),
					                          'alamat' => $this->input->post('alamat'),                  
					                          'hp' => $this->input->post('hp'),
					                          'ket' => $this->input->post('ket')
			                        );
									
									$pass=get_hash($this->input->post('password'));
									$data2 = array('username' => $this->input->post('username'),
													'password'=>$pass,
													'stts'=>$this->input->post('status'));
									$quer1=$this->Simple_CRUD->insertData('tb_login',$data2);
									$query=$this->Simple_CRUD->insertData('tb_petugas',$data);
									
									redirect("admin/operator/list_operator","refresh");
								}
								else
								{

									$data['head']='Operator';
									$data['title']='Add Operator';
									/*data yang ditampilkan*/
									$inside['content']=$this->load->view('admin/operator/add_operator',$data, TRUE);
									$this->load->view('admin/layout',$inside);
									
								}	
					}
					else
					{
						$alphanum="ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
						$nama=str_shuffle($alphanum);//random nama dengan alphanum
						$config['file_name'] = $nama; 
						$config['upload_path'] = "gambar_petugas"; // lokasi penyimpanan file
						$config['allowed_types'] = 'gif|jpg|JPEG|png|JPEG|BMP|bmp'; // format foto yang diizinkan 
						$this->load->library('upload',$config);
						$this->upload->initialize($config);
						//$this->upload->do_upload('foto');
						if( !$this->upload->do_upload('foto'))
						{
							
									$data['head']='Operator';
									$data['title']='Add Operator';
									/*data yang ditampilkan*/
									$inside['content']=$this->load->view('admin/operator/add_operator',$data, TRUE);
									$this->load->view('admin/layout',$inside);
							
						}
						else
						{
								$this->db->where('username',$this->input->post('username'));
								$isi=$this->db->count_all_results('tb_petugas');
								if ($isi == 0) {

									$data = array('username' => $this->input->post('username'),
					                          'nama' => $this->input->post('nama'),
					                          'img'=> $this->upload->file_name,
					                          'gender' => $this->input->post('gender'),
					                          'alamat' => $this->input->post('alamat'),         
					                          'hp' => $this->input->post('hp'),
					                          'ket' => $this->input->post('ket'),
					                        	);
									$pass=get_hash($this->input->post('password'));
									$data2 = array('username' => $this->input->post('username'),
													'password'=>$pass,
													'stts'=>$this->input->post('status'));
									$quer1=$this->Simple_CRUD->insertData('tb_login',$data2);
									$quer=$this->Simple_CRUD->insertData('tb_petugas',$data);
								
									redirect("admin/operator/list_operator","refresh");
								}
								else
								{
									$data['head']='Operator';
									$data['title']='Add Operator';
									/*data yang ditampilkan*/
									$inside['content']=$this->load->view('admin/operator/add_operator',$data, TRUE);
									$this->load->view('admin/layout',$inside);
									
								}
						}
					}
		            /**/	
				}
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }
	}

}
