                    <div class="row">
                        <div class="col-md-12">
                            <!-- START TABS -->                                
                            <div class="panel panel-default tabs">                            
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Data Pasien</a></li>
                                    <li><a href="#tab-second" role="tab" data-toggle="tab">Fuzzyfikasi</a></li>
                                    <li><a href="#tab-third" role="tab" data-toggle="tab">Inferensi</a></li>
                                    <li><a href="#tab-fourth" role="tab" data-toggle="tab">Defuzzifikasi</a></li>
                                    <li><a href="#tab-five" role="tab" data-toggle="tab">Kesimpulan</a></li>
                                </ul>                            
                                <div class="panel-body tab-content">
                                    <div class="tab-pane active" id="tab-first">
                                    <div class="row">
                                        <div class="col-md-4">
                                        <div class="panel panel-default">
                                            <div class="panel-body profile bg-info">
                                                <div class="profile-image">
                                                     <?php foreach($data_user->result_array() as $user)
                                                        {
                                                            
                                                            if($user['id_user']== $periksa['id_user']){
                                                        ?>

                                                        <?php
                                        if(!empty($user['img']))
                                            $img=$user['img'];
                                        else
                                        $img='no-image.jpg';
                                                
                                    ;?> 

                                                         <img src="<?php echo base_url();?>gambar_petugas/<?php echo $img;?>"" alt="John Doe">
                                                </div>
                                                <div class="profile-data">
                                                                <div class="profile-data-name">
                                                                    <?php echo $user['username'];?>    
                                                                </div>
                                                                <div class="profile-data-title">
                                                                    <?php 
                                                                    echo $user['nama_lengkap']
                                            
                                                                    ;?>        
                                                                </div>
                                                            </div>
                                                            <div class="profile-controls">
                                                            </div>
                                            </div>
                                        <div class="panel-body list-group">
                                           <div class="panel-body">
                                            <table class="table table-hover">
                                                <tbody>
                                                    <tr>
                                                        <td><span class="fa fa-user"> ID User</span></td>
                                                        <td><?php echo $periksa['id_user'];?></td>
                                                    </tr>
                                                      <tr>
                                                        <td><span class="fa fa-cog"> Nama Lengkap</span></td>
                                                        <td><?php echo $user['nama_lengkap'];?></td>
                                                    </tr>
                                                     <tr>
                                                        <td><span class="fa fa-cog"> Gender</span></td>
                                                        <td> <?php if($user['gender']=='P'){
                                                            echo "Perempuan";
                                                        }
                                                      else{
                                                            echo "Laki - Laki";
                                                      };?>     
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span class="fa fa-cog"> Tanggal Pemeriksaan</span></td>
                                                        <td><?php echo $periksa['tgl_test'];?></td>
                                                    </tr>
                                                </tbody>
                                            </table>                                   
                                            </div>
                                            <?php
                                        }}
                                        ?>   
                                        </div>                            
                                        </div>
                                        </div>
                                <div class="col-md-8">
                            
                                        <div class="panel panel-colorful">

                                           <div class="panel-body">
                                            <div class="panel-heading">
                                            <h3 class="panel-title">Variabel Pemeriksaan User</h3>
                                              </div>
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th  class="col-md-2">Tekanan Darah (Sistol)</th>
                                                        <th  class="col-md-2">Tekanan Darah (Diastol)</th>
                                                        <th  class="col-md-2">GDP</th>
                                                        <th  class="col-md-2">Kolesterol</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $periksa['var_sistol'];?></td>
                                                        <td><?php echo $periksa['var_diastol'];?></td>
                                                        <td><?php echo $periksa['var_GDP'];?></td>
                                                        <td><?php echo $periksa['var_kolesterol'];?></td>
                                                    </tr>
                                                  
                                                </tbody>
                                                <thead>
                                                    <tr>
                                                        <th class="col-md-2">BMI</th>
                                                        <th class="col-md-2">Riwayat</th>
                                                        <th class="col-md-2">Usia</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                 <tbody>
                                                    <tr>
                                                        <td><?php echo $periksa['var_BMI'];?></td>
                                                        <td><?php if($periksa['var_riwayat']=='1'){
                                                            echo "Ada";
                                                        }
                                                      else{
                                                            echo "Tidak Ada";
                                                      };?> </td>
                                                       <td><?php echo $periksa['var_usia'];?></td>
                                                       <td></td>
                                                    </tr>
                                                  
                                                </tbody>
                                            </table>                                                  
                                        </div>
                                        </div>
                                </div>
                                </div>

                                </div>
                        
                                <div class="tab-pane" id="tab-second">
                                    <div class="row">
                                        <div class="col-md-4">    
                                         <div class="panel panel-colorful">
                                            <div class="panel-body">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">A. Proses Fuzzyfikasi</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <p style="line-height: 200%">Merubah nilai <b>crips</b> variabel Tekanan Darah, Gula Darah, Kolesterol, BMI, Usia, Riwayat menjadi <b>nilai fuzzy (nilai a = derajat keanggotaan).</b> berdasarkan aturan fuzzy yang telah didefinisikan. </p>
                                                </div> 
                                            </div>    
                                        </div>
                                        </div>
                                        <div class="col-md-8">
                                        <div class="panel panel-colorful">
                                           <div class="panel-body">
                                            <div class="panel-heading">
                                            <h3 class="panel-title">Nilai Alpha Derajat Keanggotaan</h3>
                                              </div>
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th  class="col-md-1">No</th>
                                                        <th  class="col-md-2">Variabel</th>
                                                        <th  class="col-md-3">Keterangan</th>
                                                        <th  class="col-md-3">Derajat Keanggotaan</th>
                                                    </tr>
                                                </thead>
                                                <tbody> 
                                                <?php $no=1;
                                                foreach ($fuzzyfikasi as $val) { 
                                                    ;?>
                                                    <tr>
                                                        <td><?php echo $no++ ;?></td>
                                                        <td><?php echo $val['nama_variabel'];?></td>
                                                        <td><?php echo $val['keterangan'];?></td>
                                                        <td><?php echo $val['mem_func'];?></td>
                                                    </tr>
                                                     <?php }?>
                                                </tbody>
                                            </table>
                                                                                       
                                            </div>
                                        </div>
                                        </div>
                                     </div>
                                    </div>

                                    <div class="tab-pane" id="tab-third">
                                       <div class="row">
                                        <div class="col-md-4">    
                                         <div class="panel panel-colorful">
                                            <div class="panel-body">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">B.1. Proses Inferensi</h3>
                                                </div>
                                                <div class="panel-body">
                                                <table class="table table-hover">
                                                <tbody> 
                                                <?php $no=1;
                                                foreach ($fuzzyfikasi as $val) { 
                                                    ;?>
                                                    <tr>
                                                        <td><?php echo $no++ ;?></td>
                                                        <td><?php echo $val['nama_variabel'];?></td>
                                                        <td><?php echo $val['keterangan'];?></td>
                                                        <td>= <?php echo $val['mem_func'];?></td>
                                                    </tr>
                                                     <?php }?>
                                                </tbody>

                                            </table>
                                            <div class="panel-heading">
                                                <p>Jumlah Variabel Alpha = <?php echo $jum_alpha; ;?></p>
                                                 </div>          
                                                </div> 
                                            </div>    
                                        </div>
                                        </div>
                                        <div class="col-md-8">
                                        <div class="panel panel-colorful">
                                           <div class="panel-body">
                                            <div class="panel-heading">
                                            <h3 class="panel-title">B.1 Conjuction</h3>
                                            
                                              </div>
                                            <table class="table table-hover">
                                                <tbody> 
                                                <?php $no=1;
                                                foreach ($conjuction as $val) { 
                                                    ;?>
                                                    <tr>
                                                        <td><?php echo $no++ ;?></td>
                                                        <td><?php echo $val['rule'];?></td>
                                                    </tr>
                                                <?php }?>
                                                </tbody>
                                            </table>
                                            <div class="panel-heading">
                                                    <h5>Jumlah Rule = <?php echo $jum_rule; ;?></h5>
                                                </div>                                     
                                            </div>
                                        </div>
                                        <div class="panel panel-colorful">
                                           <div class="panel-body">
                                            <div class="panel-heading">
                                            <h3 class="panel-title">B.2. Disjunction</h3>
                                              </div>
                                               <div class="panel-body">
                                              <br />
                                              <p>Jumlah per masing - masing Tingkat Risiko Penyakit Jantung : </p>
                                               <p>Ambil nilai Max dari tingkat Risiko Penyakit Jantung yang sama (berdasarkan nilai - nilai linguistik yang dihubungkan)</p>
                                              <p>1. Tingkat Risiko <b>Rendah</b> = <?php echo $jml_rendah;?> </p>
                                              <?php if (!empty($rendah)){ ;?>
                                              <?php echo $rendah; }?>
                                              <p>2. Tingkat Risiko <b>Sedang</b> =  <?php echo $jml_sedang;?></p>
                                                <?php if (!empty($sedang)){ ;?>
                                              <?php echo $sedang; }?>
                                              <p>3. Tingkat Risiko <b>Tinggi</b> &nbsp&nbsp=  <?php echo $jml_tinggi;?> </p>
                                                 <?php if (!empty($tinggi)){ ;?>
                                              <?php echo $tinggi;}?>        
                                             
                                              
                                             
                                                                                    
                                               </div>                            
                                            </div>
                                        </div>
                                        </div>
                                     </div>
                                    </div>
                                    <div class="tab-pane" id="tab-fourth">
                                     <div class="row">
                                        <div class="col-md-4">    
                                         <div class="panel panel-colorful">
                                            <div class="panel-body">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">C. Proses Defuzzyfikasi</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <p>Mencari nilai total <b>Z Score</b> dengan :</p>
                                                    <p>Z = &Sigma;(&alpha;) * (Konsekuen)</p>
                                                     <p>Z Total = Z &divide; &Sigma;(Konsekuen)</p>
                                                </div> 
                                            </div>    
                                        </div>
                                        </div>
                                        <div class="col-md-8">
                                        <div class="panel panel-colorful">
                                              <div class="panel-body">
                                            <div class="panel-heading">
                                            <h3 class="panel-title"> Nilai Z Score Total</h3>
                                              </div>
                                                <div class="panel-body">
                                                <p>Masing-masing nilai <b>Z Score</b> berdasarkan masing-masing nilai MAX Tingkat Risiko : </p>
                                            </div>
                                            <table class="table table-hover">
                                                <thead>
                                                     <tr>
                                                      <th width=15%>No.</th>
                                                      <th>Tingkat Risiko</th>
                                                      <th>Gender</th>
                                                      <th>Score</th>
                                                      <th>Z Score</th>
                                                  </tr>
                                                </thead>
                                                <tbody> 
                                                <?php $no=1;
                                                foreach ($defuzzification as $val) { 
                                                    ;?>
                                                    <tr>
                                                        <td><?php echo $no++ ;?></td>
                                                        <td><?php echo $val['tingkat_risiko'];?></td>
                                                        <td><?php echo $val['gender'];?></td>
                                                        <td><?php echo $val['score'];?></td> 
                                                        <td><?php echo $val['z_score'];?></td>
                                                    </tr>
                                                     <?php }?>
                                                </tbody>
                                            </table>  

                                            <p>Z Score Total = (<?php echo $defuzzification[0]['z_score'];?> &plus; <?php echo $defuzzification[1]['z_score'];?> &plus; <?php echo $defuzzification[2]['z_score'];?>)  &divide; (<?php echo $max_rendah;?> &plus; <?php echo $max_sedang;?>&plus; <?php echo $max_tinggi;?>) </p>
                                            <p><b>Z Score Total = <?php echo $z_score_total;?></b></p>
                                            </div>

                                        </div>
                                        </div>
                                     </div>    
                                    </div>
                                    
                                    <div class="tab-pane" id="tab-five">
                                    <div class="row">
                                        <div class="col-md-12">
                                         <div class="panel panel-colorful">
                                              <div class="panel-body">
                                            <div class="panel-heading">
                                            <h3 class="panel-title">Kesimpulan</h3>
                                              </div>
                                              <div class="panel-body">
                                                <p>Berdasarkan hasil penentuan Tingkat Risiko Penyakit Jantung dengan Metode Inferensi Fuzzy Sugeno, maka User : </p>
                                            </div>
                                          
                                                     <?php foreach($data_user->result_array() as $user)
                                                        {
                                                            if($user['id_user']== $periksa['id_user']){
                                                        ?>
                                        <div class="panel-body list-group">
                                           <div class="panel-body">
                                            <table class="table table-hover">
                                                <tbody>
                                                    <tr>
                                                        <td class="col-md-2"><span class="fa fa-user"> ID User</span></td>
                                                        <td><?php echo $periksa['id_user'];?></td>
                                                    </tr>
                                                      <tr>
                                                        <td class="col-md-2"><span class="fa fa-cog"> Nama Lengkap</span></td>
                                                        <td><?php echo $user['nama_lengkap'];?></td>
                                                    </tr>
                                                     <tr>
                                                        <td class="col-md-2"><span class="fa fa-cog"> Gender</span></td>
                                                        <td> <?php if($user['gender']=='P'){
                                                            echo "Perempuan";
                                                        }
                                                      else{
                                                            echo "Laki - Laki";
                                                      };?>     
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-md-2"><span class="fa fa-cog"> Tanggal Pemeriksaan</span></td>
                                                        <td><?php echo $periksa['tgl_test'];?></td>
                                                    </tr>
                                                </tbody>
                                            </table>                                   
                                            </div>
                                            <?php
                                        }}
                                        ?>   
                                        </div>                            
                                        </div>
                                        </div>
                                <div class="col-md-12">
                                        <div class="panel panel-colorful">

                                           <div class="panel-body">
                                            <div class="panel-heading">
                                            <h3 class="panel-title">Variabel Pemeriksaan User</h3>
                                              </div>
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th  class="col-md-1">Tekanan Darah (Sistol)</th>
                                                        <th  class="col-md-1">Tekanan Darah (Diastol)</th>
                                                        <th  class="col-md-1">GDP</th>
                                                        <th  class="col-md-1">Kolesterol</th>
                                                         <th class="col-md-1">BMI</th>
                                                        <th class="col-md-1">Riwayat</th>
                                                        <th class="col-md-1">Usia</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $periksa['var_sistol'];?></td>
                                                        <td><?php echo $periksa['var_diastol'];?></td>
                                                        <td><?php echo $periksa['var_GDP'];?></td>
                                                        <td><?php echo $periksa['var_kolesterol'];?></td>
                                                         <td><?php echo $periksa['var_BMI'];?></td>
                                                        <td><?php if($periksa['var_riwayat']=='1'){
                                                            echo "Ada";
                                                        }
                                                      else{
                                                            echo "Tidak Ada";
                                                      };?> </td>
                                                       <td><?php echo $periksa['var_usia'];?></td>
                                                    </tr>
                                                  
                                                </tbody>
                                            </table>                                                  
                                        </div>
                                        </div>
                                </div>
                                        <div class="col-md-12">
                                        <div class="panel panel-colorful">
                                          <div class="panel-heading">
                                            <h3 class="panel-title">Hasil</h3>
                                              </div>
                                        <div class="panel-body">
                                        <p>Dinyatakan terdeteksi memiliki <?php echo $max_z_score;?> terhadap Penyakit Jantung dengan nilai sebesar <?php echo $z_score_total;?> </p>                     
                                        
                                        </div>
                                </div>
                                </div>
                                        
                                    </div>
                                </div>
                            </div>
                             




                            </div>                                                   
                            <!-- END TABS -->                        
                        </div>
                    </div>  
                    </div>             

               