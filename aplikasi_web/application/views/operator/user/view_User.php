                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">

                                  <?php
                                        if(!empty($User['img']))
                                            $img=$User['img'];
                                        else
                                        $img='no-image.jpg';
                                                
                                    ;?> 
                                <div class="panel-body profile" style="background: url('<?php echo base_url(); ?>gambar_petugas/<?php echo $img;?>" class="user-image" alt="User Image"') center center no-repeat;">
                                    <div class="profile-image">
                                        <img src="<?php echo base_url(); ?>gambar_petugas/<?php echo $img;?>" alt="gambar"/>
                                    </div>
                                    <div class="profile-data">
                                        <div class="profile-data-name"><?php echo $User['username'] ;?></div>
                                        <div class="profile-data-title" style="color: #FFF;"><?php echo $User['nama_lengkap'] ;?></div>
                                    </div>
                                    <!-- <div class="profile-controls">
                                        <a href="#" class="profile-control-left twitter"><span class="fa fa-twitter"></span></a>
                                        <a href="#" class="profile-control-right facebook"><span class="fa fa-facebook"></span></a>
                                    </div>    -->                                 
                                </div>                                
                                <div class="panel-body">                                    
                                    <div class="row">
                                         
                                        <div class="col-md-6">
                                            <a href="<?php echo base_url(); ?>operator/User/edit_User/?username=<?php echo $User['username'];?>" target="_parent">
                                            <button class="btn btn-info btn-rounded btn-block"><span class="fa fa-edit"></span>Edit User</button>
                                            </a>
                                        </div>
                                          <div class="col-md-6">
                                            <a href="<?php echo base_url(); ?>operator/User/edit_password?username=<?php echo $User['username'];?>" target="_parent">
                                            <button class="btn btn-info btn-rounded btn-block"><span class="fa fa-edit"></span>Edit Password</button>
                                            </a>
                                        </div>
                                       
                                      
                                    </div>
                                </div>
                                <div class="panel-body list-group border-bottom">
                                <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                    <div class="col-md-3">   
                                        </div>
                                    <div class="col-md-8">   
                                      
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <td>Username</td>
                                                <td><?php echo $User['username'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Nama</td>
                                                <td><?php echo $User['nama_lengkap'];?></td>
                                            </tr>
                                             <tr>
                                                <td>Tempat, Tanggal Lahir</td>
                                                <td><?php echo $User['tempat'];?>,&nbsp<?php echo date("d-M-Y", strtotime($User['tgl_lahir']));;?></td>
                                            </tr>
                                            <tr>
                                                <td>Gender</td>
                                                <td> <?php if($User['gender']=='P'){
                                                            echo "Perempuan";
                                                        }
                                                      else{
                                                            echo "Laki - Laki";
                                                      };?>        
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td><?php echo $User['alamat_lengkap'];?></td>
                                            </tr>
                                            <tr>
                                                <td>HP</td>
                                                <td><?php echo $User['no_hp'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td><?php echo $User['email'];?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                    </div>                                
                                </div>
                            </div>
                                </div>
                                </div>
                            </div>                            
                            
                        </div>
                    </div>