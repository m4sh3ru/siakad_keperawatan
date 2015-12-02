<div class="row-fluid">
    <div class="box box-success"> 
         <?php echo form_open('admin/dosen/auth_edit_dosen'); ?>
             <div class="box-body">
                  <div class="row">
                  <?php foreach($dosen_by_id as $result) : ?> 
                        <div class="col-sm-6">
                        
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <div class="input-group col-sm-8">
                                    <input type="hidden" name="id" value="<?php echo $this->uri->segment(4);?>">
                                    <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $result['nama_lengkap']; ?>" id="nama_lengkap" placeholder="Nama Lengkap" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>NIDN atau NIP</label>
                                <div class="input-group col-sm-5">
                                    <input type="text" name="nidn" class="form-control" value="<?php echo $result['nidn']; ?>" placeholder="NIDN Dosen" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <div class="input-group col-sm-6">
                                    <input type="text" name="tempat_lahir" value="<?php echo $result['tempat_lahir']; ?>" class="form-control" placeholder="Tempat Lahir"> 
                                </div>
                            </div>

                            <div class="form-group">
                              <label>Tanggal Lahir</label>
                                  <div class="input-group col-sm-5">
                                  
                                     <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                     </div>
                                     <input class="form-control" value="<?php echo $result['tanggal_lahir']; ?>" name="tgl_lahir" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="" type="text" required>
                                  </div><!-- /.input group -->
                             </div>

                           
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <div class="input-group col-sm-6">
                                    <select name="jns_kelamin" id="" class="form-control" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="1" <?php if($result['jenis_kelamin']==1) echo 'selected'; ?>>Laki-Laki</option>
                                        <option value="2" <?php if($result['jenis_kelamin']==2) echo 'selected'; ?>>Perempuan</option>
                                     </select>
                                </div>                                   
                             </div>
                            <div class="form-group">
                                <label>Agama</label>
                                <div class="input-group col-sm-6">
                                    <select name="agama" id="" class="form-control" required>
                                        <option value="">Pilih agama dosen :</option>
                                        <?php foreach($agama as $rs): ?>
                                        <option value="<?php echo $rs['id']; ?>" <?php if($rs['id']==$result['ref_agama_id']) echo 'selected'; ?>><?php echo ucwords($rs['nama_agama']); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                             </div>
                            <div class="form-group">
                              <label>No Hp:</label>
                              <div class="input-group col-sm-6">
                                 <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                 </div>
                                 <input class="form-control" value="<?php echo $result['no_telp']; ?>" name="no_telp" data-inputmask="'mask': [ '0999 9999 9999']" data-mask="" type="text">
                              </div><!-- /.input group -->
                            </div>        
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat" cols="20" rows="3">"<?php echo $result['alamat']; ?></textarea>
                             </div>
                        </div>
                
                    </div>    
                    <?php endforeach; ?>   
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