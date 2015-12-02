<div class="row-fluid">
	<!-- NOTIFICATION -->
	<?php echo $this->session->flashdata('notif'); ?>
	<!-- END NOTIFICATION -->
	<div class="panel panel-default">
		<div class="panel-heading">
		<div class="btn-group">
		  	<?php echo anchor('admin/nilai/add_grade', '<button class="btn btn-sm btn-success"><span class="fa fa-plus-circle"></span> Tambahkan Grade Baru</button>'); ?>
		</div>

		</div>
		<div class="panel-body">
			<div class="col-md-8">
				<div class="boxbody table-responsive"> 

					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Grade</th>
								<th>Nilai</th>
								<th>Option</th>
							</tr>	
						</thead>

						<tbody>
							<?php $no=1;
								foreach ($grade as $result) : ?>
								<tr>
									<td> <?php echo $no++; ?></td>

									<td> <?php echo $result['min'].'-'.$result['max']; ?></td>
									<td> <?php echo $result['grade']; ?></td>
									<td align="center">
										<?php echo anchor('admin/nilai/edit_grade/'.$result['id'],'<i class="fa fa-edit" title="Edit Dosen" rel="tooltip"></i>') ?> | 
										<a href="<?php echo site_url('admin/nilai/grade/del_grade/'.$result['id']) ?>"
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