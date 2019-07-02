
                    <div class="row">
                        <div class="col-md-12">
                            
                            <form class="form-horizontal" method="post" <?php echo form_open('admin/profile/update_password');?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Reset</strong>Password</h3>
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
                                                <input type="text" value="<?php echo $petugas['username'];?>"  disabled=disabled class="form-control" name="username" >
                                                <input type="hidden" value="<?php echo $petugas['username'];?>"  name="username" >
                                            </div>                                            
                                            <span class="help-block">Username tidak dapat diedit</span>
                                        </div>
                                    </div>
                                    

                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Password Baru</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                  <input type="password" id="password" class="form-control" name="password" >
                                            </div>                                            
                                            <span class="help-block">Masukan password baru</span>
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Konfirmasi Password</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                  <input type="password" id="confirmPassword"  class="form-control" name="password" >
                                            </div>                                            
                                            <span class="help-block">Ulangi password baru</span>
                                        </div>
                                    </div>
                                    

                                </div>
                                <div class="panel-footer">
                                    <button  type="reset" class="btn btn-default">Clear Form</button>                                    
                                    <button type="submit" onclick="return Validate()" class="btn btn-primary pull-right">Reset</button>
                                </div>
                            </div>
                            </form>
                            
                        </div>
                    </div>     

<script type="text/javascript">
    function Validate() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmPassword").value;
        if (password != confirmPassword) {
            alert("Password Tidak Cocok");
            return false;
        }
        return true;
    }
</script>


