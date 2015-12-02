<div class="row-fluid">
    <div class="alert alert-info"><p><span class="fa fa-info-circle"></span> <i>Pastikan data tahun Ajaran tidak terjadi duplikasi untuk menghindari ketidakvalidan data.</i></p></div>
    <div class="col-md-6">
        <div class="box box-info"> 
        
            <?php echo form_open('admin/tahun_ajaran/auth_add_periode'); ?>
             <div class="box-body">
                  <div class="row">  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_izin">Tahun Angkatan</label>
                            <input type="text" name="thn_periode" class="form-control" id="thn-angkatan" placeholder="yyyy/yyyy" maxlength="9">
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