<!-- PAGE TITLE -->
<div class="page-title">                    
    <h2><span class="fa fa-arrow-circle-o-left"></span>Add Operator</h2>
</div>
<!-- END PAGE TITLE -->                

                    <div class="row">
                        <div class="col-md-12">
                            
                            <form class="form-horizontal" method="post" <?php echo form_open_multipart('admin/operator/add_operator');?>
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
                                        <label class="col-md-3 col-xs-12 control-label">Nama</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                  <input type="text"  class="form-control" name="nama" required="required">
                                            </div>                                            
                                            <span class="help-block">Masukan nama lengkap</span>
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
                                        <label class="col-md-3 col-xs-12 control-label">Status</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                      <div class="form-check form-check-inline">
                                                          <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="admin">Admin
                                                          </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                          <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" checked="checked" name="status" id="inlineRadio2" value="operator">Operator
                                                          </label>
                                                        </div>
                                            </div>                                            
                                            <span class="help-block">Pilih sesuai status. *) Status tidak dapat dirubah</span>
                                        </div>
                                    </div>

                                     
                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Keterangan</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                           <textarea class="form-control"  name="ket" rows="5"></textarea>
                                            <span class="help-block">Masukan keterangan terkait operator</span>
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
