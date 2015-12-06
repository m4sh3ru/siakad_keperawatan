<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title> SIAKAD Akademi Keperawatan Pamenang - PARE </title>
	
	<link href="<?php echo base_url(); ?>assets2/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/animate/a.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/build/main-23f868cb01.css">
	 <script src="/build/js/main-e0c85cff00.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
  	<link href="<?php echo base_url(); ?>assets2/css/font-awesome.css" rel="stylesheet" type="text/css" />
  	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.jpg">
	<style type="text/css">
		.navbar-default .nav > li > a:focus, .navbar-default .nav > li > a:hover {
		    color: #EDF1F2 !important;
		    background: #116B67 none repeat scroll 0% 0%  !important;
		}
	</style>
  	</head>
  	<body>

	<nav class="navbar navbar-default">
		  <div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="/">
				<i class="fa fa-bank"></i> Sistem Informasi Akademik - Akper PAMENANG
			  </a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


			  <ul class="nav navbar-nav navbar-right">
				 
					<li >
		  <a href="<?php echo base_url('auth/login'); ?>">
			<i class="fa fa-lock"></i> Login
		  </a>
		</li>


		<!-- <li  >
			<a href="<?php echo base_url('') ?>">
			  <i class="fa fa-user"></i> Register
			</a>
		</li> -->
	</nav>
	<div class="container animated fadeIn">
		
		<div class="text-center">
			<h1 class="animated fadeInDown">
				<span style='font-size:70px;'>
					<i class="fa fa-desktop"></i>
					<i class="fa fa-mortar-board"></i>
					<i class="fa fa-cubes"></i> 
					<i class="fa fa-database"></i>
				</span>

			</h1>
			<h1 class="landing_text_utama animated fadeInLeft">
			 Sistem Informasi Akademik</h1>

			<h1 class="landing_text_second animated fadeInRight">
			 " Akademi Keperawatan Pamenang "</h1>

			<p class="animated fadeInUp">
				  The effectiveness dan efficients way to share an information of university with others.
			</p>

		</div>

	</div>

<!-- Footer -->
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<p class="copyright text-muted small">Copyright &copy; 2015. All Rights Reserved</p>
				</div>
			</div>
		</div>
	</footer>
	<!-- jQuery UI 1.10.3 -->
    <script src="<?php echo base_url(); ?>assets2/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>assets2/js/bootstrap.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		 $(document).bind('contextmenu', function (e) {
              e.preventDefault();
              alert('Klik Kanan Tidak diijinkan!');
            });
	</script>

  </body>
</html>
