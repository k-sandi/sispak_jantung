<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {

	
	public function index()
	{
		$data['log']=$this->db->get_where('tb_user',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='user')
        {
        	$id = $this->session->userdata('username');
        	$data['head']="Profile";
			$data['title']="View Profile";
			$data['profile']=$this->Simple_CRUD->get_detail1('tb_user','username',$id);
			$inside['content']=$this->load->view('user/profile/view_profile',$data, TRUE);
			$this->load->view('user/layout',$inside);
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }

	}

	public function edit_profile()
	{
		$data['log']=$this->db->get_where('tb_user',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='user')
        {
        	$data['head']="Profile";
			$data['title']="Edit Profile";
			$id = $this->session->userdata('username');
			$data['profile'] = $this->Simple_CRUD->get_detail1('tb_user','username',$id);
			$inside['content']=$this->load->view('user/profile/edit_profile',$data, TRUE);
			$this->load->view('user/layout',$inside);
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }
	}


 	public function update_profile()
	{ 
		$data['log']=$this->db->get_where('tb_user',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='user')
        {
				$id = $this->input->post('username');	
				$this->form_validation->set_rules('nama', 'nama', 'required');
				$this->form_validation->set_rules('gender', 'gender', 'required');
				$this->form_validation->set_rules('alamat', 'alamat', 'required');
				$this->form_validation->set_rules('hp', 'hp', 'required');
				if($this->form_validation->run()==FALSE)
				{
					$data=$this->session->set_flashdata('error', 'Inputan Belum benar');
					redirect('user/profile/edit_profile'); 

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
						redirect("user/profile","refresh");
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
							redirect('user/profile/edit_profile'); 
							
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
						redirect("user/profile","refresh");
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
 		$data['log']=$this->db->get_where('tb_user',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='user')
        {
        	$data['head']="Profile";
			$data['title']="Reset Password";
			$id = $this->session->userdata('username');
			$data['petugas'] = $this->Simple_CRUD->get_detail1("tb_login","username",$id);
			$inside['content']=$this->load->view('user/profile/edit_password',$data, TRUE);
			$this->load->view('user/layout',$inside);
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }

 	}

 	public function update_password()
	{ 
		$data['log']=$this->db->get_where('tb_user',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='user')
        {
				$id = $this->input->post('username');	
				$this->form_validation->set_rules('password', 'password', 'required');
				if($this->form_validation->run()==FALSE)
				{
					$data=$this->session->set_flashdata('error', 'Inputan Belum benar');
					redirect('user/profile/edit_password'); 

				}
			 	else
				{

						$data = array(
			                         	'password' => get_hash($this->input->post('password'))
			                        );
						$quer=$this->Simple_CRUD->updateData1('tb_login',$data,'username',$id);
						redirect("user/profile","refresh");
				
				}
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }
 	}
}
