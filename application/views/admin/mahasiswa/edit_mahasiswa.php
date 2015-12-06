<div class="row-fluid">
<div class="box box-info"> 
 <?php echo form_open('admin/mahasiswa/auth_edit_mahasiswa'); ?>
		<div class="box-body">
				<div class="row">
					 <?php foreach ($mhs_by_id as $rs) : ?>
						<div class="col-sm-4">
								<div class="form-group">
									<label>NIM Mahasiswa</label>
									<input type="text" name="nim" class="form-control" value="<?php echo $rs['nim'] ?>" placeholder="NIM Mahasiswa" required>
									<input type="hidden" name="id" class="form-control" value="<?php echo $rs['id'] ?>">
								</div>

								<div class="form-group">
										<label>Nama Mahasiswa</label>
										<input type="text" name="nama_lengkap" class="form-control" value="<?php echo $rs['nama_lengkap'] ?>" placeholder="Nama Mahasiswa" required>
								</div>

								<div class="form-group">
										<label>Tahun Ajaran</label>
									 <select name="periode" id="" class="form-control" required>
											 <option value="">Pilih Tahun Ajaran :</option>
											 <?php foreach($periode as $r): ?>
												<option value="<?php echo $r['id']; ?>" <?php if($r['id']==$rs['ref_periode_id']) echo 'selected'; ?>><?php echo $r['tahun_ajaran']; ?></option>
												<?php endforeach; ?>
									 </select>
								</div>

								<div class="form-group">
										<label>Tempat Lahir</label>
										<input type="text" name="tempat_lahir" value="<?php echo $rs['tempat_lahir'] ?>" class="form-control" placeholder="Tempat Lahir">
								</div>
						</div>

						<div class="col-sm-4">
								<div class="form-group">
								 <label>Tanggal Lahir</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input class="form-control" name="tgl_lahir" value="<?php echo $rs['tgl_lahir'] ?>"  data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="" type="text" required>
										</div><!-- /.input group -->
								</div>
								<div class="form-group">
										<label>Jenis Kelamin</label>
									 <select name="jk" id="" class="form-control" required>
											<option value="">Pilih Jenis Kelamin</option>
										 <option value="1" <?php if($rs['jenis_kelamin']==1) echo 'selected'; ?>>Laki-Laki</option>
										 <option value="2" <?php if($rs['jenis_kelamin']==2) echo 'selected'; ?>>Perempuan</option>
									 </select>
								 </div>
								<div class="form-group">
										<label>Prodi/Jurusan</label>
									 <select name="prodi" id="" class="form-control" required>
											 <option value="">Pilih Prodi/Jurusan :</option>
											 <?php foreach($prodi as $r): ?>
												<option value="<?php echo $r['id']; ?>" <?php if($r['id']==$rs['ref_prodi_id']) echo 'selected'; ?>><?php echo $r['nama_prodi']; ?></option>
												<?php endforeach; ?>
									 </select>
								</div>
								 <div class="form-group">
										<label>Agama</label>
									 <select name="agama" id="" class="form-control" required>
											 <option value="">Pilih agama siswa :</option>
											 <?php foreach($agama as $r): ?>
												<option value="<?php echo $r['id']; ?>" <?php if($r['id']==$rs['ref_agama_id']) echo 'selected'; ?>><?php echo ucwords($r['nama_agama']); ?></option>
												<?php endforeach; ?>
									 </select>
								</div>
								<div class="form-group">
										<label>No Hp:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-phone"></i>
											</div>
											<input type="text" class="form-control" name="no_telp" value="<?php echo $rs['hp']; ?>" data-inputmask="'mask': [ '0999 9999 9999']" data-mask="">
										</div><!-- /.input group -->
									</div>

								<div class="form-group">
										<label>Alamat</label>
										<textarea class="form-control" name="alamat" cols="20" rows="5"><?php echo $rs['alamat']; ?></textarea>
								</div>
						
						</div>
						<?php endforeach; ?>
				</div>          
		</div>
		<div class="box-footer">
				<div class="row">
						<div class="col-md-12">
								 <button class="btn btn-sm btn-info" type="submit" name="update"><i class="fa fa-save"></i> Simpan Perubahan</button>
						</div>
					 
				</div>
			 
		</div>
<?php echo form_close(); ?>           
</div>    
</div>

<script type="text/javascript">
			$(function () {
				//Money Euro
				$("[data-mask]").inputmask();
		
			});
		</script>