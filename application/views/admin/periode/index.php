<div class="row-fluid">
	<!-- NOTIFICATION -->
	<?php echo $this->session->flashdata('notif'); ?>
	<!-- END NOTIFICATION -->
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo anchor('admin/tahun_ajaran/add_periode', '<button class="btn btn-sm btn-success"><span class="fa fa-plus-circle"></span> Tambahkan Tahun Ajaran</button>'); ?>
			</div>
			<div class="panel-body">

					<div class="boxbody table-responsive"> 

						<table id="example2" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Tahun Angkatan</th>
							<th>Option</th>
						</tr>	
					</thead>

					<tbody>
						<?php $no=1;
							foreach ($get_periode as $result) : ?>
							<tr>
								<td> <?php echo $no++; ?></td>

								<td> <?= $result['tahun_ajaran']; ?></td>
								<td align="center">
									<?php echo anchor('admin/tahun_ajaran/edit_periode/'.$result['id'],'<i class="glyphicon glyphicon-edit" title="Edit Angkatan" rel="tooltip"></i>') ?> |
									<a href="<?php echo site_url('admin/tahun_ajaran/del_periode/'.$result['id']) ?>"
									onclick="return confirm('Delete Tahun Angkatan')"><i class="glyphicon glyphicon-trash text-danger" title="Delete Tahun Angkatan" rel="tooltip"></i></a>
								</td>
							</tr>
						<?php endforeach; ?>		
					</tbody>	

				</table>
					</div>
								 

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