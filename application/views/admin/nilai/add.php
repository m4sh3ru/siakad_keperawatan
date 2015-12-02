<!-- Modal -->
<div class="modal fade" id="AddNilai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"><span class="fa fa-filter"></span> Input Data Nilai Mahasiswa:</h4>
			</div>
			<?php echo form_open('admin/nilai/filter_matkul'); ?>
			<div class="modal-body">
				<div class="form-group">
					<label for="">Nama Mahasiswa:</label>
					<div class="input-group col-sm-8">
						<select id="basic" name="mahasiswa" class="selectpicker show-tick form-control" data-live-search="true" required>
							<option value="">Pilih nama mahasiswa :</option>
							<?php foreach($mahasiswa as $rs): ?>
							<option value="<?php echo $rs['id']; ?>"><?php echo $rs['nama_lengkap']; ?> [<?php echo $rs['nim']; ?>]</option>
							<?php endforeach; ?>
						 </select>
					</div>
				</div>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm pull-left" data-dismiss="modal"><span class="fa fa-long-arrow-left"></span> Back to Previouse Page</button>
				<button type="submit" class="btn btn-success btn-sm"><span class="fa fa-save"></span> Simpan Nilai</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>