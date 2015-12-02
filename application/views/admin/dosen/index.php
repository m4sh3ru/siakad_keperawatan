<div class="row-fluid">
	<!-- NOTIFICATION -->
	<?php echo $this->session->flashdata('notif'); ?>
	<!-- END NOTIFICATION -->
	<div class="panel panel-default">
		<div class="panel-heading">
		<div class="btn-group">
		  	<?php echo anchor('admin/dosen/add_dosen', '<button class="btn btn-sm btn-success"><span class="fa fa-plus-circle"></span> Tambahkan Dosen Baru</button>'); ?>
		</div>

		</div>
		<div class="panel-body">

				<div class="boxbody table-responsive"> 

					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Lengkap</th>
								<th>NIDN/NIP</th>
								<th>Jenis Kelamin</th>
								<th>Alamat</th>
								<th>No Telp</th>
								<th>Option</th>
							</tr>	
						</thead>

						<tbody>
							<?php $no=1;
								foreach ($get_dosen as $result) : ?>
								<tr>
									<td> <?php echo $no++; ?></td>

									<td> <?php echo $result['nama_lengkap']; ?></td>
									<td> <?php echo $result['nidn']; ?></td>
									<td> 
										<?php 
											if($result['jenis_kelamin']==1){
												echo 'Laki-Laki';
											}else{
												echo 'Perempuan';
											}
										 ?>
									</td>
									<td> <?php echo $result['alamat']; ?></td>
									<td> <?php echo $result['no_telp']; ?></td>
									<td align="center">
										<?php echo anchor('admin/dosen/edit_dosen/'.$result['id'],'<i class="fa fa-edit" title="Edit Dosen" rel="tooltip"></i>') ?> | 
										<a href="<?php echo site_url('admin/dosen/del_dosen/'.$result['id']) ?>"
											onclick="return confirm('Delete dosen')"><i class="fa fa-times text-danger" title="Delete Dosen" rel="tooltip"></i>	
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