<div class="row-fluid">
	<!-- NOTIFICATION -->
	<?php echo $this->session->flashdata('notif'); ?>
	<!-- END NOTIFICATION -->
	<div class="box box-danger">
		<div class="box-body">
			<form class="form-horizontal">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Nama Mahasiswa :</label>
					<div class="col-sm-5">
						<?php foreach($mahasiswa as $mh): ?>
							<input type="text" class="form-control" value="<?php echo $mh['nama_lengkap']; ?>" disabled>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Prodi/Jurusan :</label>
					<div class="col-sm-5">
					<?php foreach($prodi as $pr): ?>
						<input type="text" class="form-control" value="<?php echo $pr['nama_prodi']; ?>" disabled>
					<?php endforeach; ?>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Semester:</label>
					<div class="col-sm-5">
					<?php foreach($semester as $sm): ?>
						<input type="text" class="form-control" value="<?php echo $sm['semester']; ?>" disabled>
					<?php endforeach; ?>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Kelas:</label>
					<div class="col-sm-5">
					<?php foreach($kelas as $kl): ?>
						<input type="text" class="form-control" value="<?php echo $kl['nama_kelas']; ?>" disabled>
					<?php endforeach; ?>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="panel panel-default">
		
		<div class="panel-body">

				<div class="boxbody table-responsive"> 

					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Mata Kuliah</th>
								<th>sks</th>
								<th>Jumlah SKS</th>
								<!-- <th>Option</th> -->
							</tr>	
						</thead>

						<tbody>
							<?php $no=1; ?>
								
							
						</tbody>	

					</table>
				</div>
							 

		</div>
	</div>
</div>
