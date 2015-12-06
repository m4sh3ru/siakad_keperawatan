<div class="row-fluid">
	<!-- NOTIFICATION -->
	<?php echo $this->session->flashdata('notif'); ?>
	<!-- END NOTIFICATION -->
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo anchor('admin/account/add', '<button class="btn btn-sm btn-success"><span class="fa fa-plus-circle"></span> Tambahkan Pengguna Baru</button>'); ?>
			</div>
			<div class="panel-body">

					<div class="boxbody table-responsive"> 

						<table id="example2" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Username</th>
							<th>Password</th>
							<th>Level</th>
							<th>Last Login</th>
							<th class="text-center">Status</th>
							<th>Option</th>
						</tr>	
					</thead>

					<tbody>
						<?php $no=1;
							foreach ($user as $rs) : ?>
							<tr>
								<td> <?php echo $no++; ?></td>

								<td> <?= $rs['username']; ?></td>
								<td> <?= $rs['password']; ?></td>	
								<td> <?= $rs['ref_level_id']; ?></td>
								<td><?= $rs['last_login']; ?></td>
								<td><?= $rs['status']; ?></td>
								<td align="center">
									<a href="#" data-toggle="modal" data-target="#showPass" title="Lihat Password Pengguna"><span class="fa fa-search-plus"></span></a> |
									<?php echo anchor('admin/account/edit/'.$rs['id'],'<i class="glyphicon glyphicon-edit" title="Edit Angkatan" rel="tooltip"></i>') ?> |
									<a href="<?php echo site_url('admin/account/del/'.$rs['id']) ?>"
									onclick="return confirm('Apakah anda yakin menghapus akun pengguna ini?')"><i class="glyphicon glyphicon-trash text-danger" title="Delete Tahun Angkatan" rel="tooltip"></i></a>
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
