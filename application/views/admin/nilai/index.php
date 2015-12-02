<div class="row-fluid">
	<!-- NOTIFICATION -->
	<?php echo $this->session->flashdata('notif'); ?>
	<!-- END NOTIFICATION -->
	<div class="col-md-8">
		<div class="box box-danger">
			<div class="panel-heading">
				<h4><span class="fa fa-filter"></span> Filter Nilai Mahasiswa:</h4>
			</div>
			<hr style="margin:0 auto;">
			<div class="panel-body">
								 
				
				<?php echo form_open('admin/nilai/filter'); ?>			
				<div class="modal-body">
					<div class="form-group">
						<label for="">Nama Mahasiswa :</label>
						<div class="input-group col-md-6">
							<select id="basic" name="mahasiswa" class="selectpicker show-tick form-control" data-live-search="true" required>
								<option value="">Pilih Nama Mahasiswa :</option>
								<?php foreach($mahasiswa as $rs): ?>
								<option value="<?php echo $rs['id']; ?>"><?php echo $rs['nama_lengkap']; ?> [<?php echo $rs['nim']; ?>]</option>
								<?php endforeach; ?>
							 </select>
						</div>
					</div>
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
					<div class="form-group">
	                    <label>Semester</label>
	                    <div class="input-group col-sm-5">
		                    <select name="semester" class="form-control" id="semester" placeholder="Semester" required>
		                        <option value="">Pilih Semester :</option>
		                        <?php foreach($semester as $show): ?>
		                            <option value="<?php echo $show['id'] ?>"><?php echo ucwords($show['semester']); ?></option>
		                        <?php endforeach; ?>    
		                    </select>
		                </div>
	                </div>
	                <div class="form-group">
						<label>Kelas</label>
						<div class="input-group col-sm-5">
							<select name="kelas" id="" class="form-control" >
								<option value="">Pilih Kelas Mahasiswa :</option>
								<?php foreach($kelas as $rs): ?>
								<option value="<?php echo $rs['id']; ?>"><?php echo $rs['nama_kelas']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success btn-sm"><span class="fa fa-filter"></span> Filter Now</button>
				</div>
				<?php echo form_close(); ?>

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