<div class="row-fluid">
   <div class="box box-success"> 
      <?php echo form_open('admin/kelas/update_kelas'); ?>
        <?php foreach($kelas_by_id as $rs): ?>
         <div class="box-body">
            <div class="row">  
                <div class="col-sm-6">
                
                   <div class="form-group">
                      <label>Nama Kelas :</label>
                      <div class="input-group col-sm-8">
                        <input type="text" name="kelas" class="form-control" value="<?php echo $rs['nama_kelas'] ?>" id="kelas" placeholder="Nama Lengkap" required>
                        <input type="hidden" name="id" value="<?php echo $rs['id']; ?>">
                      </div>
                   </div>

                   <div class="form-group">
                      <label>Prodi :</label>
                      <div class="input-group col-sm-6">
                        <select name="prodi" id="" class="form-control" required>
                           <option value="">Pilih Prodi :</option>
                           <?php foreach($prodi as $r): ?>
                           <option value="<?php echo $r['id']; ?>"  <?php if($r['id']==$rs['ref_prodi_id']) echo 'selected'; ?>><?php echo ucwords($r['nama_prodi']); ?></option>
                           <?php endforeach; ?>
                        </select>
                      </div>
                   </div>   
                   <div class="form-group">
                      <label>Tahun Ajaran :</label>
                      <div class="input-group col-sm-6">
                        <select name="periode" id="" class="form-control" required>
                           <option value="">Tahun Pelajaran :</option>
                           <?php foreach($periode as $r): ?>
                           <option value="<?php echo $r['id']; ?>"<?php if($r['id']==$rs['ref_periode_id']) echo 'selected'; ?>><?php echo ucwords($r['tahun_ajaran']); ?></option>
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
                  <button class="btn btn-sm btn-warning" type="submit" name="submit" value="submit"><i class="fa fa-save"></i> Simpan Perubahan</button>
                </div>
              </div>
              
            </div>
          <?php endforeach; ?> 
        <?php echo form_close(); ?> 

   </div> 
              
</div>
    

<script type="text/javascript">
      $(function () {
       //Money Euro
       $("[data-mask]").inputmask();
    
      });
    </script>