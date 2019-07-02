<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	 public function __construct()
        {
            parent::__construct();
          
        }
	
	public function index()
	{
		$data['log']=$this->db->get_where('tb_user',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='user')
        {
			$username = $this->session->userdata('username');
        	$data['head']="Dashboard";
			$data['title']="Home";
			$data['last_date']=$this->Dashboard_model->get_last_date("tb_periksa","username", $username, "valid", '1');
			$data['jml_valid']=$this->Dashboard_model->get_jml_where2("tb_periksa","username", $username, "valid", '1');
			$data['jml_nonvalid']=$this->Dashboard_model->get_jml_where2("tb_periksa","username", $username, "valid", '0');
			$data['jml_periksa']=$this->Dashboard_model->get_jml_where("tb_periksa","username", $username);
		
			$inside['content']=$this->load->view('user/dashboard',$data, TRUE);
			$this->load->view('user/layout',$inside);
		}
        else
        {
            header('location:'.base_url().'global/login/log');
        }

	}
}
