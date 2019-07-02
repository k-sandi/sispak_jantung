                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                            
                            <form class="form-horizontal" method="post" <?php echo form_open('admin/periksa/update_periksa');?> 
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Edit</strong>Pemeriksaan</h3>
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>
                                </div>
                                <div class="panel-body">
                                 
                                </div>
                                <div class="panel-body form-group-separated">
                                    
                                      <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Nama User</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select name="username" class="form-control select" data-live-search="true">
                                                <option value="">&nbsp;</option>
                                                <?php foreach($data_user->result_array() as $op2)
                                                        {
                                                        ?>
                                                          <?php  if($op2['username']== $periksa['username']){
                                                          ?>
                                                            <option value="<?php echo $op2['username'];?>" selected><?php echo $op2['nama_lengkap'];?></option>
                                                          <?php }
                                                                else if ($op2['username']!= $periksa['username']){?>
                                                            <option value="<?php echo $op2['username'];?>"><?php echo $op2['nama_lengkap'];?></option>
                                                          <?php
                                                            }
                                                            ?>
                                                        <?php
                                                        }
                                                        ?>
                                              </select>
                                            <span class="help-block">Pilih user</span>
                                        </div>
                                    </div>
                                 <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Tekanan Darah (Sistol)</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                  <input type="text" class="form-control" value="<?php echo $periksa['var_sistol'] ;?>" name="var_sistol" maxlength="3">
                                            </div>                                            
                                            <span class="help-block">Masukan nilai tekanan darah sistol</span>
                                        </div>
                                    </div>

                                 <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Tekanan Darah (Diastol)</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                  <input type="text" class="form-control" value="<?php echo $periksa['var_diastol'] ;?>" name="var_diastol" maxlength="3">
                                            </div>                                            
                                            <span class="help-block">Masukan nilai tekanan darah diastol</span>
                                        </div>
                                    </div>
                                <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Gula Darah Puasa (GDP)</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                  <input type="text" class="form-control" value="<?php echo $periksa['GD'] ;?>" name="GD" maxlength="3">
                                            </div>                                            
                                            <span class="help-block">Masukan hasil Pemeriksaan Gula Darah</span>
                                        </div>
                                    </div>
                                 
                                  <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Tinggi Badan</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                  <input type="text" class="form-control"  value="<?php echo $periksa['tinggi'] ;?>" name="tinggi" maxlength="3" >
                                            </div>                                
                                            <span class="help-block">Masukan hasil tinggi badan dalam (cm)</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Berat Badan</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                  <input type="text" class="form-control" value="<?php echo $periksa['berat'] ;?>" name="berat" maxlength="3">
                                            </div>                                
                                            <span class="help-block">Masukan hasil berat badan dalam (kg)</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Perokok (Smoker)</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                             <div class="input-group">
                                                      <div class="form-check form-check-inline">
                                                          <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" name="var_smoker" <?php echo ($periksa['var_smoker']=="1")?'checked':''?> id="inlineRadio1" value="1"> Ya
                                                          </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                          <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" name="var_smoker" <?php echo ($periksa['var_smoker']=="0")?'checked':''?> id="inlineRadio2" value="0"> Tidak
                                                          </label>
                                                        </div>
                                            </div>                                                         
                                            <span class="help-block">Pilih sesuai ada/tidak nya riwayat penyakit</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Treatment Hipertensi</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                             <div class="input-group">
                                                      <div class="form-check form-check-inline">
                                                          <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" name="var_HT" <?php echo ($periksa['var_HT']=="1")?'checked':''?> id="inlineRadio1" value="1"> Ya
                                                          </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                          <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" name="var_HT" <?php echo ($periksa['var_HT']=="0")?'checked':''?> id="inlineRadio2" value="0"> Tidak
                                                          </label>
                                                        </div>
                                            </div>                                                         
                                            <span class="help-block">Pilih Ya jika dalam pengobatan Hipertensi</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                        <input type="hidden" class="form-control" value="<?php echo $periksa['id_periksa'] ;?>" name="id_periksa">
                                    <button class="btn btn-default">Clear Form</button>                                    
                                    <button class="btn btn-primary pull-right">Submit</button>
                                </div>
                            </div>
                            </form>
                            
                        </div>
                    </div>                    
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                                
    






