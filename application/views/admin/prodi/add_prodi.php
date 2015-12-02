<div class="row-fluid">
<div class="box box-info"> 
 <?php echo form_open('admin/prodi/auth_add_prodi'); ?>
    <div class="box-body">
        <div class="row">  
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="no_izin">Nomor Izin Prodi :</label>
                    <input type="text" name="no_izin" class="form-control" id="no_izin" placeholder="No Izin" required>
                </div>

                <div class="form-group">
                    <label>Nama Prodi (Jurusan) :</label>
                    <input type="text" name="nm_prodi" class="form-control" placeholder="Nama Prodi" required>
                </div>

                <div class="form-group">
                    <label>Nama Ketua Prodi :</label>
                    <select name="nm_ketua" id="" class="form-control" required>
                       <option value="">Pilih Nama Kepala Prodi :</option>
                       <?php foreach($dosen as $rs): ?>
                        <option value="<?php echo $rs['id']; ?>"><?php echo $rs['nama_lengkap']; ?></option>
                        <?php endforeach; ?>
                   </select>
                </div>
            </div>
             
        </div>          
    </div>
    <div class="box-footer">
        <div class="row">
            <div class="col-md-12">
                 <button class="btn btn-sm btn-success" type="submit" name="update"><i class="fa fa-save"></i> Simpan</button>
            </div>
           
        </div>
       
    </div>
<?php echo form_close(); ?>           
</div>    
</div>