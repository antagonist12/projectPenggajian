<div class="container-fluid">
	<div class="row mt-5">
		<div class="col-md-5">
			<h2><?= $judul; ?></h2>
			<div class="card card-large">
				<div class="card-body">
					<h5 class="card-title">Nama Karyawan : <?= $karyawan['nama']; ?></h5>
					<h6 class="card-subtitle mb-2 text-muted">NIP Karyawan : <?= $karyawan['nip']; ?></h6>
					<h6 class="card-subtitle mb-2 text-muted">Jabatan Karyawan : <?= $karyawan['jabatan']; ?></h6>
					<h6 class="card-subtitle mb-2 text-muted">Masa Kerja Karyawan : <?= $karyawan['masa_kerja']; ?> Tahun</h6>
					<p class="card-text">Jenis Kelamin : <?= $karyawan['jenis_kelamin']; ?></p>
					<p class="card-text">Tanggal Lahir : <?= date('d F Y', strtotime($karyawan['tgl_lahir'])); ?></p>
					<p class="card-text">Email : <?= $karyawan['email']; ?></p>
					<p class="card-text">No. Telp : <?= $karyawan['telp']; ?></p>
					<p class="card-text">Alamat : <?= $karyawan['alamat']; ?></p>
					<a href="<?= base_url('karyawan/updateKaryawan/') . $karyawan['id']; ?>" class="badge badge-warning">Edit Karyawan</a>
					<a href="<?= base_url('karyawan'); ?>" class="badge badge-dark">Kembali</a>
				</div>
			</div>
		</div>
	</div>

</div>
