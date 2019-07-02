<!-- PAGE TITLE -->
<div class="page-title">                    
    <h2><span class="fa fa-arrow-circle-o-left"></span>Edit User</h2>
</div>
<!-- END PAGE TITLE -->                

                    <div class="row">
                        <div class="col-md-12">
                            
                            <form class="form-horizontal" method="post" <?php echo form_open_multipart('operator/User/update_User');?>
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
                                        <label class="col-md-3 col-xs-12 control-label">Username</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" value="<?php echo $user['username'];?>"  disabled=disabled class="form-control" name="username" >
                                                <input type="hidden" value="<?php echo $user['username'];?>"  name="username" >
                                            </div>                                            
                                            <span class="help-block">Username tidak dapat diedit</span>
                                        </div>
                                    </div>
                                    

                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Nama Lengkap</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                  <input type="text" value="<?php echo $user['nama_lengkap'];?>"  class="form-control" name="nama"  >
                                            </div>                                            
                                            <span class="help-block">Masukan nama lengkap</span>
                                        </div>
                                    </div>

                                      <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Alamat Lengkap</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                               <input type="text" value="<?php echo $user['alamat_lengkap'];?>"  class="form-control" name="alamat"  >
                                            </div>                                            
                                            <span class="help-block">Masukan alamat lengkap</span>
                                        </div>
                                    </div>
                                    


                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Gender</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                      <div class="form-check form-check-inline">
                                                          <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" name="gender" <?php echo ($user['gender']=="L")?'checked':''?> id="inlineRadio1" value="L"> Laki - Laki
                                                          </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                          <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" name="gender" <?php echo ($user['gender']=="P")?'checked':''?> id="inlineRadio2" value="P"> Perempuan
                                                          </label>
                                                        </div>
                                            </div>                                            
                                            <span class="help-block">Pilih sesuai dengan gender</span>
                                        </div>
                                    </div>


                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Tempat</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                   <input type="text" value="<?php echo $user['tempat'];?>"  class="form-control" name="tempat"  >
                                            </div>                                            
                                            <span class="help-block">Masukan no hp/telepon</span>
                                        </div>
                                    </div>
                                    

                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Tanggal Lahir</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                   <input type="date" value="<?php echo $user['tgl_lahir'];?>"  class="form-control" name="tgl_lahir"  >
                                            </div>                                            
                                            <span class="help-block">Masukan no hp/telepon</span>
                                        </div>
                                    </div>
                                     <?php
                                        if(!empty($user['img']))
                                            $img=$user['img'];
                                        else
                                            $img='no-image.jpg';   
                                    ;?> 
                                              

                                  
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">File</label>
                                        <div class="col-md-6 col-xs-12">                   
                                        <img style="width:64px;height:64px" src="<?php echo base_url();?>gambar_petugas/<?php echo $img;?>">   
                                            <input type="file" class="fileinput btn-primary" name="foto" id="filename" class="form-control" title="Browse file"/>                     
                                            <span class="help-block">Input gambar profile</span>
                                        </div>
                                    </div>

            
                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Hp</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                   <input type="text" value="<?php echo $user['no_hp'];?>"  class="form-control" name="hp"  >
                                            </div>                                            
                                            <span class="help-block">Masukan no hp/telepon</span>
                                        </div>
                                    </div>
                                    

                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Keterangan</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <input type="text" value="<?php echo $user['email'];?>"  class="form-control" name="email"  >
                                            <span class="help-block">Masukan alamat email</span>
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


