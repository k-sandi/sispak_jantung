<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	 public function __construct()
        {
            parent::__construct();
          
        }
	
	public function index()
	{
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='operator')
        {
        	$data['head']="Dashboard";
			$data['title']="Home";
			$data['jml_periksa']=$this->Dashboard_model->get_jml("tb_periksa");
			$data['jml_user']=$this->Dashboard_model->get_jml("tb_user");
			$data['jml_valid']=$this->Dashboard_model->get_jml_where("tb_periksa","valid",'1');
			$data['jml_nonvalid']=$this->Dashboard_model->get_jml_where("tb_periksa","valid",'0');

			$inside['content']=$this->load->view('operator/dashboard',$data, TRUE);
			$this->load->view('operator/layout',$inside);
		}
        else
        {
            header('location:'.base_url().'global/login/log');
        }

	}
}
