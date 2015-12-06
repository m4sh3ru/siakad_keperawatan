<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>SIAKAD | AKPER PAMENANG</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url(); ?>assets2/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
         <link href="<?php echo base_url(); ?>assets2/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>assets/animate/a.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets2/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets2/img/icon.ico">
    </head>
    <body class="bg-black">

        <div class="form-box animated fadeInDown" id="login-box">
            <div class="header"><a href="<?php echo base_url('/') ?>" style="color:#fff;"><span class="fa fa-lock fa-2x"></span></a></div>
            <?php echo form_open('auth/cek_login'); ?>
            
                <div class="body bg-gray">
                    <div class="form-group">
                       <div class="input-group">
                            <div class="input-group-addon"><i class="glyphicon glyphicon-user"></i></div>
                            <input type="text" name="userid" class="form-control" placeholder="Username" autofocus required/>
                       </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-key"></i></div>
                            <input type="password" name="password" class="form-control" placeholder="Password" required/>
                        </div>
                        
                    </div>          
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember me
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block btn-flat">Login Now <i class="fa fa-refresh fa-spin"></i></button>  

                </div>
            <?php echo form_close(); ?>

        <!--    <div class="margin text-center">
                <span>Sign in using social networks</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div> -->
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>assets2/js/bootstrap.min.js" type="text/javascript"></script>        

    </body>
</html>