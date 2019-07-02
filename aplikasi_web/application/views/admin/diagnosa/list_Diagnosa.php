<!--modal dialog untuk hapus -->
  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus</h4>
                </div>
            
                <div class="modal-body">
                    <p>Anda akan menghapus Data Diagnosa ini</p>
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
    <h2><span class="fa fa-arrow-circle-o-left"></span>List Diagnosa</h2>
</div>
<!-- END PAGE TITLE -->                

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                
                
                    <div class="row">
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">  
                                <div class="btn-group"><a href="<?php echo base_url(); ?>admin/Diagnosa/add_Diagnosa"  class="btn btn-success" role="button" data-toggle="tooltip" title="Tambah Data Diagnosa"><i class="fa fa-plus"></i>Tambah Data Diagnosa</a></div>                              
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
                                                <th width="20%">Nama Diagnosa</th>
                                                <th width="20%">Keterangan</th>
                                                <th width="20%">Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no = 1;
                                        foreach($data_diagnosa->result_array() as $op)
                                        {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++;?></td>
                                                <td><?php echo $op['nama_diagnosa'];?></td>
                                                <td><?php echo $op['keterangan'];?></td>
                                                <td><?php echo 
                                                    '<div class="btn-group">
                                                     <a href="'.base_url().'admin/Diagnosa/edit_Diagnosa/?id_diagnosa='.$op['id_diagnosa'].'" class="btn btn-warning" role="button" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                                                    <span data-toggle="modal" data-target="#confirm-delete" data-href="'.base_url().'admin/Diagnosa/hapus_Diagnosa/?id_diagnosa='.$op['id_diagnosa'].'">
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