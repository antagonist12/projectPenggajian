<div class="container-fluid">
	<div class="row mt-5">
		<div class="col-md-5">
			<h2><?= $judul; ?></h2>
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Nama Karyawan : <?= $detail['nama_karyawan']; ?></h5>
					<h6 class="card-subtitle mb-2 text-muted">NIP : <?= $detail['nip']; ?></h6>
					<h6 class="card-subtitle mb-2 text-muted">Masa Kerja : <?= $detail['masa_kerja']; ?> Tahun</h6>
					<p class="card-text">Jabatan : <?= $detail['jabatan']; ?></p>
					<p class="card-text">Standar Gaji : Rp. <?= number_format($detail['standar_gaji']); ?></p>
					<p class="card-text">Total Gaji : Rp. <?= number_format($detail['nominal']); ?></p>

					<a href="<?= base_url('penggajian'); ?>" class="badge badge-dark">Kembali</a>
				</div>
			</div>
		</div>
	</div>

</div>
