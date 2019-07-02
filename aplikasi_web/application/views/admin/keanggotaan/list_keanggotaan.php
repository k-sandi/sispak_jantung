<!--modal dialog untuk hapus -->
  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus</h4>
                </div>
            
                <div class="modal-body">
                    <p>Anda akan menghapus Data keanggotaan ini</p>
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
    <h2><span class="fa fa-arrow-circle-o-left"></span>List keanggotaan</h2>
</div>
<!-- END PAGE TITLE -->                

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                
                
                    <div class="row">
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">  
                                <div class="btn-group"><a href="<?php echo base_url(); ?>admin/keanggotaan/add_keanggotaan"  class="btn btn-success" role="button" data-toggle="tooltip" title="Tambah Data keanggotaan"><i class="fa fa-plus"></i>Tambah Data keanggotaan</a></div>                              
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>                                
                                </div>
                                <div class="panel-body">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="20%">Variabel</th>
                                                <th width="10%">Batas Bawah</th>
                                                <th width="10%">Batas Tengah</th>
                                                <th width="10%">Batas Atas</th>
                                                <th width="20%">Keterangan</th>
                                                <th width="20%">Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no = 1;
                                        foreach($data_keanggotaan->result_array() as $op)
                                        {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++;?></td>
                                                <td><?php $variabel=$op['id_variabel'];
                                                foreach ($data_variabel->result_array()  as $op2) {
                                                  if($op2['id_variabel']==$variabel){
                                                      echo $op2['nama_variabel'];
                                                  }
                                                }?></td>
                                                <td><?php echo $op['b_bawah'];?></td>
                                                <td><?php echo $op['b_tengah'];?></td>
                                                <td><?php echo $op['b_atas'];?></td>
                                                <td><?php echo $op['keterangan'];?></td>
                                                <td><?php echo 
                                                    '<div class="btn-group">
                                                     <a href="'.base_url().'admin/keanggotaan/edit_keanggotaan/?id_keanggotaan='.$op['id_keanggotaan'].'" class="btn btn-warning" role="button" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                                                    <span data-toggle="modal" data-target="#confirm-delete" data-href="'.base_url().'admin/keanggotaan/hapus_keanggotaan/?id_keanggotaan='.$op['id_keanggotaan'].'">
                                                    <a class="btn btn-danger" role="button" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash-o"></i></a>
                                                    </span>     </div>';?>
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