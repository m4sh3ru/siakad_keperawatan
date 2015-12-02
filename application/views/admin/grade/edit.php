<div class="row-fluid">
    <div class="box box-success"> 
         <?php echo form_open('admin/nilai/update_grade'); ?>
            <?php foreach($grade as $rs): ?>
             <div class="box-body">
                  <div class="row">  
                        <div class="col-sm-6">
                        
                            <div class="form-group">
                                <label>Nilai Minimal :</label>
                                <div class="input-group col-sm-4">
                                    <span class="input-group-addon" id="basic-addon1">Min</span>
                                    <input type="number" name="min" value="<?php echo $rs['min']; ?>" class="form-control" placeholder="0" required>
                                    <input type="hidden" name="id" value="<?php echo $rs['id'] ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nilai Maksimal :</label>
                                <div class="input-group col-sm-4">
                                    <span class="input-group-addon" id="basic-addon1">Max</span>
                                    <input type="number" name="max" value="<?php echo $rs['max']; ?>" class="form-control" placeholder="0" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Status Nilai :</label>
                                <div class="input-group col-sm-8">
                                    <span class="input-group-addon" id="basic-addon1">[A-E]</span>
                                    <input type="text" name="status" value="<?php echo $rs['grade']; ?>" class="form-control" id="nama_lengkap" placeholder="A-E" required>
                                </div>
                            </div>
                        </div>
                
                    </div>    
                        
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-12">
                              <button class="btn btn-sm btn-info" type="submit" name="update"><i class="fa fa-save"></i> Simpan Perubahan</button>
                        </div>
                    </div>
                     
                 </div>
                <?php endforeach; ?>
            <?php echo form_close(); ?> 

    </div> 
                    
</div>
     