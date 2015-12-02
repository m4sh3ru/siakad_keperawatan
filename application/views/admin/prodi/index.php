<div class="row-fluid">
	<!-- NOTIFICATION -->
	<?php echo $this->session->flashdata('notif'); ?>
	<!-- END NOTIFICATION -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<?php echo anchor('admin/prodi/add_prodi', '<button class="btn btn-sm btn-success"><span class="fa fa-plus-circle"></span> Tambahakan Prodi Baru</button>'); ?>
		</div>
		<div class="panel-body">

				<div class="boxbody table-responsive"> 

					<table id="example2" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>No Izin</th>
								<th>Nama Prodi</th>
								<th>Nama Direktur</th>
								<th>Option</th>
							</tr>	
						</thead>

						<tbody>
							<?php $no=1;
								foreach ($get_prodi as $result) : ?>
								<tr>
									<td> <?php echo $no++; ?></td>

									<td> <?php echo $result['no_izin']; ?></td>
									<td> <?php echo $result['nama_prodi']; ?></td>
									<td> <?php echo $result['nama_lengkap']; ?></td>
									<td align="center">
										<?php echo anchor('admin/prodi/edit_prodi/'.$result['id'],'<i class="glyphicon glyphicon-edit" title="Edit Prodi" rel="tooltip"></i>') ?> |
										<a href="<?php echo site_url('admin/prodi/del_prodi/'.$result['id']) ?>"
										onclick="return confirm('Delete Prodi')"><i class="glyphicon glyphicon-trash text-danger" title="Delete Prodi" rel="tooltip"></i></a>
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