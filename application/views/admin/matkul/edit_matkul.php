<div class="row-fluid">
    <div class="alert alert-info"><p><span class="fa fa-info-circle"></span> <i>Pastikan data tahun Ajaran tidak terjadi duplikasi untuk menghindari ketidakvalidan data.</i></p></div>
    <div class="col-md-8">
        <div class="box box-info"> 
        
            <?php echo form_open('admin/matakuliah/auth_edit_matkul'); ?>
            <?php foreach($matkul_by_id as $result):?>
             <div class="box-body">
                  <div class="row">  
                    
					<div class="col-md-6">
						<input type="hidden" name="id" value="<?php echo $this->uri->segment(4); ?>" >
						<div class="form-group">
							<label>Kode Matakuliah</label>
							<div class="input-group col-sm-4">
								<input type="text" name="kode_matkul" class="form-control" id="kode_matkul" value="<?php echo $result['kode_matkul'];?>" placeholder="Kode Matakuliah">
							</div>
						</div>

						<div class="form-group">
							<label>Nama Matakuliah</label>
							<input type="text" name="nm_matkul" class="form-control" id="nm_matkul" value="<?php echo $result['nama_matkul']; ?>" placeholder="Nama Matakuliah">
						</div>

						<div class="form-group">
                            <label>Jumlah SKS</label>
                            <div class="input-group col-sm-4">
                                <input type="number" name="sks" class="form-control" value="<?php echo $result['sks']; ?>" id="sks" placeholder="0" required>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label>Semester</label>
                            <div class="input-group col-sm-4">
                                <select name="semester" class="form-control" id="semester" placeholder="Semester" style="width: 200px;" required>
									<option value="">Pilih Semester</option>
									<?php foreach($get_semester as $show): ?>
										<option value="<?php echo $show['id'] ?>" <?php if($show['id']==$result['semester']) echo 'selected'; ?>><?php echo ucwords($show['semester']); ?></option>
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
                              <button class="btn btn-sm btn-success" name="submit" type="submit"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                      
                  </div>
                 
             </div>
             <?php endforeach; ?>
            <?php echo form_close(); ?>           
        </div>
    </div>  

