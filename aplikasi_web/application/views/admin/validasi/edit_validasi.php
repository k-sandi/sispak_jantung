<div class="page-title">                    
    <h2><span class="fa fa-arrow-circle-o-left"></span>Validasi Data</h2>
</div>
<!-- END PAGE TITLE -->                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                
                
                    <div class="row">
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <form class="form-horizontal" method="post" <?php echo form_open('admin/Validasi/update_validasi');?>
                            <div class="panel panel-default">
                                <div class="panel-heading">  
                                
                                </div>
                                <div class="panel-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="3%">No</th>
                                                <th width="8%">Tanggal Test</th>
                                                <th width="8%">Username</th>
                                                <th width="5%">Nama</th>
                                                <th width="5%">Jenis Kelamin</th>
                                                <th width="5%">Usia</th>
                                                <th width="5%">Tensi Sistol</th>
                                                <th width="5%">Tensi Diastol</th>
                                                <th width="8%">Treatment Hipertensi</th>
                                                <th width="5%">Perokok (Smoker)</th>
                                                <th width="5%">Diabetes</th>
                                                <th width="5%">BMI</th>
                                                <th width="5%">Z Total</th>
                                                <th width="8%">Nama Diagnosa</th>
                                                <th width="15%">Validasi Pakar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no = 1;
                                        foreach($data_kesimpulan->result_array() as $op)
                                        {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++;?></td>
                                                <td><?php echo $op['tgl_test'];?></td>
                                                <td><?php echo $op['username'];?></td>
                                                <td>
                                                <?php 
                                                      $nama_lengkap=$op['nama_lengkap'];
                                                                    $split = explode(" ", $nama_lengkap);
                                                                    $initial = "";
                                                                    foreach ($split as $key => $value) {
                                                                       if(!empty($value)){
                                                                       $nama=$value[0];
                                                                       $initial .= $nama;
                                                                       }
                                                                    }
                                                                    echo $initial;
                                      
                                                ?></td>
                                                <td>
                                                    <?php if($op['jenis_kelamin']=='L'){
                                                            echo "Laki - Laki";
                                                        }else{
                                                            echo "Perempuan";
                                                    };?>
                                                </td>
                                                <td><?php echo $op['usia'];?></td>
                                                <td > 
                                                    <?php $id_periksa=$op['id_periksa'];
                                                        foreach ($data_periksa->result_array()  as $op2) {
                                                            if($op2['id_periksa']==$id_periksa){
                                                                echo $op2['var_sistol'];
                                                            }
                                                        }?>
                                                </td>
                                                <td > 
                                                    <?php $id_periksa=$op['id_periksa'];
                                                        foreach ($data_periksa->result_array()  as $op2) {
                                                            if($op2['id_periksa']==$id_periksa){
                                                                echo $op2['var_diastol'];
                                                            }
                                                        }?>
                                                </td>
                                                <td > 
                                                    <?php $id_periksa=$op['id_periksa'];
                                                        foreach ($data_periksa->result_array()  as $op2) {
                                                            if($op2['id_periksa']==$id_periksa){
                                                                if($op2['var_HT']=='0'){
                                                                    echo "TIDAK";
                                                                }else{
                                                                    echo "YA";
                                                                }
                                                            }
                                                        }?>
                                                </td>
                                                <td > 
                                                    <?php $id_periksa=$op['id_periksa'];
                                                        foreach ($data_periksa->result_array()  as $op2) {
                                                            if($op2['id_periksa']==$id_periksa){
                                                                if($op2['var_smoker']=='0'){
                                                                    echo "TIDAK";
                                                                }else{
                                                                    echo "YA";
                                                                }
                                                            }
                                                        }?>
                                                </td>
                                                <td > 
                                                    <?php $id_periksa=$op['id_periksa'];
                                                        foreach ($data_periksa->result_array()  as $op2) {
                                                            if($op2['id_periksa']==$id_periksa){
                                                                if($op2['var_GD']=='0'){
                                                                    echo "TIDAK";
                                                                }else{
                                                                    echo "YA";
                                                                }
                                                            }
                                                        }?>
                                                </td>
                                                <td > 
                                                    <?php $id_periksa=$op['id_periksa'];
                                                        foreach ($data_periksa->result_array()  as $op2) {
                                                            if($op2['id_periksa']==$id_periksa){
                                                                echo $op2['var_BMI'];
                                                            }
                                                        }?>
                                                </td>
                                                
                                                <td><?php echo $op['z_total'];?></td>
                                                <td><?php echo $op['nama_diagnosa'];?></td>
                                                <td>
                                                    <select  name="pakar[]" class="form-control select">
                                                        <option value="RENDAH" <?php echo ($op['nama_diagnosa'] == "RENDAH")?"selected":""; ?>>RENDAH</option>
                                                        <option value="SEDANG" <?php echo ($op['nama_diagnosa'] == "SEDANG")?"selected":""; ?>>SEDANG</option>
                                                        <option value="TINGGI" <?php echo ($op['nama_diagnosa'] == "TINGGI")?"selected":""; ?>>TINGGI</option>
                                                    </select>
                                                    
                                                </td>
                                                <input type="hidden" class="form-control" value=<?php echo $op['id_validasi'];?> name="id_validasi[]" maxlength="3">
                                            </tr>
                                        <?php
                                        }
                                        ?>  
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                            <!-- END DEFAULT DATATABLE -->
                            <div class="panel-footer">                                 
                                    <button type="submit" class="btn btn-warning btn-lg center-block">Validasi</button>
                            </div>
                            </form>
                        </div>
                    </div>                                
                    
                </div>
                <!-- PAGE CONTENT WRAPPER -->                                  
        
