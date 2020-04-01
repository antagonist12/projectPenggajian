<div class="container-fluid">

	<div class="row">
		<div class="col-md-5 mt-5">

			<h3>Update Jabatan</h3>
			<br>
			<form method="post" action="">

				<input type="hidden" class="form-control" name="id" id="id" value="<?= $jabatan['id'] ?>">

				<div class="form-group">
					<label for="kodeJabatan">Kode Jabatan</label>
					<input type="text" class="form-control" id="kodeJabatan" name="kodeJabatan" placeholder="Masukkan Kode Jabatan" value="<?= $jabatan['kode']; ?>" autocomplete="off">
					<?= form_error('kodeJabatan', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="form-group">
					<label for="jabatan">Nama Jabatan</label>
					<input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Masukkan Nama Jabatan" value="<?= $jabatan['jabatan']; ?>" autocomplete="off">
					<?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="form-group">
					<label for="standarGaji">Standar Gaji Jabatan</label>
					<input type="number" class="form-control" name="standarGaji" id="standarGaji" placeholder="Masukkan Standar Gaji">
					<?= form_error('standarGaji', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="form-group">
					<label for="ketjabatan">Keterangan Jabatan</label>
					<input type="text" class="form-control" name="ketJabatan" id="ketJabatan" placeholder="Masukkan Keterangan Jabatan" value="<?= $jabatan['keterangan']; ?>" autocomplete="off">
					<?= form_error('ketJabatan', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>

				<button class="btn btn-success" name="edit" type="submit">Edit Jabatan</button>
				<a href="<?= base_url('Jabatan/'); ?>" class="btn btn-dark">Kembali</a>
			</form>
		</div>
	</div>
</div>
