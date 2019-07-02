<div class="py-5">
    <div class="container">

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

                    <div class="row">

                        <div class="col-md-12">

                            <form class="form-horizontal" method="post" <?php echo form_open('home/try_pemeriksaan');?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Mulai</strong>Pemeriksaan</h3>
                                </div>
                                <div class="panel-body">
                                <p>Untuk hasil secara detail, silahkan melakukan   <a href="<?php echo base_url(); ?>global/register" class="text-blue">Register</a> terlebih dahulu! :) </p>
                                </div>
                                <div class="panel-body form-group-separated">
                                <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Nama</label>
                                        <div class="col-md-6 col-xs-12">
                                           <div class="input-group">
                                        <input type="text" class="form-control" name="nama">
                                         </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Tanggal Lahir</label>
                                        <div class="col-md-6 col-xs-12">
                                           <div class="input-group">
                                        <input type="date" class="form-control" name="tgl_lahir">
                                         </div>
                                        </div>
                                    </div>

                                   <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Gender</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                      <div class="form-check form-check-inline">
                                                          <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" name="var_gender" id="inlineRadio1" value="L" checked="checked"> Laki - Laki
                                                          </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                          <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" name="var_gender" id="inlineRadio2" value="P"> Perempuan
                                                          </label>
                                                        </div>
                                            </div>

                                        </div>
                                    </div>

                                 <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Tekanan Darah (Sistol)</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                  <input type="text" class="form-control" name="var_sistol" maxlength="3">
                                            </div>
                                            <span class="help-block">Masukan nilai tekanan darah sistol</span>
                                        </div>
                                    </div>

                                 <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Tekanan Darah (Diastol)</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">

                                                  <input type="text" class="form-control" name="var_diastol" maxlength="3">
                                            </div>
                                            <span class="help-block">Masukan nilai tekanan darah diastol</span>
                                        </div>
                                    </div>
                                <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Gula Darah Puasa (GDP)</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">

                                                  <input type="text" class="form-control" name="GD" maxlength="3">
                                            </div>
                                            <span class="help-block">Masukan hasil Pemeriksaan Gula Darah</span>
                                        </div>
                                    </div>
                                  <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Tinggi Badan</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">

                                                  <input type="text" class="form-control" name="tinggi" maxlength="3" >
                                            </div>
                                            <span class="help-block">Masukan hasil tinggi badan dalam (cm)</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Berat Badan</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">

                                                  <input type="text" class="form-control" name="berat" maxlength="3">
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
                                                            <input class="form-check-input" type="radio" name="var_smoker" id="inlineRadio1" value="1" checked="checked"> Ya
                                                          </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                          <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" name="var_smoker" id="inlineRadio2" value="0"> Tidak
                                                          </label>
                                                        </div>
                                            </div>
                                            <span class="help-block">Pilih Ya jika seorang perokok Aktif</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Treatment Hipertensi</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                      <div class="form-check form-check-inline">
                                                          <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" name="var_HT" id="inlineRadio1" value="1" checked="checked"> Ya
                                                          </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                          <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" name="var_HT" id="inlineRadio2" value="0"> Tidak
                                                          </label>
                                                        </div>
                                            </div>
                                            <span class="help-block">Pilih Ya jika dalam pengobatan Hipertensi</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="panel-footer">
                                    <button class="btn btn-lg btn-primary">Cek!</button>
                                </div>
                            </div>
                            </form>

                        </div>
                    </div>

                </div>
                <!-- END PAGE CONTENT WRAPPER -->

                <br />
                <b>
                <?php if(!empty($hasil)){
                    if(!empty($hasil['max_z_score'])){
                        echo "<div class='alert alert-success' role='alert'>";
                        echo "<p>Dinyatakan terdeteksi memiliki ";
                        echo $hasil['max_z_score'];
                        echo " terhadap Penyakit Jantung dengan nilai sebesar ";
                        echo $hasil['z_score_total'];
                        echo "</p>";
                        echo "</div>";
                    }else{
                        echo "<div class='alert alert-danger' role='alert'>";
                        echo $hasil;
                        echo "</div>";
                    }
                };?>
                </b>
    </div>
  </div>
