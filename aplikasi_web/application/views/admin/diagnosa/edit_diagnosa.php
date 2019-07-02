<!-- PAGE TITLE -->
<div class="page-title">                    
    <h2><span class="fa fa-arrow-circle-o-left"></span>Edit Diagnosa</h2>
</div>
                    <div class="row">
                        <div class="col-md-12">
                            
                            <form class="form-horizontal" method="post" <?php echo form_open('admin/diagnosa/update_diagnosa');?>
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
                                        <label class="col-md-3 col-xs-12 control-label">Nama Diagnosa</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="hidden" value="<?php echo $diagnosa['id_diagnosa'];?>" name="id_diagnosa" class="form-control" >
                                                <input type="text" value="<?php echo $diagnosa['nama_diagnosa'];?>" name="nama_diagnosa" class="form-control" >
                                            </div>                                            
                                            <span class="help-block">Masukan nama diagnosa</span>
                                        </div>
                                    </div>
                                    

                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Keterangan</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" value="<?php echo $diagnosa['keterangan'];?>" name="keterangan" class="form-control" > 
                                            </div>                                            
                                            <span class="help-block">Masukan keterangan</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="panel-footer">
                                    <button  type="reset" class="btn btn-default">Clear Form</button>                                    
                                    <button type="submit" class="btn btn-primary pull-right">Update</button>
                                </div>
                            </div>
                            </form>
                            
                        </div>
                    </div>     



