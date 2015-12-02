<div class="row-fluid">
	<!-- NOTIFICATION -->
	<?php echo $this->session->flashdata('notif'); ?>
	<!-- END NOTIFICATION -->
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php 
				if($sks <= 110){
				 	echo anchor('admin/matakuliah/add_matkul', '<button class="btn btn-sm btn-success"><span class="fa fa-plus-circle"></span> Tambahkan Mata Kuliah</button>');
				}
				?>
			</div>
			<div class="panel-body">

					<div class="boxbody table-responsive"> 

						<table id="example1" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">No</th>
									<th>Kode Matakuliah</th>
									<th>Nama Matakuliah</th>
									<th class="text-center">Semester</th>
									<th class="text-center">Jumlah SKS</th>
									<th class="text-center">Option</th>
								</tr>	
							</thead>

							<tbody>
								<?php $no=1;
									foreach ($get_matkul as $result) : ?>
									<tr>
										<td class="text-center"> <?php echo $no++; ?></td>

										<td> <?php echo $result['kode_matkul']; ?></td>
										<td> <?php echo $result['nama_matkul']; ?></td>
										<td class="text-center"> <?php echo $result['semester']; ?></td>
										<td class="text-center"> <?php echo $result['sks']; ?></td>
										<td align="center">
											<?php echo anchor('admin/matakuliah/edit_matkul/'.$result['id'],'<i class="glyphicon glyphicon-edit" title="Edit Matakuliah" rel="tooltip"></i>') ?> |
											<a href="<?php echo site_url('admin/matakuliah/del_matkul/'.$result['id']) ?>"
											onclick="return confirm('Anda Yakin untuk menghapus data mata kuliah ini?')"><i class="glyphicon glyphicon-trash text-danger" title="Delete Prodi" rel="tooltip"></i></a>
										</td>
									</tr>
								<?php endforeach; ?>
								
							</tbody>	

						</table>

					</div>
								 
			</div>
			<div class="panel-footer">
				<i><strong>Total : <?php if(isset($sks)) echo $sks; ?> SKS</strong></i>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function() {
		$("#example1").dataTable();
	});
</script>

