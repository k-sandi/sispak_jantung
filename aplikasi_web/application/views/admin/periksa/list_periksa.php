<!--modal dialog untuk hapus -->
  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus</h4>
                </div>

                <div class="modal-body">
                    <p>Anda akan menghapus Data periksa ini</p>
                    <p><strong>Peringatan</strong>  Setelah data dihapus, data tidak dapat dikembalikan!</p>
                    <br />
                    <p>Ingin melanjutkan menghapus?</p>
                    <p class="debug-url"></p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Hapus</a>
                </div>
            </div>
        </div>
    </div>


<!-- PAGE TITLE -->
<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left"></span>List periksa</h2>
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

                                  <div class="btn-group"><a href="<?php echo base_url(); ?>admin/periksa/add_periksa"  class="btn btn-success" role="button" data-toggle="tooltip" title="Tambah Data periksa"><i class="fa fa-plus"></i>Tambah Data periksa</a></div>
                                  <div class="btn-group"><a href="<?php echo base_url(); ?>admin/periksa/update_all_hasil"  class="btn btn-default" role="button" data-toggle="tooltip" title="Update Semua Data Periksa"><i class="fa fa-refresh"></i>Update Semua Hasil Periksa</a></div>

                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>
                                </div>
                              -->
                                <div class="panel-body">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th width="5%"> No</th>
                                                <th width="5%">User</th>
                                                <th width="10%">Gender</th>
                                                <th width="5%"> Usia</th>
                                                <th width="10%">Tensi Sistol</th>
                                                <th width="10%">Tensi Diastol</th>
                                                <th width="10%">Treatment Hipertensi</th>
                                                <th width="10%">Perokok (Smoker)</th>
                                                <th width="10%">Gula Darah</th>
                                                <th width="10%">BMI</th>
                                                <th width="20%">Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no = 1;
                                        foreach($data_periksa->result_array() as $op)
                                        {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++;?></td>

                                                <td>
                                                <?php $variabel=$op['username'];
                                                foreach ($data_user->result_array()  as $op2) {
                                                  if($op2['username']==$variabel){
                                                      $nama_lengkap=$op2['nama_lengkap'];
                                                                    $split = explode(" ", $nama_lengkap);
                                                                    $initial = "";
                                                                    foreach ($split as $key => $value) {
                                                                       if(!empty($value)){
                                                                       $nama=$value[0];
                                                                       $initial .= $nama;
                                                                       }
                                                                    }
                                                                    echo $initial;

                                                  }
                                                }?>
                                                </td>
                                                <td><?php
                                                    if($op['var_gender']=='0'){
                                                        echo "Perempuan";
                                                    }else{
                                                        echo "Laki - Laki";
                                                    }
                                                ;?></td>

                                                <td><?php echo $op['var_usia'];?></td>
                                                <td><?php echo $op['var_sistol'];?></td>
                                                <td><?php echo $op['var_diastol'];?></td>
                                                <td><?php if($op['var_HT']=='1'){
                                                    echo "Ya";
                                                    }else{
                                                    echo "Tidak";
                                                    }
                                                ;?></td>
                                                 <td><?php if($op['var_smoker']=='1'){
                                                    echo "Ya";
                                                    }else{
                                                    echo "Tidak";
                                                    }
                                                ;?></td>
                                                <td><?php echo $op['GD'];?></td>
                                                <td><?php echo $op['var_BMI'];?></td>
                                                <td>
                                                <?php

                                                    if($op['valid']=='1')
                                                    {

                                                    echo
                                                    '<div class="btn-group">
                                                       <a href="'.base_url().'admin/periksa/hasil_periksa/?id_periksa='.$op['id_periksa'].'" class="btn btn-success" role="button" data-toggle="tooltip" title="View Hasil"><i class="glyphicon glyphicon-zoom-in"></i></a>';

                                                   }else{

                                                    echo
                                                    '<div class="btn-group">
                                                       <a class="btn btn-secondary" role="button" data-toggle="tooltip" title="Data Not Valid"><i class="glyphicon glyphicon-zoom-in"></i></a>';

                                                   };?>



                                                     <?php echo '<a href="'.base_url().'admin/periksa/edit_periksa/?id_periksa='.$op['id_periksa'].'" class="btn btn-warning" role="button" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                                                    <span data-toggle="modal" data-target="#confirm-delete" data-href="'.base_url().'admin/periksa/hapus_periksa/?id_periksa='.$op['id_periksa'].'">
                                                    <a class="btn btn-danger" role="button" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash-o"></i></a>
                                                    </span>

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



<script type="text/javascript">
$('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

            $('.debug-url').html('URL Hapus: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
        });

</script>
