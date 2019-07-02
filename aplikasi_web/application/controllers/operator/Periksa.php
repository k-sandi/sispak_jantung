<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periksa extends MY_Controller {

	 public function __construct()
        {
            parent::__construct();
          
        }
    /* function for CRUD */
	public function add_periksa(){
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='operator')
        {
				$this->form_validation->set_rules('username', 'username', 'required');
				
				if($this->form_validation->run()==FALSE)
				{
					$data['head']="Pemeriksaan";
					$data['title']="Tambah Data Periksa";
					$data['data_user'] = $this->Simple_CRUD->getAllData("tb_user");
					$inside['content']=$this->load->view('operator/periksa/add_periksa',$data, TRUE);
					$this->load->view('operator/layout',$inside);
				}
			 	else
				{
					$id=$this->input->post('username');

					$data= $this->Simple_CRUD->get_detail1('tb_user','username',$id);
				
					//preprocessing. get variable that need preprocessing.

					//pengambilan variabel gender (konversi 0,1) -> laki - laki 1, perempuan 0
					$jk=$data['gender'];

						if($jk=='L'){
							$gender=1;
						}else{
							$gender=0;
						}

					//perhitungan usia
					$tahun_lahir = date('Y',strtotime($data['tgl_lahir']));
					$tahun_sekarang=date('Y');

						$usia=$tahun_sekarang-$tahun_lahir;

					//perhitungan bmi (berat badan dalam kg)/(tinggi badan dalam m)*(tinggi badan dalam m)
					$tinggi=$this->input->post('tinggi');
					$berat=$this->input->post('berat');
					
						if(empty($tinggi) || empty($berat)){
							$bmi=0;

						}else{
							$bmi=$berat/(($tinggi/100)*($tinggi/100));
						}

					//get GD value and check whether is Diabetic or not
					$GD = $this->input->post('GD');
						if($GD>125){
							$GD = 1;
						}else{
							$GD = 0;
						}
						
					//get the variable. then check the data whether is valid or not (contain empty or 0 value == not valid).

					 $data = array(
					 		  'var_sistol' 	=> $this->input->post('var_sistol'),
					 		  'var_diastol' => $this->input->post('var_diastol'),
					 		  'tinggi' 		=> $this->input->post('tinggi'),
					 		  'berat' 		=> $this->input->post('berat'),
					 		  'var_BMI' 	=> $bmi,							 
							  'GD' 			=> $this->input->post('GD'), 
                      		);

					 if(in_array("", $data) || in_array("0", $data))
					 {
					 	 $data_clean = array(
							   'username'	=> $this->input->post('username'),
							   'var_gender' => $gender,
							   'var_usia'   => $usia,
					 		   'var_sistol' => $this->input->post('var_sistol'),
							   'var_diastol'=> $this->input->post('var_diastol'),
							   'var_HT'     => $this->input->post('var_HT'),
							   'var_smoker' => $this->input->post('var_smoker'),
							   'GD'         => $this->input->post('GD'),
							   'var_GD'     => $GD,
							   'tinggi' 	=> $this->input->post('tinggi'),
							   'berat'		=> $this->input->post('berat'),
							   'var_BMI' 	=> $bmi,
					 		   'valid' 		=> 0,
                      		);
					 }else{
					 	 $data_clean = array(
							   'username'	=> $this->input->post('username'),
							   'var_gender' => $gender,
							   'var_usia'   => $usia,
					 		   'var_sistol' => $this->input->post('var_sistol'),
							   'var_diastol'=> $this->input->post('var_diastol'),
							   'var_HT'     => $this->input->post('var_HT'),
							   'var_smoker' => $this->input->post('var_smoker'),
							   'GD'         => $this->input->post('GD'),
							   'var_GD'     => $GD,
							   'tinggi' 	=> $this->input->post('tinggi'),
							   'berat'		=> $this->input->post('berat'),
							   'var_BMI' 	=> $bmi,
					 		   'valid' 		=> 1,
                      		);
					 }

					
					//insert cleaned data (after validation)
					$query=$this->Simple_CRUD->insertData('tb_periksa',$data_clean);				
					redirect("operator/periksa/list_periksa","refresh");
					
				}
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }
	}	

	public function list_periksa(){
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='operator')
        {
        	$data['head']="Periksa";
			$data['title']="List Pemeriksaan";
			$data['data_periksa'] = $this->Simple_CRUD->getAllData("tb_periksa");
			$data['data_user'] = $this->Simple_CRUD->getAllData("tb_user");
			$inside['content']=$this->load->view('operator/periksa/list_periksa',$data, TRUE);
			$this->load->view('operator/layout',$inside);
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }
	}

	public function hapus_periksa(){
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='operator')
		{
			$id_periksa = $this->input->get('id_periksa', TRUE);			
			$hapus = array('id_periksa' => $id_periksa);
			
			$this->Simple_CRUD->deleteData('tb_periksa',$hapus);
			header('location:'.base_url().'operator/periksa/list_periksa');
		}
		else
		{
			 header('location:'.base_url().'global/login/log');
		}
	}

	public function edit_periksa(){
 		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='operator')
        {
        	$data['head']="Periksa";
			$data['title']="Edit Pemeriksaan";
			$id = $this->input->get('id_periksa', TRUE);
			$data['data_user'] = $this->Simple_CRUD->getAllData("tb_user");
			$data['periksa'] = $this->Simple_CRUD->get_detail1("tb_periksa","id_periksa",$id);
			$inside['content']=$this->load->view('operator/periksa/edit_periksa',$data, TRUE);
			$this->load->view('operator/layout',$inside);
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }
 	}

 	public function update_periksa(){
		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='operator')
        {
				$id = $this->input->post('id_periksa');	
				$this->form_validation->set_rules('username', 'username', 'required');
				if($this->form_validation->run()==FALSE)
				{
					$data['head']="Periksa";
					$data['title']="Edit Pemeriksaan";
					$id = $this->input->get('id_periksa', TRUE);
					$data['data_user'] = $this->Simple_CRUD->getAllData("tb_user");
					$data['periksa'] = $this->Simple_CRUD->get_detail1("tb_periksa","id_periksa",$id);
					$inside['content']=$this->load->view('operator/periksa/edit_periksa',$data, TRUE);
					$this->load->view('operator/layout',$inside);
				}
			 	else
				{

					
					$username=$this->input->post('username');
					$data= $this->Simple_CRUD->get_detail1('tb_user','username',$username);
				
					//preprocessing. get variable that need preprocessing.
	
						//pengambilan variabel gender (konversi 0,1) -> laki - laki 0, perempuan 1
						$jk=$data['gender'];
					
							if($jk=='L'){
								$gender=1;
							}else{
								$gender=0;
							}

							
	
						//perhitungan usia
						$tahun_lahir = date('Y',strtotime($data['tgl_lahir']));
						$tahun_sekarang=date('Y');
	
							$usia=$tahun_sekarang-$tahun_lahir;
	
						//perhitungan bmi (berat badan dalam kg)/(tinggi badan dalam m)*(tinggi badan dalam m)
						$tinggi=$this->input->post('tinggi');
						$berat=$this->input->post('berat');
						
							if(empty($tinggi) || empty($berat)){
								$bmi=0;
	
							}else{
								$bmi=$berat/(($tinggi/100)*($tinggi/100));
							}
	
						//get GD value and check whether is Diabetic or not
						$GD = $this->input->post('GD');
							if($GD>125){
								$GD = 1;
							}else{
								$GD = 0;
							}
							
						//get the variable. then check the data whether is valid or not (contain empty or 0 value == not valid).
	
						 $data = array(
								   'var_sistol' => $this->input->post('var_sistol'),
								   'var_diastol'=> $this->input->post('var_diastol'),
								   'tinggi' 	=> $this->input->post('tinggi'),
								   'berat' 		=> $this->input->post('berat'),
								   'var_BMI' 	=> $bmi,
								   'GD' 		=> $this->input->post('GD'), 
								  );

					
	
						 if(in_array("", $data) || in_array("0", $data))
						 {
							  $data_clean = array(
								   'username'	=> $this->input->post('username'),
								   'var_gender' => $gender,
								   'var_usia'   => $usia,
								   'var_sistol'	=> $this->input->post('var_sistol'),
								   'var_diastol'=> $this->input->post('var_diastol'),
								   'var_HT'     => $this->input->post('var_HT'),
								   'var_smoker' => $this->input->post('var_smoker'),
								   'GD'         => $this->input->post('GD'),
								   'var_GD'     => $GD,
								   'tinggi' 	=> $this->input->post('tinggi'),
								   'berat'		=> $this->input->post('berat'),
								   'var_BMI' 	=> $bmi,
								   'valid' 		=> 0,
								  );
						 }else{
							  $data_clean = array(
								   'username'	=> $this->input->post('username'),
								   'var_gender' => $gender,
								   'var_usia'   => $usia,
								   'var_sistol' => $this->input->post('var_sistol'),
								   'var_diastol'=> $this->input->post('var_diastol'),
								   'var_HT'     => $this->input->post('var_HT'),
								   'var_smoker' => $this->input->post('var_smoker'),
								   'GD'         => $this->input->post('GD'),
								   'var_GD'     => $GD,
								   'tinggi' 	=> $this->input->post('tinggi'),
								   'berat'		=> $this->input->post('berat'),
								   'var_BMI' 	=> $bmi,
								   'valid' 		=> 1,
								  );
						 }
				
					
						 // updated with cleaned data after validation.  
						$quer=$this->Simple_CRUD->updateData1('tb_periksa',$data_clean,'id_periksa',$id);
						redirect("operator/periksa/list_periksa","refresh");
				
				}
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }
 	}

 	public function update_all_hasil(){
 		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='operator')
        {
        	$periksa= $this->Periksa_model->get_dengan_where('tb_periksa','id_periksa','valid',1);


        	foreach ($periksa->result_array() as $key => $pr) {
					/*step 2 Fuzzyfikasi*/
					$this->proses_fuzzyfikasi($pr['id_periksa']);
					/*tampilkan list hasil fuzzyfikasi bagian ini */
					$data['fuzzyfikasi']= $this->Keanggotaan_model->hasil_keanggotaan($pr['id_periksa']);

					/*step 3 conjuction rule */
					$rule_alpha=$this->proses_conjuction($pr['id_periksa']);
					$data['conjuction']=$rule_alpha['linguistic'];

					//tampilkan jumlah rule dan keanggoataan
					$data['jum_rule']=count($data['conjuction']);
					$data['jum_alpha']=count($data['fuzzyfikasi']);

					/*step 4 disjunction rule */
					$disjunction=$rule_alpha['disjunction'];
					$disj=$this->proses_disjuction($disjunction);
					
					/*hitung jumlah per kategori */
					$data['jml_rendah']=$disj['jml_rendah'];
					$data['jml_sedang']=$disj['jml_sedang'];
					$data['jml_tinggi']=$disj['jml_tinggi'];

					/* tampilkan string ke view */
					$data['rendah'] = $disj['string_rendah'];
					$data['sedang'] = $disj['string_sedang'];
					$data['tinggi'] = $disj['string_tinggi'];

					/*step 5 defuzzification */
					$defuzz= $this->proses_defuzzification($pr['id_periksa'], $disj['max_rendah'], $disj['max_sedang'], $disj['max_tinggi']);


					$data['defuzzification']=$defuzz;
					/*max masing - masing tingkat risiko */
					$data['max_rendah'] = $disj['max_rendah'];
					$data['max_sedang'] = $disj['max_sedang'];
					$data['max_tinggi'] = $disj['max_tinggi'];

					$data['z_score_total']=($defuzz[0]['z_score']+$defuzz[1]['z_score']+$defuzz[2]['z_score'])/($disj['max_rendah']+$disj['max_sedang']+$disj['max_tinggi']);

					/*kesimpulan*/

					// ambil nilai score dari masing - masing diagnosa 
					$scr_rendah = $this->Simple_CRUD->get_detail1("tb_diagnosa","id_diagnosa",2);
					$scr_sedang = $this->Simple_CRUD->get_detail1("tb_diagnosa","id_diagnosa",3);
					$scr_tinggi = $this->Simple_CRUD->get_detail1("tb_diagnosa","id_diagnosa",4);


			
					if($data['z_score_total'] <= $scr_rendah['score']){  
						$data['max_z_score']='Tingkat Risiko Rendah';
						/*id_diagnosa rendah */
						$id_diagnosa=2; 
					}elseif(($data['z_score_total'] > $scr_rendah['score']) && ($data['z_score_total'] <= $scr_sedang['score'])){
						$data['max_z_score']='Tingkat Risiko Sedang';
						/*id_diagnosa sedang */
						$id_diagnosa=3;
					}elseif(($data['z_score_total'] > $scr_sedang['score']) && ($data['z_score_total'] <= $scr_tinggi['score'])){
						$data['max_z_score']='Tingkat Risiko Tinggi';
						/*id_diagnosa tinggi */
						$id_diagnosa=4;
					}

					/*simpan hasil */
					 $insert_hasil = array(
							 		  'id_periksa' => $pr['id_periksa'],
							 		  'id_diagnosa' => $id_diagnosa,
							 		  'z_score' => $data['z_score_total'],
		                      		);
				                				
					$query=$this->Simple_CRUD->insertData('tb_hasil',$insert_hasil);			
        	}

        	header('location:'.base_url().'operator/periksa/list_periksa');
        	
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }
 	}

 	/*view result*/
 	public function hasil_periksa(){
 		$data['log']=$this->db->get_where('tb_petugas',array('username' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='operator')
        {
        	$data['head']="Periksa";
			$data['title']="Hasil Pemeriksaan";
			$id = $this->input->get('id_periksa', TRUE);
			

			 
			/*step 1 Data Pasien dan Variabel*/
			$data['periksa'] = $this->Simple_CRUD->get_detail1("tb_periksa","id_periksa",$id);
			$data['data_user'] = $this->Simple_CRUD->getAllData("tb_user");

			/*step 2 Fuzzyfikasi*/
			$this->proses_fuzzyfikasi($id);
			/*tampilkan list hasil fuzzyfikasi bagian ini */
			$data['fuzzyfikasi']= $this->Keanggotaan_model->hasil_keanggotaan($id);


			/*step 3 conjuction rule */
			$rule_alpha=$this->proses_conjuction($id);
			$data['conjuction']=$rule_alpha['linguistic'];

			//tampilkan jumlah rule dan keanggoataan
			$data['jum_rule']=count($data['conjuction']);
			$data['jum_alpha']=count($data['fuzzyfikasi']);

			/*step 4 disjunction rule */
			$disjunction=$rule_alpha['disjunction'];
		
			$disj=$this->proses_disjuction($disjunction);
		
			/*hitung jumlah per kategori */
			$data['jml_rendah']=$disj['jml_rendah'];
			$data['jml_sedang']=$disj['jml_sedang'];
			$data['jml_tinggi']=$disj['jml_tinggi'];

			/* tampilkan string ke view */
			$data['rendah'] = $disj['string_rendah'];
			$data['sedang'] = $disj['string_sedang'];
			$data['tinggi'] = $disj['string_tinggi'];

			/*step 5 defuzzification */
			$defuzz= $this->proses_defuzzification($id, $disj['max_rendah'], $disj['max_sedang'], $disj['max_tinggi']);


			$data['defuzzification']=$defuzz;
			/*max masing - masing tingkat risiko */
			$data['max_rendah'] = $disj['max_rendah'];
			$data['max_sedang'] = $disj['max_sedang'];
			$data['max_tinggi'] = $disj['max_tinggi'];

			$data['z_score_total']=($defuzz[0]['z_score']+$defuzz[1]['z_score']+$defuzz[2]['z_score'])/($disj['max_rendah']+$disj['max_sedang']+$disj['max_tinggi']);

			//$max_z_score=max($defuzz[0]['z_score'],$defuzz[1]['z_score'],$defuzz[2]['z_score']);

		
			/*kesimpulan*/

			// ambil nilai score dari masing - masing diagnosa 
					$scr_rendah = $this->Simple_CRUD->get_detail1("tb_diagnosa","id_diagnosa",2);
					$scr_sedang = $this->Simple_CRUD->get_detail1("tb_diagnosa","id_diagnosa",3);
					$scr_tinggi = $this->Simple_CRUD->get_detail1("tb_diagnosa","id_diagnosa",4);

				
			
					if($data['z_score_total'] <= $scr_rendah['score']){  
						$data['max_z_score']='Tingkat Risiko Rendah';
						/*id_diagnosa rendah */
						$id_diagnosa=2; 
					}elseif(($data['z_score_total'] > $scr_rendah['score']) && ($data['z_score_total'] <= $scr_sedang['score'])){
						$data['max_z_score']='Tingkat Risiko Sedang';
						/*id_diagnosa sedang */
						$id_diagnosa=3;

					//batasan kurang dari sama dengan  $scr_tinggi['score'] error a/n Sogiyem
					}elseif(($data['z_score_total'] > $scr_sedang['score'])){
						$data['max_z_score']='Tingkat Risiko Tinggi';
						/*id_diagnosa tinggi */
						$id_diagnosa=4;
					}



			/*simpan hasil */
			 $insert_hasil = array(
					 		  'id_periksa' => $id,
					 		  'id_diagnosa' => $id_diagnosa,
					 		  'z_score' => $data['z_score_total'],
                      		);
		                				
			$query=$this->Simple_CRUD->insertData('tb_hasil',$insert_hasil);				

			$inside['content']=$this->load->view('operator/periksa/view_hasil',$data, TRUE);
			$this->load->view('operator/layout',$inside);
		}
		else
        {
            header('location:'.base_url().'global/login/log');
        }
 	}

 	private function proses_fuzzyfikasi($id){
 			/*reset keanggotaan untuk id_periksa ini*/
			$reset1=$this->Keanggotaan_model->reset_keanggotaan('tb_hasil_periksa', $id);
			/*reset hasil untuk id_periksa ini*/
			$reset2=$this->Keanggotaan_model->reset_keanggotaan('tb_hasil', $id);

 			$data_pemeriksaan= $this->Simple_CRUD->get_detail1("tb_periksa","id_periksa",$id);
			
			/*get selected data then store it in variabel */

			$var_gender 	= $data_pemeriksaan['var_gender'];		//kelompok 1
			$var_usia 		= $data_pemeriksaan['var_usia'];		//kelompok 2
			$var_td 		= $data_pemeriksaan['var_sistol'];		//kelompok 3
			$var_ht 		= $data_pemeriksaan['var_HT']; 			//kelompok 4
			$var_smoker 	= $data_pemeriksaan['var_smoker'];		//kelompok 5
			$var_gd 		= $data_pemeriksaan['var_GD'];			//kelompok 6	
			$var_BMI 		= $data_pemeriksaan['var_BMI'];			//kelompok 7
			

			
			$id_var_gender=1;
			$keanggotaan_gender= $this->Keanggotaan_model->get_keanggotaan_by_var("tb_keanggotaan","id_variabel",$id_var_gender);
			$query=$this->fuzzyfikasi_boolean($id,$id_var_gender,$keanggotaan_gender,$var_gender, 'L','P');
			

			$id_var_usia=2;
			$keanggotaan_usia= $this->Keanggotaan_model->get_keanggotaan_by_var("tb_keanggotaan","id_variabel",$id_var_usia);
			$query=$this->fuzzyfikasi($id,$id_var_usia,$keanggotaan_usia,$var_usia, 'DEWASA','LANSIA','MANULA');


			$id_var_td=3;
			$keanggotaan_td= $this->Keanggotaan_model->get_keanggotaan_by_var("tb_keanggotaan","id_variabel",$id_var_td);
			$query=$this->fuzzyfikasi($id,$id_var_td,$keanggotaan_td,$var_td, 'RENDAH','NORMAL','TINGGI');

			$id_var_ht=4;
			$keanggotaan_ht= $this->Keanggotaan_model->get_keanggotaan_by_var("tb_keanggotaan","id_variabel",$id_var_ht);
			$query=$this->fuzzyfikasi_boolean($id,$id_var_ht,$keanggotaan_ht,$var_ht, 'YA','TIDAK');

			$id_var_smoker=5;
			$keanggotaan_smoker= $this->Keanggotaan_model->get_keanggotaan_by_var("tb_keanggotaan","id_variabel",$id_var_smoker);
			$query=$this->fuzzyfikasi_boolean($id,$id_var_smoker,$keanggotaan_smoker,$var_smoker, 'YA','TIDAK');
			
			$id_var_gd=6;
			$keanggotaan_gd= $this->Keanggotaan_model->get_keanggotaan_by_var("tb_keanggotaan","id_variabel",$id_var_gd);
			$query=$this->fuzzyfikasi_boolean($id,$id_var_gd,$keanggotaan_gd,$var_gd, 'YA','TIDAK');

			$id_var_bmi=7;
			$keanggotaan_bmi= $this->Keanggotaan_model->get_keanggotaan_by_var("tb_keanggotaan","id_variabel",$id_var_bmi);
			$query=$this->fuzzyfikasi($id,$id_var_bmi,$keanggotaan_bmi,$var_BMI, 'KURUS','NORMAL','OBESITAS');

			
 	}

 	private function fuzzyfikasi($id_periksa, $id_variabel, $keanggotaan, $var, $bb, $bt, $ba){
 		foreach ($keanggotaan as $value => $td) {
				if($td['keterangan']==$bb){
					if($var<$td['b_bawah']){
						$miu=1;
					}elseif(($var >= $td['b_bawah']) && ($var <=$td['b_atas'])){
						$miu=($td['b_atas']-$var)/($td['b_atas']-$td['b_bawah']);
					}elseif($var>$td['b_atas']) {
						$miu=0;
					}
				}
				elseif ($td['keterangan'] == $bt) {
					if($var<$td['b_bawah']){
						$miu=0;

					}elseif(($var >= $td['b_bawah']) && ($var <=$td['b_tengah'])){
						$miu=($var-$td['b_bawah'])/($td['b_tengah']-$td['b_bawah']);

					}
					elseif (($var>= $td['b_tengah'])&($var <= $td['b_atas'])) {
						$miu=($td['b_atas']-$var)/($td['b_atas']-$td['b_tengah']);
					}
					elseif($var>$td['b_atas']) {
						$miu=1;
					}
					
				}
				elseif ($td['keterangan'] == $ba){
					if($var<$td['b_bawah']){
						$miu=0;
					}elseif(($var >= $td['b_bawah']) && ($var <=$td['b_atas'])){
						$miu=($var-$td['b_bawah'])/($td['b_atas']-$td['b_bawah']);
					}elseif($var>$td['b_atas']) {
						$miu=1;
					}
				}

				if($miu !=0){
				/*dimasukan dalam database*/
				$fuzzy=array('id_periksa' => $id_periksa,
							 'id_variabel'=> $id_variabel,
							 'id_keanggotaan'=>$td['id_keanggotaan'],
							 'mem_func' => $miu);
				$query=$this->Simple_CRUD->insertData('tb_hasil_periksa',$fuzzy);
				}else{
					/*don't insert anything*/
				}	
			

			}
	
	}

	private function fuzzyfikasi_boolean($id_periksa, $id_variabel, $keanggotaan, $var, $bb,$ba){
 		foreach ($keanggotaan as $value => $td) {
	 		if($td['keterangan']==$bb){
		 		if($var==1){
						$miu=1;
							    $fuzzy=array('id_periksa' => $id_periksa,
									 'id_variabel'=> $id_variabel,
									 'id_keanggotaan'=>$td['id_keanggotaan'],
									 'mem_func' => $miu);
								$query=$this->Simple_CRUD->insertData('tb_hasil_periksa',$fuzzy);
				}
			}
			elseif ($td['keterangan']==$ba) {
				if($var==0){
						$miu=1;
							    $fuzzy=array('id_periksa' => $id_periksa,
									 'id_variabel'=> $id_variabel,
									 'id_keanggotaan'=>$td['id_keanggotaan'],
									 'mem_func' => $miu);
								$query=$this->Simple_CRUD->insertData('tb_hasil_periksa',$fuzzy);
				}		
 			}
 		}
 	}

 	private function proses_conjuction($id){
 		$get_hasil_fuzzy= $this->Keanggotaan_model->hasil_keanggotaan($id);
		
		$gen_L='';
		$gen_P=''; 
		
		$usia_dws='';
 		$usia_lansia='';
		$usia_manula='';
		 
		$td_rendah='';
 		$td_normal='';
 		$td_tinggi='';
 		
		$ht_ya='';
		$ht_tdk='';
		
		$smoke_ya='';
		$smoke_tdk='';

		$gd_ya='';
 		$gd_tdk='';

 		$bmi_kurus='';
 		$bmi_normal='';
 		$bmi_obesitas='';
		 
		
 		foreach ($get_hasil_fuzzy as $key => $val) {
			
			//kelompok 1 gender
			if ($val['id_variabel']==1) {
				if($val['keterangan']=='L'){
				
					$gen_L=$val['mem_func'];
				}
				elseif ($val['keterangan']=='P') {
				
					$gen_P=$val['mem_func'];
				}
			}

			//kelompok 2 usia
			elseif ($val['id_variabel']==2) {
				if($val['keterangan']=='DEWASA'){
					
					$usia_dws=$val['mem_func'];
				}
				elseif ($val['keterangan']=='LANSIA') {
					
					$usia_lansia=$val['mem_func'];
				}
				elseif ($val['keterangan']=='MANULA') {
					
					$usia_manula=$val['mem_func'];
				}
			}
			
			//kelompok 3 tekanan darah 
			elseif($val['id_variabel']==3){
 				if($val['keterangan']=='RENDAH'){
 					
 					$td_rendah=$val['mem_func'];
 				}
 				elseif ($val['keterangan']=='NORMAL') {
 					
 					$td_normal=$val['mem_func'];
 				}
 				elseif ($val['keterangan']=='TINGGI') {
 					
 					$td_tinggi=$val['mem_func'];
 				}
			 }
			 
			 //kelompok 4 treatment HT
			 elseif ($val['id_variabel']==4) {
				if($val['keterangan']=='YA'){
				
					$ht_ya=$val['mem_func'];
				}
				elseif ($val['keterangan']=='TIDAK') {
				
					$ht_tdk=$val['mem_func'];
				}
			}

			//kelompok 5 treatment smoker
			elseif ($val['id_variabel']==5) {
				if($val['keterangan']=='YA'){
				
					$smoke_ya=$val['mem_func'];
				}
				elseif ($val['keterangan']=='TIDAK') {
				
					$smoke_tdk=$val['mem_func'];
				}
			}

			//kelompok 6 diabet/gula darah
			elseif ($val['id_variabel']==6) {
				if($val['keterangan']=='YA'){
				
					$gd_ya=$val['mem_func'];
				}
				elseif ($val['keterangan']=='TIDAK') {
				
					$gd_tdk=$val['mem_func'];
				}
			}
			 
			//kelompok 7 bmi
 			elseif ($val['id_variabel']==7) {
 				if($val['keterangan']=='KURUS'){
 				
 					$bmi_kurus=$val['mem_func'];
 				}
 				elseif ($val['keterangan']=='NORMAL') {
 				
 					$bmi_normal=$val['mem_func'];
 				}
 				elseif ($val['keterangan']=='OBESITAS') {
 					
 					$bmi_obesitas=$val['mem_func'];
 				}
 			}
 			
 		}

 		#just for testing
 		// $kump_nilai=array(
 		// 		'gen_L' 		=>$gen_L,
		// 		'gen_P' 		=>$gen_P,
		// 		'usia_dws' 		=>$usia_dws,
		// 		'usia_lansia' 	=>$usia_lansia,
		// 		'usia_manula' 	=>$usia_manula,
		// 		'td_rendah' 	=>$td_rendah,
		// 		'td_normal'		=>$td_normal,
		// 		'td_tinggi'		=>$td_tinggi,
		// 		'ht_ya'			=>$ht_ya,
		// 		'ht_tdk'		=>$ht_tdk,
		// 		'smoke_ya' 		=>$smoke_ya,
		// 		'smoke_tdk' 	=>$smoke_tdk,
		// 		'gd_ya'			=>$gd_ya,
		// 		'gd_tdk'		=>$gd_tdk,
		// 		'bmi_kurus' 	=>$bmi_kurus,
		// 		'bmi_normal' 	=>$bmi_normal,
		// 		'bmi_obesitas' 	=>$bmi_obesitas
		//  );

	
		 
		


 		$get_all_rule=$this->Simple_CRUD->getAllData('tb_rule');
 		$linguistic = array();
 		$disjunction = array();
 	
 		foreach ($get_all_rule->result_array() as $key => $rule) {
			if ($rule['gender']=='L') {
				$gender=$gen_L;
			}elseif ($rule['gender']=='P') {
				$gender=$gen_P;
			}

			if ($rule['usia']=='DEWASA') {
				$usia=$usia_dws;
			}elseif ($rule['usia']=='LANSIA') {
				$usia=$usia_lansia;
			}elseif ($rule['usia']=='MANULA') {
				$usia=$usia_manula;
			}

		   if($rule['tekanan_darah']=='RENDAH'){
 		   		$td=$td_rendah;
 		   }elseif($rule['tekanan_darah']=='NORMAL'){
 		   		$td=$td_normal;
 		   }elseif ($rule['tekanan_darah']=='TINGGI') {
 		   		$td=$td_tinggi;
 		   }
 		  
 		  
 		   if ($rule['HT']=='YA') {
 		   		$HT=$ht_ya;
 		   }elseif ($rule['HT']=='TIDAK') {
 		   		$HT=$ht_tdk;
		   }

		   if ($rule['smoker']=='YA') {
				$smoker=$smoke_ya;
		   }elseif ($rule['smoker']=='TIDAK') {
				$smoker=$smoke_tdk;
		   }
			 
		   if ($rule['GD']=='YA') {
				$GD=$gd_ya;
		   }elseif ($rule['GD']=='TIDAK') {
				$GD=$gd_tdk;
  		   }

		   if ($rule['bmi']=='KURUS') {
				$bmi=$bmi_kurus;
		   }elseif ($rule['bmi']=='NORMAL') {
				$bmi=$bmi_normal;
		   }elseif ($rule['bmi']=='OBESITAS') {
				$bmi=$bmi_obesitas;
		   }
				

 		   if($gender !='' && $usia!='' && $td !='' && $HT !='' && $smoker!='' && $GD !='' && $bmi !=''){

 		   $bobot=min($gender, $usia, $td, $HT, $smoker, $GD, $bmi); 
 		   $linguistic[]=array('rule' => "IF GENDER =".$rule['gender']."(".$gender.") AND USIA =".$rule['usia']."(".$usia.")  AND TEKANAN DARAH =".$rule['tekanan_darah']."(".$td.") AND TREATMENT HT = ".$rule['HT']."(".$HT.") AND SMOKER =".$rule['smoker']."(".$smoker.") AND DIABETES = ".$rule['GD']."(".$GD.")  AND BMI =".$rule['bmi']."(".$bmi.") THEN Risiko Penyakit Jantung =".$rule['tingkat_risiko']."(".$bobot.")", ); 
		
 		  /* proses disjuction */
 		  $disjunction[]=array('tingkat_risiko' => $rule['tingkat_risiko'], 'bobot' => $bobot, ); 
 		
 		   #untuk test variabel tanpa usia
 		   //  if($td !='' && $bmi!='' && $kol !='' && $gd !=''  && $rwyt !=''){
 		   // echo "<li>IF TEKANAN DARAH =".$rule['tekanan_darah']."(".$td.") AND GULA DARAH = ".$rule['gula_darah']."(".$gd.") AND KOLESTEROL =".$rule['kolesterol']."(".$kol.") AND BMI =".$rule['bmi']."(".$bmi.")   AND RIWAYAT =".$rule['riwayat']."(".$rwyt.")</li>";
 		   }
 		}
 		
 		 return $rule=array('linguistic' => $linguistic, 'disjunction' =>$disjunction );
 	}		

 	private function proses_disjuction($disjunction){
 			$risiko_rendah=0;
			$risiko_sedang=0;
			$risiko_tinggi=0;
			$res_rendah=array();
			$res_sedang=array();
			$res_tinggi=array();
			foreach ($disjunction as $key => $val) {
				if($val['tingkat_risiko']=='RENDAH'){
					$risiko_rendah=$risiko_rendah+1;
					$res_rendah[]=$val['bobot'];
				}elseif ($val['tingkat_risiko']=='SEDANG') {
					$risiko_sedang=$risiko_sedang+1;
					$res_sedang[]=$val['bobot'];
				}elseif ($val['tingkat_risiko']=='TINGGI') {
					$risiko_tinggi=$risiko_tinggi+1;
					$res_tinggi[]=$val['bobot'];
				}
			}

			// /*hitung jumlah per kategori */
			// $data['jml_rendah']=$risiko_rendah;
			// $data['jml_sedang']=$risiko_sedang;
			// $data['jml_tinggi']=$risiko_tinggi;

			/*print disjuction*/
			$disj_rendah=implode(' <b>&#8746;</b> RENDAH ',$res_rendah);
			$disj_sedang=implode(' <b>&#8746;</b> SEDANG ', $res_sedang); 
			$disj_tinggi=implode(' <b>&#8746;</b> TINGGI ', $res_tinggi); 

			$string_rendah='';
			$string_sedang='';
			$string_tinggi='';

			if($risiko_rendah != 0 && empty($res_rendah)== FALSE){
				$max_rendah=max($res_rendah);
				$string_rendah= "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<p>Tingkat Risiko Penyakit Jantung RENDAH ".$disj_rendah."</p>
									   <p> -> Nilai MAX untuk Deteksi Tingkat Risiko Penyakit Jantung <b>RENDAH</b> = ".$max_rendah."<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;";
			}
			else{
				$max_rendah=0;
			}
			if($risiko_sedang !=0 && empty($res_sedang)== FALSE){
				$max_sedang=max($res_sedang);
				$string_sedang= " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <p>Tingkat Risiko Penyakit Jantung SEDANG ".$disj_sedang."</p>
									   <p> -> Nilai MAX untuk Deteksi Tingkat Risiko Penyakit Jantung <b>SEDANG</b> = ".$max_sedang."<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;";
			}
			else{
				$max_sedang=0;
			}
			if($risiko_tinggi !=0 && empty($res_tinggi) == FALSE){
				$max_tinggi=max($res_tinggi);
				$string_tinggi=  "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <p>Tingkat Risiko Penyakit Jantung TINGGI ".$disj_tinggi."</p>
									   <p> -> Nilai MAX untuk Deteksi Tingkat Risiko Penyakit Jantung <b>TINGGI</b> = ".$max_tinggi."<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;";
			}else{
				$max_tinggi=0;
			}

			 return $string_max=array('string_rendah' => $string_rendah,
			 						  'string_sedang' => $string_sedang,
			 						  'string_tinggi' => $string_tinggi,
			 						  'jml_rendah'    => $risiko_rendah,
			 						  'jml_sedang'    => $risiko_sedang,
			 						  'jml_tinggi'    => $risiko_tinggi,
			 						  'max_rendah'    => $max_rendah,
			 						  'max_sedang'    => $max_sedang,
			 						  'max_tinggi'    => $max_tinggi); 

 	}

 	private function proses_defuzzification($id, $rendah, $sedang, $tinggi){
 		$data_pemeriksaan= $this->Simple_CRUD->get_detail1("tb_periksa","id_periksa",$id);
			
		$var_gender = $data_pemeriksaan['var_gender'];

		$data_diagnosa=$this->Simple_CRUD->getAllData('tb_diagnosa');

		$konsekuen = array($rendah,$sedang,$tinggi);
		
		if($var_gender==1){
			$var_gender='Laki-Laki';
		}else{
			$var_gender='Perempuan';
		}

		$def=array();
		foreach ($data_diagnosa->result_array() as $key => $value) {
			$def[]=array('tingkat_risiko' => $value['nama_diagnosa'],
			             'gender'         => $var_gender,
			             'score'          => $value['score'],
			             'z_score'        => $value['score']*$konsekuen[$key]);
		}

		return $def;
 	}


}
