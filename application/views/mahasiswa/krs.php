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
		<?php if(!isset($semester_by_id)): ?>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" title="Pilih Tingkat Semester"><span class="fa fa-cogs"></span></button>
			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-body">
			        <div class="row">
			        	<?php if(isset($semester)): ?>
				        	<div class="animated fadeInUp">
				        	<?php foreach($semester as $s): ?>
				        	<?php echo form_open('mahasiswa/kartu_rencana_studi/'.$s['id']); ?>
				        	<div class="col-md-2" style="margin: 0px 0px 20px 20px;">
				        		<button class="btn btn-sm btn-info"><span class="fa fa-check-circle-o"></span> <?php echo $s['semester']; ?></button>
				        	</div>
				        	<?php echo form_close(); ?>
				        	<?php endforeach; ?>
				        	</div>
				        <?php endif; ?>
			        </div>
			      </div>
			    </div>
			  </div>
			</div>
		<?php endif; ?>
	</h3>
  </div>
  <?php $total= 0;$sks = 0;  ?>
  <div class="panel-body">
		<div class="col-md-8">
			<table class="table table-bordered table-hover">
				<thead>
					<tr class="well">
						<th class="text-center">No</th>
						<th>Nama Mata Kuliah</th>
						<th class="text-center" width="70">Sks</th>
						<th class="text-center" width="70">Nilai</th>
						<th class="text-center">Index Nilai</th>
					</tr>	
				</thead>
				<tbody>
					<?php if(isset($krs)): ?>
						<?php if($krs != NULL): ?>
							<?php $no=1; ?>
							<?php foreach($krs as $rs): ?>
							<tr>
								<td class="text-center"><?php echo $no; ?></td>
								<td><?php echo $rs['nama_matkul'] ?></td>
								<td class="text-center">
									<?php 
										if(isset($rs['sks'])){
											$sks = $sks+$rs['sks'];
										}
										 echo $rs['sks'];
									?>
								</td>
								<td class="text-center">
									<?php
									$nilai = $this->mod_khs->get_nilai($this->session->userdata('prodi'),$this->session->userdata('mahasiswa'), $rs['id_matkul']);
									foreach($nilai as $r){
							  				echo $r['nilai'];
							  			}
									?>
								</td>
								<td class="text-center">
									<?php 
										
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
						<?php else: ?>
							<tr>
								<td colspan="4" class="text-center"><i>Data tidak ditemukan</i></td>
							</tr>
						<?php endif; ?>
					<?php else: ?>
						<tr>
							<td colspan="4" class="text-center"><i>Data tidak ditemukan</i></td>
						</tr>
					<?php endif; ?>
						<tr>
							<td class="text-center" colspan="2"><strong>Total SKS</strong></td>
							<td class="text-center"><strong><?php echo $sks;?></strong></td>
						</tr>
				</tbody>	
			</table>

		</div>
  </div><!-- /.box-body -->
  <div class="box-footer">
  	<p> <strong>Indek Prestasi Komulatif</strong> : <strong><?php if($total!=NULL) echo number_format($total/$sks, 2, ',', ''); ?></strong></p>
  </div>
</div><!-- /.box -->
