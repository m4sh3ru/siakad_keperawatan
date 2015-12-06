<div class="row-fluid">
    <div class="alert alert-info"><p><span class="fa fa-info-circle"></span> <i>Pastikan data Akun Pengguna tidak terjadi duplikasi untuk menghindari penyalahgunaan Akses.</i></p></div>
    <div class="col-md-6">
        <div class="box box-info"> 
        
            <?php echo form_open('admin/account/auth_add'); ?>
            <?php foreach($user as $r): ?>
             <div class="box-body">
                  <div class="row">  
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="no_izin">Username :</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="glyphicon glyphicon-user"></i></div>
                                <input type="text" name="user" value="<?php echo $r['username']; ?>" class="form-control" placeholder="Username" maxlength="20" required>
                                <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_izin">Password :</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></div>
                                <input type="password" name="pass" id="pass" class="form-control" placeholder="Password" maxlength="9" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Re-type Password :</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></div>
                                <input type="password" name="pass2" id="password_confirm" oninput="check(this)" class="form-control" placeholder="Re-Type Password" maxlength="9" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Level Pengguna :</label>
                            <div class="input-group col-sm-6">
                                <select name="level" id="" class="form-control" required>
                                    <option value="">Level Pengguna</option>
                                    <?php foreach($level as $rs): ?>
                                    <option value="<?php echo $rs['id']; ?>" <?php if($rs['id']==$r['ref_level_id']) echo 'selected'; ?>><?php echo ucwords($rs['level']); ?></option>
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
                              <button class="btn btn-sm btn-success" name="save" type="submit"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                      
                  </div>
                 
             </div>
            <?php endforeach; ?>
            <?php echo form_close(); ?>           
        </div>
    </div>    
</div>
  <script language='javascript' type='text/javascript'>
     function check(input) {
       if (input.value != document.getElementById('pass').value) {
       input.setCustomValidity('Password harus sama!');
       } else {
       // input is valid -- reset the error message
       input.setCustomValidity('');
       }
     }
   </script>