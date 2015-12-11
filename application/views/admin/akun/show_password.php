
<!-- Modal -->
<div class="modal fade" id="showPass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<table>
					<thead>
						<tr>
							<th>Username</th>
							<td>:</td>
							<td><?php echo $rs['username']; ?></td>
						</tr>
						<tr>
							<th>Password</th>
							<td>:</td>
							<td><?php echo $rs['password_text']; ?></td>
						</tr>
					</thead>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><span class="fa fa-long-arrow-left"></span> Kembali Ke Menu Sebelumnya</button>
			</div>
		</div>
	</div>
</div>