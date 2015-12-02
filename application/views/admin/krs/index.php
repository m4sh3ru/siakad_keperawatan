<div class="row-fluid">
	<!-- NOTIFICATION -->
	<?php echo $this->session->flashdata('notif'); ?>
	<!-- END NOTIFICATION -->
	<div class="col-md-12">
		<div class="box box-danger">		
			
			<div class="panel-body">
				<div class="alert alert-danger">
					<h4>Perhatian:</h4>
					<ul>
						<li>Penyusunan KRS Mahasiwa pastikan telah sesuai dengan ketentuan yang telah di sahkan  oleh universitas.</li>
						<li>Pastikan KRS telah sesuai dengan ketentuan karena akan mempengaruhi nilai mata kuliah siswa.</li>
					</ul>
				</div>						 
			</div>
			
		</div>
	</div>

	<div class="col-md-8">
		<div class="box box-info">		
			<div class="panel-body">

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
					<button type="submit" class="btn btn-info btn-flat btn-sm"><span class="fa fa-filter"></span> Proses Filter Pencarian</button>
				</div>
				<?php echo form_close(); ?>							 

			</div>
		</div>
	</div>
</div>