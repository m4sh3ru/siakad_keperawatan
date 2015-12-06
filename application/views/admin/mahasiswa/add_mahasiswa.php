<div class="row-fluid">
<div class="box box-info"> 
 <?php echo form_open('admin/mahasiswa/auth_add_mahasiswa'); ?>
	 <div class="box-body">
		  <div class="row">  
				<div class="col-sm-4">
					 <div class="form-group">
						  <label>NIM Mahasiswa</label>
						  <input type="text" name="nim" class="form-control" placeholder="NIM Mahasiswa" required>
					 </div>

					 <div class="form-group">
						  <label>Nama Mahasiswa</label>
						  <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Mahasiswa" required>
					 </div>

					 <div class="form-group">
						  <label>Tahun Ajaran</label>
						 <select name="periode" id="" class="form-control" required>
							  <option value="">Pilih Tahun Ajaran :</option>
							  <?php foreach($periode as $rs): ?>
								<option value="<?php echo $rs['id']; ?>"><?php echo $rs['tahun_ajaran']; ?></option>
								<?php endforeach; ?>
						 </select>
					 </div>

					 <div class="form-group">
						  <label>Tempat Lahir</label>
						  <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
					 </div>
				</div>

				<div class="col-sm-4">
					 <div class="form-group">
					  <label>Tanggal Lahir</label>
						  <div class="input-group">
						  
							 <div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							 </div>
							 <input class="form-control" name="tgl_lahir" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="" type="text" required>
						  </div><!-- /.input group -->
					 </div>
					  <div class="form-group">
						  <label>Jenis Kelamin</label>
						 <select name="jk" id="" class="form-control" required>
							  <option value="">Pilih Jenis Kelamin</option>
							 <option value="1">Laki-Laki</option>
							 <option value="2">Perempuan</option>
						 </select>
					 </div>
					 <div class="form-group">
						  <label>Prodi/Jurusan</label>
						 <select name="prodi" id="" class="form-control" required>
							  <option value="">Pilih Prodi/Jurusan :</option>
							  <?php foreach($prodi as $rs): ?>
								<option value="<?php echo $rs['id']; ?>"><?php echo $rs['nama_prodi']; ?></option>
								<?php endforeach; ?>
						 </select>
					 </div>
					  <div class="form-group">
						  <label>Agama</label>
						 <select name="agama" id="" class="form-control" required>
							  <option value="">Pilih agama siswa :</option>
							  <?php foreach($agama as $rs): ?>
								<option value="<?php echo $rs['id']; ?>"><?php echo ucwords($rs['nama_agama']); ?></option>
								<?php endforeach; ?>
						 </select>
					 </div>
					 <div class="form-group">
						  <label>No Hp:</label>
						  <div class="input-group">
							 <div class="input-group-addon">
								<i class="fa fa-phone"></i>
							 </div>
							 <input class="form-control" name="no_telp" data-inputmask="'mask': [ '0999 9999 9999']" data-mask="" type="text">
						  </div><!-- /.input group -->
						</div>

					 <div class="form-group">
						  <label>Alamat</label>
						  <textarea class="form-control" name="alamat" cols="20" rows="5"></textarea>
					 </div>
				
				</div>
				 
		  </div>          
	 </div>
	 <div class="box-footer">
		  <div class="row">
				<div class="col-md-12">
					  <button class="btn btn-sm btn-success" type="submit" name="add_mahasiswa" value="add_mahasiswa"><i class="fa fa-save"></i> Simpan</button>
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