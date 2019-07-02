<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function list_User(){
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
        {
        	$data['head']="User";
			$data['title']="List User";
			$data['data_user'] = $this->Simple_CRUD->getAllData("tb_user");
			$data['data_login'] = $this->Simple_CRUD->getAllData("tb_login");
			$inside['content']=$this->load->view('admin/User/list_User',$data, TRUE);
			$this->load->view('admin/layout',$inside);
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }

	}

	public function hapus_User(){
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$username = $this->input->get('username', TRUE);			
			$hapus = array('username' => $username);

			$this->db->where('username',$username);
     								$query = $this->db->get('tb_user');
     								$row = $query->row();

     								if(!empty($row)){
     								unlink("./gambar_petugas/$row->img");
     								}
			
			$this->Simple_CRUD->deleteData('tb_user',$hapus);
			$this->Simple_CRUD->deleteData('tb_login',$hapus);
			header('location:'.base_url().'admin/User/list_User');
		}
		else
		{
			 header('location:'.base_url().'global/login/log');
		}
	}

	public function view_User(){
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
        {
        	$id = $this->input->get('username', TRUE);	
        	$data['head']="User";
			$data['title']="View User";
			$data['User']=$this->Simple_CRUD->get_detail1('tb_user','username',$id);
			$inside['content']=$this->load->view('admin/User/view_User',$data, TRUE);
			$this->load->view('admin/layout',$inside);
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }

	}
	public function add_User(){
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
				$this->form_validation->set_rules('tempat', 'tempat', 'required');
				$this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'required');
				$this->form_validation->set_rules('hp', 'hp', 'required');
				if($this->form_validation->run()==FALSE)
				{
					
					$data['head']='User';
					$data['title']='Add User';
					/*data yang ditampilkan*/
					$inside['content']=$this->load->view('admin/User/add_User',$data, TRUE);
					$this->load->view('admin/layout',$inside);
				}
			 	else
				{
					$gambar=$_FILES['foto']['name'];
					if (empty($gambar))
					{
								$this->db->where('username',$this->input->post('username'));
								$isi=$this->db->count_all_results('tb_user');
								if ($isi == 0) {

									 $data = array(
									 		  'username' => $this->input->post('username'),
			                          		  'nama_lengkap' => $this->input->post('nama'),
					                          'gender' => $this->input->post('gender'),
					                          'alamat_lengkap' => $this->input->post('alamat'),
					                          'tempat' => $this->input->post('tempat'),   
					                          'tgl_lahir' => $this->input->post('tgl_lahir'),                   
					                          'no_hp' => $this->input->post('hp'),
					                          'email' => $this->input->post('email')
			                        );
									
									$status_user='user';

									$pass=get_hash($this->input->post('password'));
									$data2 = array('username' => $this->input->post('username'),
													'password'=>$pass,
													'stts'=>$status_user);
									$quer1=$this->Simple_CRUD->insertData('tb_login',$data2);
									
									$query=$this->Simple_CRUD->insertData('tb_user',$data);
									
									redirect("admin/User/list_User","refresh");
								}
								else
								{

									$data['head']='User';
									$data['title']='Add User';
									/*data yang ditampilkan*/
									$inside['content']=$this->load->view('admin/User/add_User',$data, TRUE);
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
							
									$data['head']='User';
									$data['title']='Add User';
									/*data yang ditampilkan*/
									$inside['content']=$this->load->view('admin/User/add_User',$data, TRUE);
									$this->load->view('admin/layout',$inside);
							
						}
						else
						{
								$this->db->where('username',$this->input->post('username'));
								$isi=$this->db->count_all_results('tb_user');
								if ($isi == 0) {

									$data = array(
											  'username' => $this->input->post('username'),
			                          		  'nama_lengkap' => $this->input->post('nama'),
					                          'gender' => $this->input->post('gender'),
					                          'alamat_lengkap' => $this->input->post('alamat'),
					                          'tempat' => $this->input->post('tempat'),   
					                          'tgl_lahir' => $this->input->post('tgl_lahir'),                   
					                          'no_hp' => $this->input->post('hp'),
					                          'email' => $this->input->post('email'),
					                          'img'=> $this->upload->file_name,
					                        	);

									$status_user='user';
									$pass=get_hash($this->input->post('password'));
									$data2 = array('username' => $this->input->post('username'),
													'password'=>$pass,
													'stts'=>$status_user);
									$quer1=$this->Simple_CRUD->insertData('tb_login',$data2);
									$quer=$this->Simple_CRUD->insertData('tb_user',$data);
								
									redirect("admin/User/list_User","refresh");
								}
								else
								{
									$data['head']='User';
									$data['title']='Add User';
									/*data yang ditampilkan*/
									$inside['content']=$this->load->view('admin/User/add_User',$data, TRUE);
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

	public function edit_User(){
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
        {
        	$data['head']="User";
			$data['title']="Edit User";
			$id = $this->input->get('username', TRUE);	
			$data['user'] = $this->Simple_CRUD->get_detail1('tb_user','username',$id);
			$inside['content']=$this->load->view('admin/User/edit_User',$data, TRUE);
			$this->load->view('admin/layout',$inside);
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }
	}

	public function update_User(){
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
        {
				$id = $this->input->post('username');	
			
				$this->form_validation->set_rules('nama', 'nama', 'required');
				$this->form_validation->set_rules('gender', 'gender', 'required');
				$this->form_validation->set_rules('alamat', 'alamat', 'required');
				$this->form_validation->set_rules('tempat', 'tempat', 'required');
				$this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'required');
				$this->form_validation->set_rules('hp', 'hp', 'required');
				
				if($this->form_validation->run()==FALSE)
				{
					$data['head']="User";
					$data['title']="Edit User";
					$data['user'] = $this->Simple_CRUD->get_detail1('tb_user','username',$id);
					$inside['content']=$this->load->view('admin/User/edit_User',$data, TRUE);
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
			                          		  'nama_lengkap' => $this->input->post('nama'),
					                          'gender' => $this->input->post('gender'),
					                          'alamat_lengkap' => $this->input->post('alamat'),
					                          'tempat' => $this->input->post('tempat'),   
					                          'tgl_lahir' => $this->input->post('tgl_lahir'),                   
					                          'no_hp' => $this->input->post('hp'),
					                          'email' => $this->input->post('email')
			                        );
									
						$query=$this->Simple_CRUD->updateData1('tb_user',$data,$field,$id);
						redirect("admin/User/list_User","refresh");
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
							//$pesan=$this->upload->display_errors();
							//$data=$this->session->set_flashdata('error', $pesan);
							$data['head']="User";
							$data['title']="Edit User";
							$data['user'] = $this->Simple_CRUD->get_detail1('tb_user','username',$id);
							$inside['content']=$this->load->view('admin/User/edit_User',$data, TRUE);
							$this->load->view('admin/layout',$inside);
							
						}
						else
						{
						$this->db->where('username',$id);
     								$query = $this->db->get('tb_user');
     								$row = $query->row();

     								if(!empty($row)){
     								unlink("./gambar_petugas/$row->img");
     								}
						 $data = array(
			                          		  'nama_lengkap' => $this->input->post('nama'),
					                          'gender' => $this->input->post('gender'),
					                          'alamat_lengkap' => $this->input->post('alamat'),
					                          'tempat' => $this->input->post('tempat'),   
					                          'tgl_lahir' => $this->input->post('tgl_lahir'),                   
					                          'no_hp' => $this->input->post('hp'),
					                          'email' => $this->input->post('email'),
					                          'img'=> $this->upload->file_name,
			                        );
									
						$quer=$this->Simple_CRUD->updateData1('tb_user',$data,'username',$id);
						redirect("admin/User/list_User","refresh");
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
        	$data['head']="User";
			$data['title']="Edit Password";
			$id = $this->input->get('username', TRUE);
			$data['petugas'] = $this->Simple_CRUD->get_detail1("tb_login","username",$id);
			$inside['content']=$this->load->view('admin/User/edit_password',$data, TRUE);
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
					$data=$this->session->set_flashdata('error', 'Inputan Belum benar');
					redirect('admin/profile/edit_password'); 

				}
			 	else
				{

						$data = array(
			                         	'password' => get_hash($this->input->post('password'))
			                        );
						$quer=$this->Simple_CRUD->updateData1('tb_login',$data,'username',$id);
						redirect("admin/User/list_User","refresh");
				
				}
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }
 	}




}
