<div class="row">
  <div class="col-lg-3 col-xs-6">
	<!-- small box -->
	<div class="small-box bg-aqua animated fadeInLeft">
	  <div class="inner">
		<h3><?php echo $t_mahasiswa; ?></h3>
		<p>Mahasiswa</p>
	  </div>
	  <div class="icon">
		<i class="fa fa-mortar-board"></i>
	  </div>
	  <a href="#" class="small-box-footer">
		Total Mahasiwa
	  </a>
	</div>
  </div><!-- ./col -->
  <div class="col-lg-3 col-xs-6">
	<!-- small box -->
	<div class="small-box bg-green animated fadeInLeft">
	  <div class="inner">
		<h3><?php echo $t_dosen; ?></h3>
		<p>Dosen</p>
	  </div>
	  <div class="icon">
		<i class="fa fa-puzzle-piece"></i>
	  </div>
	  <a href="#" class="small-box-footer">
		Total Pengajar/Dosen
	  </a>
	</div>
  </div><!-- ./col -->
  <div class="col-lg-3 col-xs-6">
	<!-- small box -->
	<div class="small-box bg-yellow animated fadeInRight">
	  <div class="inner">
		<h3><?php echo $t_user; ?></h3>
		<p>User Registered</p>
	  </div>
	  <div class="icon">
		<i class="fa fa-users"></i>
	  </div>
	  <a href="#" class="small-box-footer">
		Total Akun yang Teregistrasi
	  </a>
	</div>
  </div><!-- ./col -->
  <div class="col-lg-3 col-xs-6">
	<!-- small box -->
	<div class="small-box bg-red animated fadeInRight">
	  <div class="inner">
		<h3><?php echo date('H:m') ?></h3>
		<p><?php echo Konversi::formatTanggal(date('d-m-Y')); ?>
		</p>
	  </div>
	  <div class="icon">
		<i class="fa fa-calendar"></i>
	  </div>
	  <a href="#" class="small-box-footer">
		Tanggal dan Waktu Hari ini
	  </a>
	</div>
  </div><!-- ./col -->
</div>
<div class="row">
	<div class="col-md-12">
		<div class="box box-danger">
			<div class="box-header with-border">
				<div class="box-title">Sistem Akademik Universitas</div>
			</div>
			<div class="box-body">
				<p style="text-align:justify;">Akademi Keperawatan Pamenang atau disebut juga Akper Pamenang merupakan salah satu lembaga pendidikan tenaga kesehatan (keperawatan) yang dikelola oleh Pemerintah Kabupaten Kediri. Akper Pamenang Berdiri sejak tahun 2013, yang saat itu dikelola oleh Rumah Sakit Umum Kabupaten Kediri melalui Yayasan Dharma Wanita; dan karenanya pada awal pendirian Akper Pamenang, tenaga pengajar dan pengelola adalah para praktisi dan tenaga kesehatan yang berpengalaman karena hampir seluruh dosen dan pengelola adalah dokter dan perawat yang bekerja di RSUD Kabupaten Kediri. Kultur berbasis praktik serta orientasi terhadap pelayanan menjadi penciri yang terus bertumbuh dan berkembang seiring dengan perkembangan Akademi Keperawatan Pamenang.
				Berdasarkan pada dinamika dan regulasi yang berkembang, maka pada tahun 2010 pengelolaan Akper Pamenang diserahkan kepada Yayasan Dharma Wanita Kabupaten Kediri yang salah satu unitnya bergerak di bidang pendidikan. Dengan adanya pengalihan pengelolaan maka semakin terkelola pula manajemen dan kualitas penyelenggaraan pendidikan.</p>
			</div>
		</div>
		<div class="box box-danger">
			<div class="box-body">
				<img src="<?php echo base_url('assets/images/pamenang-map.png'); ?>" width="1040">
			</div>
		</div>
	</div>
</div>