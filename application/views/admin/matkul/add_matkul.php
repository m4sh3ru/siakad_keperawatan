<div class="row-fluid">
    <div class="alert alert-info"><p><span class="fa fa-info-circle"></span> <i>Pastikan data tahun Ajaran tidak terjadi duplikasi untuk menghindari ketidakvalidan data.</i></p></div>
    <div class="col-md-8">
        <div class="box box-info"> 
        
            <?php echo form_open('admin/matakuliah/auth_add_matkul'); ?>
             <div class="box-body">
                  <div class="row">  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kode Matakuliah</label>
                            <input type="text" name="kode_matkul" class="form-control" id="kode_matkul" placeholder="Kode Mata Kuliah" required>
                        </div>

                        <div class="form-group">
                            <label>Nama Matakuliah</label>
                            <input type="text" name="nm_matkul" class="form-control" id="nm_matkul" placeholder="Nama Mata Kuliah" required>
                        </div>

                        <div class="form-group">
                            <label>Jumlah SKS</label>
                            <div class="input-group col-sm-4">
                                <input type="number" name="sks" class="form-control" id="sks" placeholder="0" required>
                            </div>
                            
                        </div>

                        <div class="form-group">
                            <label>Semester</label>
                            <select name="semester" class="form-control" id="semester" placeholder="Semester" required>
                                <option value="">Pilih Semester</option>
                                <?php foreach($get_semester as $show): ?>
                                    <option value="<?php echo $show['id'] ?>"><?php echo ucwords($show['semester']); ?></option>
                                <?php endforeach; ?>    
                            </select>
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
            <?php echo form_close(); ?>           
        </div>
    </div>    
</div>

<script type="text/javascript">
        $(function () {
          //Money Euro
          $("[data-mask]").inputmask();
     
        });
     </script>
