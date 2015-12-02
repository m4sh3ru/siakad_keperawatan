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
					<?php foreach($prodi_by_id as $pr): ?>
						<input type="text" class="form-control" value="<?php echo $pr['nama_prodi']; ?>" disabled>
					<?php endforeach; ?>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="box box-danger">
		<div class="panel-heading">
			<a href="#" data-toggle="modal" data-target="#Matkul" class="btn btn-success btn-sm"><span class="fa fa-plus-circle"></span> Tambahkan KRS</a>
			<?php $this->load->view('admin/krs/list_matkul'); ?>
			<div class="btn-group pull-right" role="group" aria-label="...">
			  <button id="openall" type="button" class="btn btn-sm btn-primary"><span class="fa fa-eye"></span> View All</button>
			  <button id="closeall" type="button" class="btn btn-sm btn-default"><span class="fa fa-times-circle-o"></span> Close All</button>
			</div>
		</div>		
		<div class="panel-body">
			<div class="col-md-12">
				<div class="boxbody table-responsive"> 
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					
					<?php $total2 = 0; ?>
					<?php if($semester != NULL): ?>
						<?php foreach($semester as $s): ?>

						  <div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingOne">
							  <h5>
								<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $s['id'] ?>" aria-expanded="true" aria-controls="collapseOne">
								  <?php echo strtoupper($s['semester']); ?>
								</a>
							  </h5>
							</div>
							<div id="collapse<?php echo $s['id'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
							  <div class="panel-body">
								<div class="col-md-8">
									<table class="table table-bordered table-hover">
										<thead>
											<tr class="well">
												<th class="text-center">No</th>
												<th>Nama Mata Kuliah</th>
												<th class="text-center">SKS</th>
											</tr>
										</thead>
										<tbody>
										<?php $no=1; ?>
										<?php $total = 0; ?>
										<?php $total2 = 0; ?>
										<?php foreach($krs as $k): ?>
											
											<?php if($k['semester']==$s['id']): ?>
												
												<tr>
													<td class="text-center"><?php echo $no; ?></td>
													<td><?php echo $k['nama_matkul'] ?></td>
													<td class="text-center"><?php echo $k['sks'] ?></td>
												</tr>
												<?php $total = $total+$k['sks']; ?>
												<?php $no++; ?>
											<?php endif; ?>
											<?php $total2 = $total2+$k['sks']; ?>
										<?php endforeach; ?>
											<tr>
												<td colspan="2" class="text-center"><strong>Total SKS</strong></td>
												<td class="text-center"><strong><?php echo $total; ?></strong></td>
											</tr>
										</tbody>
									</table>
								</div>
							  </div>
							</div>
						  </div>
						  	
						<?php endforeach; ?>
					<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php if($total2 != NULL): ?>
		<div class="panel-footer">
			<div class="row">
				<div class="col-md-12">
					
					<strong class="pull-right"><i>Total Seluruh SKS : <?php echo $total2; ?></i></strong>
					
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>
</div>

<script type="text/javascript">
	$(function() {
		$('#closeall').click(function(){
		  $('.panel-collapse.in')
			.collapse('hide');
		});
		$('#openall').click(function(){
		  $('.panel-collapse:not(".in")')
			.collapse('show');
		});
	});
</script>