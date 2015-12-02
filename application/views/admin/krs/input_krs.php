<div class="row-fluid">
<div class="box box-info"> 
                            
    <div class="box-body">
        <div class="row">  
        <?php echo form_open('admin/krs/auth_add_krs'); ?>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>NIM</label>
                    <?php foreach ($mahasiswa_by_id as $show) : ?>
                    <input style="width:200px;" type="text" name="nim" class="form-control" id="nim" value="<?php echo $show['nim']; ?>" disabled> 
                    <input type="hidden" name="nim" class="form-control" id="nim" value="<?php echo $show['nim']; ?>">
                    <?php endforeach; ?>
                </div>

                <div class="form-group">
                    <label>Semester</label>
                    <select name="semester" class="form-control" style="width : 200px;">
                        <?php foreach($get_semester as $tampil) : ?>
                            <option><?php echo $tampil['semester']; ?></option>
                        <?php endforeach; ?>                       
                    </select>
                </div>

                 <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Matakuliah</th>
                                <th>Nama Matakuliah</th>
                                <th>Jumlah SKS</th>
                                <th>Semester</th>
                                <th>Pilih</th>
                            </tr>   
                        </thead>
                        <tbody>
                            <?php $no=1;
                                foreach ($get_matkul as $result) : ?>
                                <tr>
                                    <td> <?php echo $no++; ?></td>

                                <!--    <td> <?php // echo $result['kode_matkul']; ?></td>  -->
                                    <td> <?php echo $result['nama_matkul']; ?></td>
                                    <td> <?php echo $result['sks']; ?></td>
                                    <td> <?php echo $result['semester']; ?></td>
                                    <td align="center">
                                        <input type="hidden" name="kode_matkul[];" value="<?php echo $result['kode_matkul']; ?>" class="form_control"> 
                                        <input type="checkbox" name="kode_matkul">
                                    </td>
                                </tr>
                            <?php endforeach; ?>        
                        </tbody>    
                    </table>        
           

                <button class="btn btn-success" type="submit" name="update"><i class="glyphicon glyphicon-floppy-open"></i> Simpan</button>
            </div>
        <?php echo form_close(); ?>     
        </div>          
    </div>   
              
</div>    
</div>