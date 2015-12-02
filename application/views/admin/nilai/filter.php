<!-- Modal -->
<div class="modal fade" id="Nilai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"><span class="fa fa-filter"></span> Saring Data Mahasiswa:</h4>
			</div>
			<?php echo form_open('admin/krs/filter_prodi'); ?>
			<div class="modal-body">
				<div class="form-group">
					<label for="">Program Studi/Jurusan:</label>
					<div class="input-group col-sm-8">
						<select name="prodi" id="" class="form-control" required>
							<option value="">Pilih Prodi/Jurusan :</option>
							<?php foreach($prodi as $rs): ?>
							<option value="<?php echo $rs['id']; ?>"><?php echo $rs['nama_prodi']; ?></option>
							<?php endforeach; ?>
						 </select>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm pull-left" data-dismiss="modal"><span class="fa fa-long-arrow-left"></span> Back to Previouse Page</button>
				<button type="submit" class="btn btn-success btn-sm"><span class="fa fa-filter"></span> Filter Now</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>