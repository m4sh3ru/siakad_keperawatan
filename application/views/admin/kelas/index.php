<div class="row-fluid">
	<!-- NOTIFICATION -->
	<?php echo $this->session->flashdata('notif'); ?>
	<!-- END NOTIFICATION -->
	<div class="panel panel-default">
		<div class="panel-heading">
		<div class="btn-group">
		  	<?php echo anchor('admin/kelas/add_kelas', '<button class="btn btn-sm btn-success"><span class="fa fa-plus-circle"></span> Tambahkan Kelas</button>'); ?>
		</div>

		</div>
		<div class="panel-body">

				<div class="boxbody table-responsive"> 

					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Kelas</th>
								<th>Prodi</th>
								<th>Tahun Masuk</th>
								<th>Option</th>
							</tr>	
						</thead>

						<tbody>
							<?php $no=1;
								foreach ($get_kelas as $result) : ?>
								<tr>
									<td> <?php echo $no++; ?></td>

									<td> <?php echo $result['nama_kelas']; ?></td>
									<td> <?php echo $result['nama_prodi']; ?></td>
									<td> <?php echo $result['tahun_ajaran']; ?></td>
									<td align="center">
										<?php echo anchor('admin/kelas/edit_kelas/'.$result['id'],'<i class="fa fa-edit" title="Edit Dosen" rel="tooltip"></i>') ?> | 
										<a href="<?php echo site_url('admin/kelas/del_kelas/'.$result['id']) ?>"
											onclick="return confirm('Anda yakin untuk menghapus data kelas ini?')"><i class="fa fa-times text-danger" title="Delete Dosen" rel="tooltip"></i>	
										</a>

									</td>
								</tr>
							<?php endforeach; ?>		
						</tbody>	

					</table>
				</div>
							 

		</div>
	</div>
</div>

<script type="text/javascript">
			$(function() {
				$("#example1").dataTable();
				$('#example2').dataTable({
					"bPaginate": true,
					"bLengthChange": false,
					"bFilter": false,
					"bSort": true,
					"bInfo": true,
					"bAutoWidth": false
				});
			});
		</script>