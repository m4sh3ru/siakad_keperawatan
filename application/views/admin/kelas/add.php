<div class="row-fluid">
	 <div class="box box-success"> 
			<?php echo form_open('admin/kelas/auth_add_kelas'); ?>
				 <div class="box-body">
						<div class="row">  
								<div class="col-sm-6">
								
									 <div class="form-group">
										  <label>Nama Kelas :</label>
										  <div class="input-group col-sm-8">
												<input type="text" name="kelas" class="form-control" id="kelas" placeholder="Nama Lengkap" required>
										  </div>
									 </div>

									 <div class="form-group">
										  <label>Prodi :</label>
										  <div class="input-group col-sm-6">
												<select name="prodi" id="" class="form-control" required>
													 <option value="">Pilih Prodi :</option>
													 <?php foreach($prodi as $rs): ?>
													 <option value="<?php echo $rs['id']; ?>"><?php echo ucwords($rs['nama_prodi']); ?></option>
													 <?php endforeach; ?>
												</select>
										  </div>
									 </div>   
									 <div class="form-group">
										  <label>Tahun Ajaran :</label>
										  <div class="input-group col-sm-6">
												<select name="periode" id="" class="form-control" required>
													 <option value="">Tahun Pelajaran :</option>
													 <?php foreach($periode as $rs): ?>
													 <option value="<?php echo $rs['id']; ?>"><?php echo ucwords($rs['tahun_ajaran']); ?></option>
													 <?php endforeach; ?>
												</select>
										  </div>
									 </div> 
								</div>
					 
						  </div>    
								
					 </div>
					 <div class="box-footer">
						  <div class="row">
								<div class="col-md-12">
									<button class="btn btn-sm btn-success" type="submit" name="submit" value="submit"><i class="fa fa-save"></i> Simpan</button>
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