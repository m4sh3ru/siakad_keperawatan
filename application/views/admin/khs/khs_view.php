<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Siakad AKPER PAMENANG | Kartu Hasil Studi</title>
		<link media="print" rel="Alternate" href="print.pdf">
		<link href="./public/assets2/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<style type="text/css" >
			@page {
				size: 8.2in 11.7in;
				margin: 0.5cm;
				@frame footer {
					-pdf-frame-content: footerContent;
					bottom: 0;
					margin-left: 1cm;
					margin-right: 1cm;
					height: 1cm;
				}
			}
			html, body {
				color: #656d78;
				font-family: "Open Sans",sans-serif;
				font-size: 12px
			}
			table {
				border-collapse: collapse;
				border-spacing: 0;
			}
			.text-center {
				text-align: center;
			}
			.table {
				margin-bottom: 20px;
				max-width: 100%;
				width: 100%;
			}
			.libur, .table-striped > tbody > tr:nth-child(2n+1) > td.libur, .table-striped > tbody > tr:nth-child(2n+1) > th.libur {
				background-color: #ccc !important;
			}
			.table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {
				background: #f8fafc;
			}
			.table > thead > tr > th {
				color: #333;
				font-size: 12px;
				height:20px;
			}
			.table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > thead > tr > th {
				border: 1px solid #000;
				height:15px;
			}
			.table-condensed > tbody > tr > td, .table-condensed > tbody > tr > th, .table-condensed > tfoot > tr > td, .table-condensed > tfoot > tr > th, .table-condensed > thead > tr > td, .table-condensed > thead > tr > th {
				padding: 3px;
			}
			thead th, tfoot td {
				/* background-color: #e1e1e1 !important; */
				border-bottom-width: 1px !important;
				border-top: 1px solid #000 !important;
				color: #666 !important;
				font-size: 12px !important;
				font-weight: bold !important;
				line-height: 1.42857 !important;
				padding: 4px !important;
				text-align: center !important;
				vertical-align: middle !important;
			}
			html * {
				outline: medium none !important;
			}
			th {
				text-align: left;
			}
			a{
				text-decoration: none;
				color: #666;
			}
			.table-responsive {
				border: 0 none;
			}
			.table-responsive {
				min-height: 0.01%;
				overflow-x: auto;
			}
			h1,h2,h3,h4,h5,h6 {
			  margin: 10px 0;
			  font-family: inherit;
				
			  color: inherit;
			  text-rendering: optimizelegibility;
			  text-align: center;
			}
			h2 {
			  font-size: 30px;
			}

			h3 {
			  font-size: 24px;
			}

			h4 {
			  font-size: 18px;
			}

			h5 {
			  font-size: 14px;
			}
			#ttd-space{
				margin-top:50px !important;
				vertical-align: bottom;
			}
			#tb-ttd{
				width: 460px !important;
				margin-left: 280px !important;
			}
			#hr{
				margin:0px auto !important;
			}
			td{
				padding:4px !important;
			}
		</style>
	</head>
	<body>
		<h5 class="text-center"  style="margin:0px auto;">KARTU HASIL STUDI</h5>
		<table>
			<tr>
				<td><img src="<?php echo base_url()?>assets/images/logo.jpg" width="100"></td>
				<td>
					<h4>AKADEMI KEPERAWATAN</h4>
					<h3>"PAMENANG"</h3>
					<p style="margin:0px auto;" class="text-center">Sekretariat : Jln. Soekarno Hatta No.15 - Pare, Telp/Fax:(0354) 399840</p>
					<p style="margin:0px auto;" class="text-center">Bendo - Pare - Kab. Kidiri</p>
				</td>
			</tr>
			<tr>
				<td colspan="2"><hr style="margin:0px auto;"></td>
			</tr>
			<tr>
				<td colspan="2">Berikut ini adalah data Kartu Hasil Studi dari mahasiswa berikut:</td>
			</tr>
			<tr>
				<td colspan="2">
					<table class="table">
						<tr>
							<td width="90">Nama Lengkap</td>
							<td width="20">:</td>
							<td>
								<?php foreach($mahasiswa as $mh): ?>
									<?php echo $mh['nama_lengkap'];?>
								<?php endforeach; ?>
							</td>
						</tr>
						<tr>
							<td width="90">Tempat/Tgl. Lahir</td>
							<td width="20">:</td>
							<td>
								<?php foreach($mahasiswa as $mh): ?>
									<?php echo ucwords($mh['tempat_lahir']).', '.Konversi::formatTanggal($mh['tgl_lahir']);  ?>
								<?php endforeach; ?>
							</td>
						</tr>
						<tr>
							<td width="90">Prodi</td>
							<td width="20">:</td>
							<td>
								<?php foreach($prodi as $pr): ?>
									<?php echo $pr['nama_prodi']; ?>
								<?php endforeach; ?>
							</td>
						</tr>
						<tr>
							<td width="90">Tahun Masuk</td>
							<td width="20">:</td>
							<td>2010/2011</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr style="margin:0px auto;">
				<td colspan="2">
					<table class="table table-bordered" >
						<thead>
							<tr>
								<th>No.</th>
								<th>Semester</th>
								<th>Mata Kuliah</th>
								<th>SKS</th>
								<th>Index</th>
							</tr>
						</thead>
						<tbody>
							<!-- <tr>
								<td width="90">Nama Lengkap</td>
								<td width="20">:</td>
								<td>Heru Setyiawan</td>
								<td></td>
								<td></td>
							</tr> -->
							<?php $no=1; ?>
				  		<?php $t_sms = 1;$sms=0; ?>
						<?php $sks = 0; ?>
						<?php $total = 0; ?>
				  		<?php foreach($khs as $rs): ?>
							<tr>
								<td class="text-center"><?php echo $no; ?></td>
								<?php
					  			if($this->mod_khs->t_sms($rs['id_sms'])>1):
									if(($sms==0) or ($sms != $rs['id_sms'])): ?>
										<td style="vertical-align: middle;" rowspan="<?php echo $this->mod_khs->t_sms($rs['id_sms']); ?>">
								  			<?php echo ucwords($rs['semester']); ?>
									  	</td>
					  				<?php $sms = $rs['id_sms']; ?>
					  				<?php endif; ?>
						  		<?php else: ?>
						  			<td>
						  				<?php echo ucwords($rs['semester']); ?>
						  			</td>
						  		<?php endif; ?>

							  	<td><?php echo $rs['nama_matkul']; ?></td>
							  	<td class="text-center">
							  		<?php echo $rs['sks']; ?>
							  		<?php $sks = $sks+$rs['sks']; ?>
							  	</td>
							  	<td class="text-center">
						  		<?php $nilai = $this->mod_khs->get_nilai($this->session->userdata('prodi'),$this->session->userdata('mahasiswa'), $rs['id_matkul']); 

						  			foreach($nilai as $r){
						  				$this->db->where('value', $r['nilai']);
										$sql = $this->db->get('ref_grade')->result_array(); 
						  				 	foreach($sql as $n){
						  				 		echo strtoupper($n['grade']);
						  				 		$val = $rs['sks']*$n['value'];
						  				 		$total = $total+$val;
						  				 	}
						  			}
						  		?>
							  	</td>
							</tr>
						<!-- <?php $no++; ?> -->
						
						<?php endforeach; ?>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					
					<div class="col-md-4">
						<table class="table col-md-8">
							<tr>
								<td><i>Total Seluruh SKS</i></td>
								<td>:</td>
								<td><i><?php echo $sks; ?></i></td>
							</tr>
							<tr>
								<td><i>Index Prestasi</i></td>
								<td>:</td>
								<td><i><?php if($total !=NULL) echo number_format($total/$sks, 2, ',', ''); ?></i></td>
							</tr>
						</table>
					</div>
						
				</td>
			</tr>
			<tr>
				<td></td>
				<td class="pull-right">
					<table class="table" id="tb-ttd">
						<tr>
							<td>Kediri, <?php echo date('d-F-Y'); ?></td>
						</tr>
						<tr>
							<td>
								Mengetahui,<br>
								Rektor Universitas Pamenang
							</td>
						</tr>
						<tr>
							<td id="ttd-space">
								<p id="hr">DRS.XXX</p>
								<hr>
								<p id="hr"><b>NIDN. </b></p>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		
		<div id="footerContent" style="text-align: center;">
			<pdf:pagenumber>
		</div>
	</body>
</html>

