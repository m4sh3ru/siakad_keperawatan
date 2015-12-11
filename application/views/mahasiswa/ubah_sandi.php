<div class="row">
	<div class="col-md-12">
	  <div class="box box-success" style="margin-top:5px;">   
		<div class="box-header with-border">
		  <div class="box-title">Perubahan Kata Sandi Pengguna : <i><code>[ <?php echo $this->session->userdata('username'); ?> ]</code></i></div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-6">
			  <?php echo form_open('mahasiswa/auth_sandi') ?>
			   
			   <table class="table" style="padding: 10px 0 10px 0;">
				  <tr>
					 <td>Sandi<code>*</code></td>
					 <td>:</td>
					 <td>
						<input type="password" class="form-control" id="password" name="password" required>
					 </td>
				  </tr>
				  <tr>
					 <td>Ulangi Kata Sandi<code>*</code></td>
					 <td>:</td>
					 <td><input type="password" id="password_confirm" class="form-control" name="p" oninput="check(this)" required></td>
				  </tr>
				  <tr>
					 <td colspan="3">
						<button class="btn btn-success btn-sm" style="margin:10px auto;"><span class="fa fa-save"></span> Simpan Perubahan</button>
					 </td>
				  </tr>
			   </table>
			  <?php echo form_close(); ?>
			</div>
			</div>
		</div>
	  </div>
	</div>
  </div><!--/.row-->
  <script language='javascript' type='text/javascript'>
	 function check(input) {
	   if (input.value != document.getElementById('password').value) {
	   input.setCustomValidity('Password harus sama!');
	   } else {
	   // input is valid -- reset the error message
	   input.setCustomValidity('');
	   }
	 }
   </script>
