<style type="text/css">
	.table > thead > tr > th {
		    vertical-align: bottom !important;
		    border-bottom: none !important;
		}
	.table > thead > tr > td {
		    vertical-align: bottom !important;
		    border-bottom: none !important;
		}
</style>

<div class="box box-info">
  <div class="box-header with-border">
	<h3 class="box-title">
		
	</h3>
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
								<th><i><?php if($total !=NULL) echo number_format($total/$sks, 2, ',', ''); ?></i></th>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
</div><!-- /.box -->
