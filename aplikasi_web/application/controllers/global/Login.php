<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	//load login model 
	public function _construct()
	{
		session_start();
		parent::__construct();
		$this->load->model('Login_model');
	}

	//this will load login page
	public function index()
	{
		$data['title']='Login';
		$tmp['content']=$this->load->view('global/login',$data);
	}

	//when userdata('logged_in != empty') will load dashboard page depend on their status. see login model.

	public function log()
	{
		$cek = $this->session->userdata('logged_in');
		if(empty($cek))
		{
			$data=$this->session->set_flashdata('error', 'Wrong username or password');
			 redirect('global/login'); 
	
		}
		else
		{

			$st = $this->session->userdata('stts');
			echo $s = $this->session->userdata('username');
			if($st=='admin')
			{				
				header('location:'.base_url().'admin/dashboard');
			}
			else if($st=='operator')
			{
				
				header('location:'.base_url().'operator/dashboard');
			}
			else if($st=='user')
			{
				
				header('location:'.base_url().'user/dashboard');
			}
		
		}
	}
	
	//mengambil data login
	public function input()
	{
		$u = $this->input->post('username');
		$p = $this->input->post('password');
		$this->Login_model->getLoginData($u,$p);
	}
	
	//logout
	public function logout()
	{
		$cek = $this->session->userdata('logged_in');
		if(empty($cek))
		{
			
			header('location:'.base_url().'global/login');
		}
		else
		{
			
			$this->session->sess_destroy();
			header('location:'.base_url().'global/login');
			
		}
	}

}


