<!-- PAGE TITLE -->
<div class="page-title">                    
    <h2><span class="fa fa-arrow-circle-o-left"></span>Add keanggotaan</h2>
</div>
                    <div class="row">
                        <div class="col-md-12">
                            
                            <form class="form-horizontal" method="post" <?php echo form_open('admin/variabel/add_var_keanggotaan');?>>
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
                                    <input type="hidden" class="form-control" name="id_variabel" value="<?php echo $id ;?>">
                                    <button  type="reset" class="btn btn-default">Clear Form</button>                                    
                                    <button type="submit" class="btn btn-primary pull-right">Add</button>
                                </div>
                            </div>
                            </form>
                            
                        </div>
                    </div>     



