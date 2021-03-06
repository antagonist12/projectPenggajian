<div class="container-fluid">

	<div class="row">
		<div class="col-md-5 mt-5">

			<h3>Tambah Aturan Gaji Baru</h3>
			<br>
			<form method="post" action="<?= base_url('Aturan_gaji/addAturan') ?>">
				<div class="form-group">
					<label for="jabatan">Nama Jabatan</label>
					<div>
						<select class="custom-select mr-sm-2" id="jabatan" name="jabatan">
							<option value="" selected>Pilih Jabatan...</option>
							<?php foreach ($jabatan as $j) : ?>
								<option value="<?= $j['jabatan'] ?>"><?= $j['jabatan'] ?></option>
							<?php endforeach; ?>
						</select>
						<?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="masaKerja">Masa Kerja <span style="color:red;">(thn)</span></label>
					<input type="number" class="form-control" name="masaKerja" id="masaKerja" placeholder="Masukkan Masa Kerja" value="<?= set_value('masaKerja'); ?>">
					<?= form_error('masaKerja', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="form-group">
					<label for="insentif">Insentif</label>
					<input type="number" class="form-control" name="insentif" id="insentif" placeholder="Masukkan Insentif">
					<?= form_error('insentif', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="form-group">
					<label for="bonus">Bonus</label>
					<input type="number" class="form-control" name="bonus" id="bonus" placeholder="Masukkan Bonus">
					<?= form_error('bonus', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>

				<button class="btn btn-success" name="tambah" type="submit">Tambah Aturan Gaji</button>
				<a href="<?= base_url('Aturan_gaji/'); ?>" class="btn btn-dark">Kembali</a>
			</form>
		</div>
	</div>
</div>
