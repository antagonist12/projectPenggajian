<div class="container-fluid">
	<div class="row mt-5">
		<div class="col-md-5">
			<h2><?= $judul; ?></h2>
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Nama Jabatan : <?= $jabatan['jabatan']; ?></h5>
					<h6 class="card-subtitle mb-2 text-muted">Kode Jabatan : <?= $jabatan['kode']; ?></h6>
					<p class="card-text">Standar Gaji : Rp. <?= number_format($jabatan['standar_gaji']); ?></p>
					<p class="card-text">Keterangan : <?= $jabatan['keterangan']; ?></p>
					<a href="<?= base_url('jabatan/updateJabatan/') . $jabatan['id']; ?>" class="badge badge-warning">Edit Jabatan</a>
					<a href="<?= base_url('jabatan'); ?>" class="badge badge-dark">Kembali</a>
				</div>
			</div>
		</div>
	</div>

</div>
