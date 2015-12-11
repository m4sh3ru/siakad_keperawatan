<style type="text/css">
	.table > thead > tr > th {
		    vertical-align: bottom !important;
		    border-bottom: none !important;
		}
	.table > thead > tr > td {
		    vertical-align: bottom !important;
		    border-bottom: none !important;
		}
</style>
<!-- NOTIFICATION -->
	<?php echo $this->session->flashdata('notif'); ?>
	<!-- END NOTIFICATION -->
<div class="box box-success">
  <div class="box-header with-border">
	<h3 class="box-title">Data Lengkap Mahasiswa :</h3>
  </div>
  <div class="panel-body">
		<div class="col-md-6">
			<table class="table">
				<thead>
					<?php foreach($mahasiswa as $rs): ?>
					<tr>
						<th width="200">Nama Lengkap</th>
						<td>:</td>
						<td><?php echo ucwords($rs['nama_lengkap']); ?></td>
					</tr>
					<tr>
						<th>NIM</th>
						<td>:</td>
						<td><?php echo $rs['nim']; ?></td>
					</tr>
					<tr>
						<th>TTL</th>
						<td>:</td>
						<td><?php echo $rs['tempat_lahir'].', '.Konversi::formatTanggal($rs['tgl_lahir']); ?></td>
					</tr>
					<tr>
						<th>Jenis Kelamin</th>
						<td>:</td>
						<td><?php echo $rs['jenis_kelamin']; ?></td>
					</tr>
					<tr>
						<th>Prodi</th>
						<td>:</td>
						<td><?php echo $rs['nama_prodi']; ?></td>
					</tr>
					<?php endforeach; ?>
				</thead>
			</table>
		</div>
  </div><!-- /.box-body -->
</div><!-- /.box -->