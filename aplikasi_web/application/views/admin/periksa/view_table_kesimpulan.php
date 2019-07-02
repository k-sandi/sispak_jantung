<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left"></span>Tabel Hasil Pemeriksaan</h2>
</div>
<!-- END PAGE TITLE -->
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <!--
                                <div class="panel-heading">
                                   <div class="btn-group"><a href="<?php echo base_url(); ?>admin/kesimpulan/update_tbl_kesimpulan"  class="btn btn-default" role="button" data-toggle="tooltip" title="Generate Tabel Kesimpulan"><i class="fa fa-refresh"></i>Generate Tabel Kesimpulan</a></div>
                                   <div class="btn-group"><a href="<?php echo base_url(); ?>admin/validasi"  class="btn btn-success" role="button" data-toggle="tooltip" title="Validasi Data"><i class="fa fa-stethoscope"></i>View Hasil Kinerja Sistem</a></div>
                                </div>
                              -->
                                <div class="panel-body">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="15%">Tanggal Test</th>
                                                <th width="10%">Username</th>
                                                <th width="15%">Nama</th>
                                                <th width="10%">Jenis Kelamin</th>
                                                <th width="10%">Usia</th>
                                                <th width="5%">Z Total</th>
                                                <th width="10%">Nama Diagnosa</th>
                                                <th width="10%">Lihat Detail</th>

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
                                                <td><?php if($op['jenis_kelamin']=='L'){
                                                    echo "Laki - Laki";
                                                }else{
                                                    echo "Perempuan";
                                                }
                                                ;?></td>
                                                <td><?php echo $op['usia'];?></td>
                                                <td><?php echo $op['z_total'];?></td>
                                                <td><?php echo $op['nama_diagnosa'];?></td>
                                                <td>
                                                     <?php echo '<a href="'.base_url().'admin/periksa/hasil_periksa/?id_periksa='.$op['id_periksa'].'" class="btn btn-success" role="button" data-toggle="tooltip" title="Lihat Detail"><i class="fa fa-eye"></i></a>
                                                         </div>';?>
                                                </td>

                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <!-- END DEFAULT DATATABLE -->
                        </div>
                    </div>

                </div>
                <!-- PAGE CONTENT WRAPPER -->
