<!-- PAGE TITLE -->
<div class="page-title">                    
    <h2><span class="fa fa-arrow-circle-o-left"></span>Add User</h2>
</div>
<!-- END PAGE TITLE -->                

                    <div class="row">
                        <div class="col-md-12">
                            
                            <form class="form-horizontal" method="post" <?php echo form_open_multipart('operator/user/add_user');?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                  
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <strong style="color: red"><?php echo $this->session->flashdata('error');?></strong>
                                </div>
                                <div class="panel-body">                                                                        
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Username</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" class="form-control" name="username" required="required" >
                                            </div>                                            
                                            <span class="help-block">Masukan username yang akan digunakan untuk login</span>
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Password</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                  <input type="password" id="password"   class="form-control" name="password" required="required">
                                            </div>                                            
                                            <span class="help-block">Masukan Password</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Confirm Password</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                  <input type="password"  id="confirmPassword"  class="form-control" name="confirmpassword" required="required">
                                            </div>                                            
                                            <span class="help-block">Ulangi Password</span>
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Nama Lengkap</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                  <input type="text"  class="form-control" name="nama" required="required">
                                            </div>                                            
                                            <span class="help-block">Masukan nama lengkap</span>
                                        </div>
                                    </div>

                                      <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Alamat</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                               <input type="text"  class="form-control" name="alamat"  >
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
                                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="L" checked="checked"> Laki - Laki
                                                          </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                          <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="P"> Perempuan
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
                                               <input type="text"  class="form-control" name="tempat"  >
                                            </div>                                            
                                            <span class="help-block">Masukan Tempat</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Tanggal Lahir</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                               <input type="date"  class="form-control" name="tgl_lahir"  >
                                            </div>                                            
                                            <span class="help-block">Masukan tanggal-bulan-tahun Lahir</span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">File</label>
                                        <div class="col-md-6 col-xs-12">                   
                                            <input type="file" class="fileinput btn-primary" name="foto" id="filename" class="form-control" title="Browse file"/>                     
                                            <span class="help-block">Input gambar profile</span>
                                        </div>
                                    </div>

            
                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Hp</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                   <input type="text" class="form-control" name="hp"  >
                                            </div>                                            
                                            <span class="help-block">Masukan no hp/telepon</span>
                                        </div>
                                    </div>

                                
                                     
                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">E-Mail</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                           <input type="email" class="form-control"  name="email" rows="5">
                                            <span class="help-block">Masukan e-mail</span>
                                        </div>
                                    </div>
                                    

                                </div>
                                <div class="panel-footer">
                                    <button  type="reset" class="btn btn-default">Clear Form</button>                                    
                                    <button type="submit" class="btn btn-primary pull-right" onclick="return Validate()">Add</button>
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
