<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Siakad AKPER Pamenang</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url(); ?>assets2/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        
        <!-- font Awesome -->
        <link href="<?php echo base_url(); ?>assets2/css/font-awesome.css" rel="stylesheet" type="text/css" />
         <link href="<?php echo base_url(); ?>assets/bs-select/bootstrap-select.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url(); ?>assets2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url(); ?>assets/animate/a.css" rel="stylesheet" type="text/css" />

        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?php echo base_url(); ?>assets2/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>assets2/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- Data Table -->
        <link href="<?php echo base_url(); ?>assets2/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo base_url(); ?>assets2/js/jquery-2.1.1.js" type="text/javascript"></script>

        <script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.jpg">
        <style type="text/css">
            body{
                font-size: 13px !important;
            }
            .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
                padding: 8px;
                line-height: 1.42857;
                vertical-align: top;
                border-bottom: 1px solid rgb(221, 221, 221) !important;
            }
            .box-header {
                color: #444;
                display: block;
                padding: 5px;
                position: relative;
            }
            .box-header.with-border {
                border-bottom: 1px solid #F4F4F4;
            }
            
        </style>
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.html" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <div class="animated fadeInDown">SIAKAD Akper</div>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        
                        <!-- Notifications: style can be found in dropdown.less -->
                       
                        <!-- Tasks: style can be found in dropdown.less -->
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>Hai, 
                                <span><?php echo $this->session->userdata('username');?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <!-- <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div> -->
                                    <div class="pull-right">
                                        <a href="<?php echo site_url('admin/dashboard/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <?php $this->load->view('layout/sidebar'); ?>
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1 class="animated fadeInDown">
                       <?php echo strtoupper($header); ?>
                    </h1>

                </section>

                <!-- Main content -->
                <section class="content">
                    <?php $this->load->view($content); ?>
                </section>
                <!-- /.content -->
            </aside><!-- /.right-side -->
            
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->
       

        <!-- jQuery UI 1.10.3 -->
        <script src="<?php echo base_url(); ?>assets2/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>assets2/js/bootstrap.min.js" type="text/javascript"></script>
         <script src="<?php echo base_url(); ?>assets/bootstrap/js/custom.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="<?php echo base_url(); ?>assets2/cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="<?php echo base_url(); ?>assets2/js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="<?php echo base_url(); ?>assets2/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="<?php echo base_url(); ?>assets2/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets2/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- fullCalendar -->
        <script src="<?php echo base_url(); ?>assets2/js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?php echo base_url(); ?>assets2/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="<?php echo base_url(); ?>assets2/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo base_url(); ?>assets2/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url(); ?>assets2/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!--input mask -->
        <script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets2/js/AdminLTE/app.js" type="text/javascript"></script>
        
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="<?php echo base_url(); ?>assets2/js/AdminLTE/dashboard.js" type="text/javascript"></script>        
        <!-- Data Table -->
        <script src="<?php echo base_url(); ?>assets2/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets2/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/bs-select/bootstrap-select.js" type="text/javascript"></script>
        
         <script type="text/javascript">
            $('.panel, .alert').hide();
            $('.panel, .alert').fadeIn('slow');
            
            $('#notif').hide();
            $('#notif').fadeIn(2000);
            $('#notif').fadeOut('slow');
            $('.box-title').addClass('animated fadeInDown');

          /*  $(document).bind('contextmenu', function (e) {
              e.preventDefault();
              alert('Klik Kanan Tidak diijinkan!');
            });*/

        </script>
    </body>
</html>