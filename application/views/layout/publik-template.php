<!DOCTYPE html>
<html>
  <head>
	<meta charset="UTF-8">
	<title>AdminLTE 2 | Dashboard</title>
	
		<link href="<?php echo base_url(); ?>assets2/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		
		<!-- font Awesome -->
		<link href="<?php echo base_url(); ?>assets2/css/font-awesome.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/animate/a.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/bs-select/bootstrap-select.css" rel="stylesheet" type="text/css" />
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
		.title{
			color: #fff !important;
		}
	 	.box-header {
            color: #444;
            display: block;
            position: relative;
        }
        .box-header.with-border {
            border-bottom: 1px solid #F4F4F4;
        }
		.enable{
                background-color: #313C42 !important;
            }
		</style>
  </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="skin-blue layout-top-nav">
	<div class="wrapper">

	  <header class="main-header">               
		<nav class="navbar navbar-static-top">
		  <div class="container">
			<div class="navbar-header animated fadeInLeft">
			  <a href="" class="navbar-brand title"><b>AKPER</b> Pamenang</a>
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
				<i class="fa fa-bars"></i>
			  </button>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
			  <ul class="nav navbar-nav animated fadeIn">
			  	<li <?php if(isset($dash)) echo $dash; ?>>
					<a href="<?php echo site_url('mahasiswa'); ?>" class="title"><i class="fa fa-dashboard"></i> Dashboard <span class="sr-only">(current)</span></a>
				</li>
				<li <?php if(isset($kr)) echo $kr; ?>>
					<a href="<?php echo site_url('mahasiswa/kartu_rencana_studi'); ?>" class="title"><i class="fa fa-outdent"></i> KRS <span class="sr-only">(current)</span></a>
				</li>
				<li <?php if(isset($kh)) echo $kh; ?>>
					<a href="<?php echo site_url('mahasiswa/kartu_hasil_studi'); ?>" class="title"><i class="fa fa-tasks"></i> KHS</a>
				</li>
			  </ul>
			  <form class="navbar-form navbar-left" role="search">
				<div class="form-group">
				  <input type="text" class="form-control" id="navbar-search-input" placeholder="Search" disabled>
				</div>
			  </form>                          
			</div><!-- /.navbar-collapse -->
			<!-- Navbar Right Menu -->
			  <div class="navbar-custom-menu">
				<ul class="nav navbar-nav  pull-right">
				  <!-- User Account Menu -->
				  <li class="dropdown user user-menu">
					<!-- Menu Toggle Button -->
					<a href="#" class="dropdown-toggle animated fadeIn" data-toggle="dropdown">

					  <span class="fa fa-cogs"></span> Option
					</a>
					<ul class="dropdown-menu">
					  <!-- Menu Footer-->
					  <li class="user-footer">
						<div class="pull-left">
						  <a href="<?php echo base_url('mahasiswa/ubah_kata_sandi'); ?>" class="btn btn-default btn-sm btn-flat"><span class="fa fa-lock"></span> Ubah Kata Sandi</a>
						</div>
						<div class="pull-right">
						  <a href="<?php echo base_url('admin/dashboard/logout'); ?>" class="btn btn-default btn-sm btn-flat" onclick="return confirm('Anda Yakin untuk keluar dari sistem?')"><span class="fa fa-sign-out"></span> Sign out</a>
						</div>
					  </li>
					</ul>
				  </li>
				</ul>
			  </div><!-- /.navbar-custom-menu -->
		  </div><!-- /.container-fluid -->
		</nav>
	  </header>
	  <!-- Full Width Column -->
	  <div class="content-wrapper">
		<div class="container">
		  <!-- Content Header (Page header) -->
		  <section class="content-header">
			<h1 class="animated fadeInDown">
				<span class="<?php if(isset($icon)) echo $icon; ?>"></span>
			  <?php if(isset($title)) echo $title; ?>			  
			</h1>
			<ol class="breadcrumb">
			  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			  <li class="active"><?php if(isset($title)) echo $title; ?></li>
			</ol>
		  </section>

		  <!-- Main content -->
		  <section class="content">
			<?php $this->load->view($content); ?>
		  </section><!-- /.content -->
		</div><!-- /.container -->
	  </div><!-- /.content-wrapper -->
	  <footer class="main-footer">
		<div class="container">
		  <div class="pull-right hidden-xs">
			<b>Versi</b> Beta 1.0
		  </div>
		  <div class="animated fadeInUp">Copyright &copy; 2015-2016 <a href=""><span class="fa fa-medkit"></span> Akademi Keperawatan Pamenang - Pare</a>. All rights reserved.</div>
		</div><!-- /.container -->
	  </footer>
	</div><!-- ./wrapper -->

	<script src="<?php echo base_url(); ?>assets2/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
	<!-- Bootstrap -->
	<script src="<?php echo base_url(); ?>assets2/js/bootstrap.min.js" type="text/javascript"></script>
	 <script src="<?php echo base_url(); ?>assets/bootstrap/js/custom.js" type="text/javascript"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url(); ?>assets2/js/AdminLTE/app.js" type="text/javascript"></script>
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

			$(function() {
				$("#example1").dataTable();

			});

	</script>

  </body>
</html>