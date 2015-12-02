<!-- Modal -->
<div class="modal fade" id="Matkul" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"><span class="fa fa-plus"></span> Menambahan Matkul ke KRS Mahasiswa</h4>
			</div>
			<?php echo form_open('admin/krs/insert_krs'); ?>
			<input type="hidden" name="prodi" value="<?php echo $this->uri->segment(4); ?>">
			<div class="modal-body">
				<table id="example1" class="table table-bordered table-hover">
						<thead>
							<tr class="well">
								<th class="text-center"><span class="fa fa-check-square-o"></span></th>
								<th>Kode Matkul</th>
								<th>Nama Matkul</th>
								<th>Jumlah SKS</th>
							</tr>	
						</thead>
						<tbody>
							<?php $no=1;
								foreach ($matkul as $result) :?>
								<tr>
									<td class="text-center"> <input type="checkbox" name="matkul[]" value="<?php echo $result['id']; ?>" ></td>
									<td> <?php echo $result['kode_matkul']; ?></td>
									<td> <?php echo ucwords($result['nama_matkul']); ?></td>
									<td> <?php echo $result['sks']; ?></td>
								</tr>
							<?php $no++; ?>
							<?php endforeach; ?>		
						</tbody>	
					</table>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm pull-left" data-dismiss="modal"><span class="fa fa-long-arrow-left"></span> Back to Previouse Page</button>
				<button type="submit" class="btn btn-success btn-sm"><span class="fa fa-refresh"></span> Simpan ke KHS</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function() {
		$("#example1").dataTable();
	});
</script>