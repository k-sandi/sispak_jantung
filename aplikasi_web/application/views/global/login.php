<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>
        <!-- META SECTION -->
        <title> <?php echo $title;?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

       <link rel="icon" href="<?php echo base_url(); ?>assets/heart.png" type="image/x-icon" />
        <!-- END META SECTION -->

        <!-- CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url(); ?>assets/css/theme-white.css"/>
        <!-- EOF CSS INCLUDE -->
    </head>
    <body>

        <div class="login-container">
        <a href="<?php echo base_url(); ?>home" class="btn btn-primary text-capitalize text-white">Kembali</a>
            <div class="login-box animated fadeInDown">

                <div class="login-body">
                    <div class="login-title"><strong>Silahkan</strong> Login </div>
                    <form class="form-horizontal" method="post"  action="<?php echo base_url(); ?>global/login/input" role="form">
                    <div class="form-group">
                        <div class="col-md-12">
                           <input type="text" class="form-control" name="username" placeholder="Username"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                               <input type="password" class="form-control" name="password" placeholder="Password"/>
                        </div>
                    </div>
                      <strong style="color: red"><?php echo $this->session->flashdata('error');?></strong>
                    <div class="form-group">
                        <div class="col-md-6">
                        <!--    <a href="<?php echo base_url(); ?>global/register/forgot_password" class="btn btn-link btn-block">Forgot your password?</a>-->
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block">Log In</button>
                        </div>
                    </div>
                    <div class="login-or">OR</div>
                    <!-- <div class="form-group">
                        <div class="col-md-4">
                            <button class="btn btn-info btn-block btn-twitter"><span class="fa fa-twitter"></span> Twitter</button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-info btn-block btn-facebook"><span class="fa fa-facebook"></span> Facebook</button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-info btn-block btn-google"><span class="fa fa-google-plus"></span> Google</button>
                        </div>
                    </div> -->
                    <div class="login-subtitle">
                        Belum memiliki akun? <a href="<?php echo base_url(); ?>global/register">Buat akun</a>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2019 Politeknik Pos Indonesia
                    </div>
                 <!--    <div class="pull-right">
                        <a href="#">About</a> |
                        <a href="#">Privacy</a> |
                        <a href="#">Contact Us</a>
                    </div> -->
                </div>
            </div>

        </div>

    </body>
</html>
