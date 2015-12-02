<div class="row-fluid">
    <div class="box box-warning"> 
        <?php echo form_open('admin/prodi/auth_edit_prodi'); ?>
            <?php foreach($prodi_by_id as $result):?>
            <div class="box-body">
                <div class="row">  
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="no_izin">Nomor Izin Prodi :</label>
                            <input type="hidden" name="id" value="<?php echo $result['id'] ?>">
                            <input type="text" name="no_izin" class="form-control" value="<?php echo $result['no_izin']; ?>" id="no_izin" placeholder="No Izin" required>
                        </div>

                        <div class="form-group">
                            <label>Nama Prodi (Jurusan) :</label>
                            <input type="text" name="nm_prodi" class="form-control" value="<?php echo $result['nama_prodi']; ?>" placeholder="Nama Prodi" required>
                        </div>

                        <div class="form-group">
                            <label>Nama Ketua Prodi :</label>
                            <select name="nm_ketua" id="" class="form-control" required>
                               <option value="">Pilih Nama Kepala Prodi :</option>
                               <?php foreach($dosen as $rs): ?>
                                <option value="<?php echo $rs['id']; ?>" <?php if($rs['id']==$result['mst_dosen_id']) echo 'selected'; ?>><?php echo $rs['nama_lengkap']; ?></option>
                                <?php endforeach; ?>
                           </select>
                        </div>
                    </div>
                     
                </div>          
            </div>
            <div class="box-footer">
                <div class="row">
                    <div class="col-md-12">
                         <button class="btn btn-sm btn-warning" type="submit" name="update"><i class="fa fa-save"></i> Simpan Perubahan</button>
                    </div>
                   
                </div>
               
            </div>
        <?php endforeach; ?>
        <?php echo form_close(); ?>           
    </div>    
</div>