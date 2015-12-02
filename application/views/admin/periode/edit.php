<div class="row-fluid">
    <div class="alert alert-danger"><p><span class="fa fa-info-circle"></span> <i>Pastikan data tahun Ajaran tidak terjadi duplikasi untuk menghindari ketidakvalidan data.</i></p></div>
    <div class="col-md-6">
        <div class="box box-info"> 
        
        <?php echo form_open('admin/tahun_ajaran/update_periode'); ?>
             <?php foreach($periode_by_id as $result):?>
             <div class="box-body">
                  <div class="row">  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_izin">Tahun Angkatan</label>
                            <input type="text" name="thn_periode" class="form-control" value="<?php echo $result['tahun_ajaran']; ?>" id="thn-angkatan" placeholder="yyyy/yyyy" maxlength="9">
                             <input type="hidden" name="id" value="<?php echo $this->uri->segment(4); ?>"> 
                        </div>
                    </div>
                  </div>          
             </div>
             <div class="box-footer">
                  <div class="row">
                        <div class="col-md-12">
                              <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                      
                  </div>
                 
             </div>
             <?php endforeach; ?>
        <?php echo form_close(); ?>           
        </div>
    </div>    
</div>
