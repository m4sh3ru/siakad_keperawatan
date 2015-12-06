<?php
		$pr= $this->uri->segment(4);
		$sm = $this->uri->segment(5);
		$kl = $this->uri->segment(6);
?>
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
							<input type="text" class="form-control" value="<?php echo $mh['nama_lengkap'].' ['.$mh['nim'].']'; ?>" disabled>
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
				<!-- <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Kelas:</label>
					<div class="col-sm-5">
					<?php foreach($kelas as $kl): ?>
						<input type="text" class="form-control" value="<?php echo $kl['nama_kelas']; ?>" disabled>
					<?php endforeach; ?>
					</div>
				</div> -->
			</form>
		</div>
	</div>
	<div id="nt"></div>
	<div class="box box-success">
		
		<div class="panel-body">
			<div class="col-md-8">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th>Nama Matkul</th>
							<th clatextss="text-center">sks</th>
							<th></th>
							<!-- <th>Option</th> -->
						</tr>	
					</thead>

					<tbody>
						<?php $no=1;
							foreach ($get as $rs) : 
								$sql = $this->db->where('mst_mahasiswa_id',$this->session->userdata('mahasiswa'))
								->where('mst_matkul_id',$rs['id'])
						 		->where('ref_semester_id',$this->session->userdata('semester'))
						 		#->where('ref_kelas_id',$this->session->userdata('kelas'))
						 		->get('mst_nilai')
						 		->result_array();
						?>
						<tr>
							<td class="text-center"><?php echo $no; ?></td>
							<td><?php echo $rs['nama_matkul']; ?></td>
							<td class="text-center"><?php echo $rs['sks']; ?></td>
							<td class="text-center">
							<?php if($sql != NULL): ?>
								<?php foreach($sql as $n): ?>
									
										<input type="text" class="form-control" id="nilai<?php echo $rs['id']; ?>" <?php if($rs['id']==$n['mst_matkul_id']) {echo "value=".str_replace('.',',',$n['nilai']);} ?>>
									
								<?php endforeach; ?>

							<?php else: ?>
								<input type="text" class="form-control" id="nilai<?php echo $rs['id']; ?>">
							<?php endif; ?>
							
								<input type="hidden" class="form-control" id="mt<?php echo $rs['id']; ?>" value="<?php echo $rs['id']; ?>">
							</td>
							<td class="text-center">
								<button type="submit" id="save<?php echo $rs['id']; ?>" class="btn btn-sm btn-flat btn-primary"><span class="fa fa-save"></span> Simpan</button>
							</td>
						</tr>
						<script type="text/javascript">
							//$('#nt').hide();
							$("#save<?php echo $rs['id']; ?>").click(function(){
									var notif =  confirm('Apakah anda yakin untuk menyimpan data ini?');
									if(notif==false){
										window.location.reload();
									} else {
										var id = $("#nilai<?php echo $rs['id']; ?>").val();
										var matkul = $("#mt<?php echo $rs['id']; ?>").val();
										$.post('<?php echo base_url("admin/nilai/auth_insert_nilai"); ?>', {id:id, matkul:matkul}, function(data){
											if(data){
												//$('#nt').fadeIn(4000);
												$('#nt').html(data).fadeIn('slow').fadeOut(2000);
												//window.location.reload();
											}
											
										});
									}
								});
						</script>
						<?php $no++; ?>
						<?php endforeach; ?>
						
					</tbody>	

				</table>
			</div>
		</div>

<!-- 		<div class="panel-footer">
	<div class="row">
		<div class="col-md-12">
			<button type="submit" id="simpan" class="btn btn-primary btn-sm btn-flat"><span class="fa fa-save"></span> Simpan Nilai Mahasiswa</button>
		</div>
	</div>
</div>
 -->
	</div>
</div>
