                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                  <?php
                                        if(!empty($profile['img']))
                                            $img=$profile['img'];
                                        else
                                            $img='no-image.jpg';   
                                    ;?> 
                                                    
                                <div class="panel-body profile" style="background: url('<?php echo base_url(); ?>gambar_petugas/<?php echo $img;?>" class="user-image" alt="User Image"') center center no-repeat;">
                                    <div class="profile-image">
                                        <img src="<?php echo base_url(); ?>gambar_petugas/<?php echo $img;?>" alt="Nadia Ali"/>
                                    </div>
                                    <div class="profile-data">
                                        <div class="profile-data-name"><?php echo $profile['username'] ;?></div>
                                        <div class="profile-data-title" style="color: #FFF;"><?php echo $profile['nama'] ;?></div>
                                    </div>
                                    <!-- <div class="profile-controls">
                                        <a href="#" class="profile-control-left twitter"><span class="fa fa-twitter"></span></a>
                                        <a href="#" class="profile-control-right facebook"><span class="fa fa-facebook"></span></a>
                                    </div>    -->                                 
                                </div>                                
                                <div class="panel-body">                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="<?php echo base_url(); ?>admin/profile/edit_profile" target="_parent">
                                            <button class="btn btn-info btn-rounded btn-block"><span class="fa fa-edit"></span>Edit Profile</button>
                                            </a>
                                        </div>
                                        <div class="col-md-6"> 
                                         <a href="<?php echo base_url(); ?>admin/profile/edit_password" target="_parent">
                                         <button class="btn btn-info btn-rounded btn-block"><span class="fa fa-key"></span>Reset Password</button>  
                                        </a>
                                        </div>
                                      
                                    </div>
                                </div>
                                <div class="panel-body list-group border-bottom">
                                <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                    <div class="col-md-2">   
                                        </div>
                                    <div class="col-md-8">   
                                      
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <td>Username</td>
                                                <td><?php echo $profile['username'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Nama</td>
                                                <td><?php echo $profile['nama'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Gender</td>
                                                <td> <?php if($profile['gender']=='P'){
                                                            echo "Perempuan";
                                                        }
                                                      else{
                                                            echo "Laki - Laki";
                                                      };?>        
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td><?php echo $profile['alamat'];?></td>
                                            </tr>
                                            <tr>
                                                <td>HP</td>
                                                <td><?php echo $profile['hp'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Keterangan</td>
                                                <td><?php echo $profile['ket'];?></td>
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