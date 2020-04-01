<div class="container-fluid">

	<div class="row">
		<div class="col-md-12 mt-5">

			<h3>Edit Karyawan</h3>
			<br>
			<form method="post" action="">
				<input type="hidden" class="form-control" name="id" id="id" value="<?= $karyawan['id'] ?>">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="nip">NIP Karyawan</label>
							<input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP Karyawan" value="<?= $karyawan['nip']; ?>" readonly>
							<?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="nama">Nama Karyawan</label>
							<input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Karyawan" value="<?= $karyawan['nama']; ?>" autocomplete="off">
							<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="jenis_kelamin">Jenis Kelamin</label>
							<div>
								<select class="custom-select mr-sm-2" id="jenis_kelamin" name="jenis_kelamin">
									<option value="" selected>Pilih Jenis Kelamin...</option>
									<option value="Pria">Pria</option>
									<option value="Wanita">Wanita</option>
								</select>
								<?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="tgl_lahir">Tanggal Lahir Karyawan</label>
							<input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?= $karyawan['tgl_lahir']; ?>">
							<?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="masaKerja">Masa Kerja Karyawan <span style="color:red;">(thn)</span></label>
							<input type="number" class="form-control" name="masaKerja" id="masaKerja" placeholder="Masukkan Masa Kerja Karyawan" value="<?= $karyawan['masa_kerja']; ?>">
							<?= form_error('masaKerja', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="telp">No. Telepon Karyawan</label>
							<input type="text" class="form-control" name="telp" id="telp" placeholder="Masukkan No. Telepon Karyawan" value="<?= $karyawan['telp']; ?>" autocomplete="off">
							<?= form_error('telp', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="email">Email Karyawan</label>
							<input type="text" class="form-control" name="email" id="email" placeholder="Masukkan Email Karyawan" value="<?= $karyawan['email']; ?>" autocomplete="off">
							<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="alamat">Alamat Karyawan</label>
							<input type="alamat" class="form-control" name="alamat" id="alamat" placeholder="Masukkan alamat Karyawan" value="<?= $karyawan['alamat']; ?>" autocomplete="off">
							<?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="jabatan">Nama Jabatan</label>
							<div>
								<select class="custom-select mr-sm-2" id="jabatan" name="jabatan">
									<option value="" selected>Pilih Jabatan Karyawan</option>
									<?php foreach ($jabatan as $j) : ?>
										<option value="<?= $j['jabatan'] ?>"><?= $j['jabatan'] ?></option>
									<?php endforeach; ?>
								</select>
								<?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						<button class="btn btn-success" name="edit" type="submit">Edit Karyawan</button>
						<a href="<?= base_url('Karyawan/'); ?>" class="btn btn-dark">Kembali</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
