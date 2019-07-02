<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	//load login model
	public function _construct()
	{
		session_start();
		parent::__construct();
		$this->load->model('Simple_CRUD');
		$this->load->model('Register_model');
	}

	//this will load login page
	public function index(){
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


					$data['title']='Register';
					/*data yang ditampilkan*/
					$inside['content']=$this->load->view('global/register',$data, TRUE);
					$this->load->view('global/layout_register',$inside);
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

									$pass=md5($this->input->post('password'));
									$data2 = array('username' => $this->input->post('username'),
													'password'=>$pass,
													'stts'=>$status_user);
									$quer1=$this->Simple_CRUD->insertData('tb_login',$data2);

									$query=$this->Simple_CRUD->insertData('tb_user',$data);


									redirect("global/register/success","refresh");
								}
								else
								{


									$data['title']='Register';
									/*data yang ditampilkan*/
									$inside['content']=$this->load->view('global/register',$data, TRUE);
									$this->load->view('global/layout_register',$inside);

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


									$data['title']='Register';
									/*data yang ditampilkan*/
									$inside['content']=$this->load->view('global/register',$data, TRUE);
									$this->load->view('global/layout_register',$inside);

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
									$pass=md5($this->input->post('password'));
									$data2 = array('username' => $this->input->post('username'),
													'password'=>$pass,
													'stts'=>$status_user);
									$quer1=$this->Simple_CRUD->insertData('tb_login',$data2);
									$quer=$this->Simple_CRUD->insertData('tb_user',$data);

									redirect("global/register/success","refresh");
								}
								else
								{

									$data['title']='Register';
									/*data yang ditampilkan*/
									$inside['content']=$this->load->view('global/register',$data, TRUE);
									$this->load->view('global/layout_register',$inside);

								}
						}
					}
		            /**/
				}
	}

	public function success()
	{
		$data['title']='Register Success';
		$tmp['content']=$this->load->view('global/success',$data);
	}




}
