<div class="row-fluid">
	<!-- NOTIFICATION -->
	<?php echo $this->session->flashdata('notif'); ?>
	<!-- END NOTIFICATION -->
	<div class="panel panel-default">
		<div class="panel-heading">		
		<?php echo anchor('admin/mahasiswa/add_mahasiswa', '<button class="btn btn-sm btn-flat btn-success"><span class="fa fa-plus-circle"></span> Tambahkan Mahasiswa</button>'); ?>
		<a href="#" class="btn btn-sm btn-flat btn-info" data-toggle="modal" data-target="#myModal"><span class="fa fa-file-excel-o"></span> Import Excel</a>
		<?php $this->load->view('admin/mahasiswa/import_excel'); ?>

		</div>
		<div class="panel-body">

				<div class="boxbody table-responsive"> 

					<table id="example1" class="table table-bordered table-hover">
						<thead>
							<tr class="well">
								<th>No</th>
								<th>NIM</th>
								<th>Nama Mahasiswa</th>
								<th>Periode</th>
								<th>Tempat Lahir</th>
								<th>Tanggal Lahir</th>
								<th>Prodi</th>
								<th>Agama</th>
								<th>No Telp</th>
								<th>Option</th>
							</tr>	
						</thead>
						<tbody>
							<?php $no=1;
								foreach ($get_mahasiswa as $result) : ?>
								<tr>
									<td> <?php echo $no; ?></td>

									<td> <?php echo $result['nim']; ?></td>
									<td> <?php echo ucwords($result['nama_lengkap']); ?></td>
									<td> <?php echo $result['tahun_ajaran']; ?></td>
									<td> <?php echo $result['tempat_lahir']; ?></td>
									<td> <?php echo $result['tgl_lahir']; ?></td>
									<td> <?php echo $result['nama_prodi']; ?></td>
									<td> <?php echo ucwords($result['nama_agama']); ?></td>
									<td> <?php echo $result['hp']; ?></td>
									<td align="center">
										<?php echo anchor('admin/mahasiswa/edit_mahasiswa/'.$result['id'],'<i class="glyphicon glyphicon-edit" title="Edit Mahasiswa" rel="tooltip"></i>') ?> |
										<a href="<?php echo site_url('admin/mahasiswa/del_mahasiswa/'.$result['id']) ?>"
										onclick="return confirm('Delete Mahasiswa')"><i class="glyphicon glyphicon-trash text-danger" title="Delete Mahasiswa" rel="tooltip"></i></a>
									
									</td>
								</tr>
								<?php $no++; ?>
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