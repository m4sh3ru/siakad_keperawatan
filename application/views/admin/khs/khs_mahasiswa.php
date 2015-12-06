<div class="row-fluid">
	<!-- NOTIFICATION -->
	<?php echo $this->session->flashdata('notif'); ?>
	<!-- END NOTIFICATION -->
	<div class="box box-danger">
		<div class="box-body">
			<form class="form-horizontal">
				<div class="alert alert-info">
					<h4><span class="fa fa-exclamation-triangle"></span> Perhatian:</h4>
					<p><span class="fa fa-angle-double-right"></span> Kartu Hasil Studi ini dibuat berdasarkan data nilai dan Mata Kuliah yang telah masuk ke sistem.</p>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Nama Mahasiswa :</label>
					<div class="col-sm-5">
						<?php foreach($mahasiswa as $mh): ?>
							<input type="text" class="form-control" value="<?php echo $mh['nama_lengkap']; ?>" disabled>
						<?php endforeach; ?>
					</div>
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
		<div class="box-header with-border">
			<div class="col-md-12">
				<a href="<?php echo base_url('admin/khs/kartu_hasil_studi'); ?>" target="_blank" class="btn btn-sm btn-default btn-flat pull-right"><span class="fa fa-print"></span> Cetak KHS</a>
			</div>
		</div>		
		<div class="box-body">
			
			<div class="row">
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
				  		<?php $t_sms = 1; $sms=0; ?>
						<?php $sks = 0; ?>
						<?php $total = 0; ?>
				  		<?php foreach($khs as $rs): ?>
							<tr>
							  	<th class="text-center"><?php echo $no; ?></th>
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
						<?php $no++; ?>
						
						<?php endforeach; ?>
					  	</tbody>
					</table>
				</div>
			</div>
			

			<div class="row">
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
								<th><i><?php if($total != NULL) echo number_format($total/$sks, 2, ',', ''); ?></i></th>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
