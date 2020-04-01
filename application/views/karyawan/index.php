<div class="container-fluid">

	<div class="row">
		<div class="col mt-5">
			<a href="<?= base_url('Karyawan/addKaryawan'); ?>" class="btn btn-primary mb-3">Tambah Karyawan</a>
			<?= $this->session->flashdata('message'); ?>
		</div>
	</div>

	<div class="row">
		<div class="col mt-3">
			<h2><?= $judul; ?></h2>
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">#</th>
						<th scope="col">NIP</th>
						<th scope="col">Nama Karyawan</th>
						<th scope="col">No. Telf</th>
						<th scope="col">Jabatan</th>
						<th scope="col">Options</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($karyawan as $k) : ?>
						<tr>
							<th scope="row"><?= $i; ?></th>
							<td><?= $k['nip']; ?></td>
							<td><?= $k['nama']; ?></td>
							<td><?= $k['telp']; ?></td>
							<td><?= $k['jabatan']; ?></td>
							<td>
								<a href="<?= base_url('Karyawan/detailKaryawan/') . $k['id']; ?>" class="btn btn-info">Detail Karyawan</a>
								<a href="<?= base_url('Karyawan/deleteKaryawan/') . $k['id']; ?>" class="btn btn-danger">Hapus Karyawan</a>
							</td>
						</tr>
						<?php $i++; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
