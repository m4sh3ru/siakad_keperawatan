<div class="row-fluid">
	<!-- NOTIFICATION -->
	<?php echo $this->session->flashdata('notif'); ?>
	<!-- END NOTIFICATION -->
	<div class="box box-danger">
		<div class="box-body">
			<form class="form-horizontal">
				<div class="alert alert-info">
					<h4><span class="fa fa-exclamation-triangle"></span> Perhatian:</h4>
					<p><span class="fa fa-angle-double-right"></span> Dalam menentukan Kartu Rencana Studi (KRS) Pastikan benar-benar sesuai. Hal ini akan berpengaruh terhadap validasi data mahasiswa.</p>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Prodi/Jurusan :</label>
					<div class="col-sm-5">
					<?php foreach($prodi as $pr): ?>
						<input type="text" class="form-control" value="<?php echo $pr['nama_prodi']; ?>" disabled>
					<?php endforeach; ?>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="box box-danger">
		<div class="panel-heading">
			
		</div>		
		<div class="panel-body">
			<div class="col-md-12">
				<table class="table table-bordered table-hover table-responsive">
				  	<thead>
						<tr class="well">
						  	<th class="text-center">#</th>
						  	<th>Semester</th>
						  	<th>Nama Mata Kuliah</th>
						  	<th class="text-center">Sks</th>
						  	<th class="text-center">Index</th>
						</tr>
				  	</thead>
				  	<tbody>
			  		<?php $no=1; ?>
			  		<?php $t_sms = 1; ?>
					<?php $sks = 0; ?>
					<?php $total = 0; ?>
			  		<?php foreach($khs as $rs): ?>
						<tr>
						  	<th class="text-center"><?php echo $no; ?></th>
						  	<?php if(($rs['semester'])&&($this->mod_khs->t_sms($rs['id_sms'])>1)):?>
							<?php if($t_sms==1):?>
						  	<td style="vertical-align: middle;" rowspan="<?php echo $this->mod_khs->t_sms($rs['id_sms']); ?>">
					  			<?php echo $rs['semester']; ?>
						  	</td>
						  	<?php endif; ?>
						  	<?php $t_sms++; ?>
						  	<?php else: ?>
					  		<td>
					  			<?php echo ucwords($rs['semester']; ?>
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
					  				 foreach($index as $i){
					  				 	if(($r['nilai'] >= $i['min']) && ($r['nilai'] <= $i['max'])){
					  				 		echo strtoupper($i['grade']);
					  				 		$val = $rs['sks']*$i['value'];
					  				 		$total = $total+$val;
					  				 	}
					  				 }
					  			}
					  		?>
						  	</td>
						</tr>
					<?php $no++; ?>
					
					<?php endforeach; ?>
				  	</tbody>
				</table>
			</div>

			<div class="col-md-12">
				<div class="col-md-4">
					<table class="table">
						<tr>
							<th><i>Total Seluruh SKS</i></th>
							<th>:</th>
							<th><i><?php echo $sks; ?></i></th>
						</tr>
						<tr>
							<th><i>Index Prestasi</i></th>
							<th>:</th>
							<th><i><?php echo number_format($total/$sks, 2, ',', ''); ?></i></th>
						</tr>
					</table>
				</div>
			</div>
		</div>
		
	</div>
</div>
