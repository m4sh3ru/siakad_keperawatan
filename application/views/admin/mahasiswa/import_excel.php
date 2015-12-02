<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<div class="alert alert-info">				
					<ul>
						<li>File yang dapat di import adalah file yang berekstensi <code>.xls</code> dan <code>.xlsx</code></li>
						<li>Untuk dapat mengimport data dari excel ke sistem pastikan value <code>id</code>(kosongi value/nilainya),
							<code>nama_lengkap</code>, <code>tempat_lahir</code>, <code>ref_periode_id</code>, <code>tgl_lahir</code>,
							<code>jenis_kelamin</code> (1=L, 2=P), <code>ref_prodi_id</code>, <code>ref_agama_id</code>, <code>hp</code>,dan <code>alamat</code>
						</li>
					</ul>
				</div>
			</div>
			<?php echo form_open_multipart('admin/mahasiswa/import_file'); ?>
			<div class="modal-body">

				<div class="form-group">
					<label for="">Pilih File Excel:</label>
					<input type="file" name="userfile" required>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><span class="fa fa-long-arrow-left"></span> Batalkan</button>
				<button type="submit" class="btn btn-success btn-sm"><span class="fa fa-cloud-upload"></span> Import Data Excel</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>