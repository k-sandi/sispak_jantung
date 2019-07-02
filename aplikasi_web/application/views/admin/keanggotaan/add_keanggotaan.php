<!-- PAGE TITLE -->
<div class="page-title">                    
    <h2><span class="fa fa-arrow-circle-o-left"></span>Add keanggotaan</h2>
</div>
                    <div class="row">
                        <div class="col-md-12">
                            
                            <form class="form-horizontal" method="post" <?php echo form_open('admin/keanggotaan/add_keanggotaan');?>>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                   
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <strong style="color: red"><?php echo $this->session->flashdata('error');?></strong>
                                   <!--  <p>This is non libero bibendum, scelerisque arcu id, placerat nunc. Integer ullamcorper rutrum dui eget porta. Fusce enim dui, pulvinar a augue nec, dapibus hendrerit mauris. Praesent efficitur, elit non convallis faucibus, enim sapien suscipit mi, sit amet fringilla felis arcu id sem. Phasellus semper felis in odio convallis, et venenatis nisl posuere. Morbi non aliquet magna, a consectetur risus. Vivamus quis tellus eros. Nulla sagittis nisi sit amet orci consectetur laoreet. Vivamus volutpat erat ac vulputate laoreet. Phasellus eu ipsum massa.</p> -->
                                </div>
                                <div class="panel-body">                                                                        
                                    
                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Nama Variabel</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                             <select  name="id_variabel" class="form-control select" data-placeholder="Klik untuk memilih">
                                            <option value="">&nbsp;</option>
                                             <?php   foreach($data_variabel->result_array() as $op)
                                            {
                                            ?>
                                            <option value="<?php echo $op['id_variabel'];?>"><?php echo $op['nama_variabel'];?></option>
                                            <?php
                                            }
                                            ?>
                                            </select>
                                            <span class="help-block">Pilih variabel</span>
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Batas Bawah</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                  <input type="text" class="form-control" name="b_bawah" >
                                            </div>                                            
                                            <span class="help-block">Masukan Batas Bawah</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Batas Tengah</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                  <input type="text" class="form-control" name="b_tengah" >
                                            </div>                                            
                                            <span class="help-block">Masukan Batas Tengah</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Batas Atas</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                  <input type="text" class="form-control" name="b_atas" >
                                            </div>                                            
                                            <span class="help-block">Masukan Batas Atas</span>
                                        </div>
                                    </div>

                                       <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Keterangan</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                  <input type="text" class="form-control" name="keterangan" >
                                            </div>                                            
                                            <span class="help-block">Masukan keterangan</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="panel-footer">
                                    <button  type="reset" class="btn btn-default">Clear Form</button>                                    
                                    <button type="submit" class="btn btn-primary pull-right">Add</button>
                                </div>
                            </div>
                            </form>
                            
                        </div>
                    </div>     



