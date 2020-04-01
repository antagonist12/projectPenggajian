<div class="container-fluid">

	<div class="row">
		<div class="col mt-5">
			<a href="<?= base_url('Penggajian/addGaji'); ?>" class="btn btn-primary mb-3">Tambah Penggajian</a>
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
						<th scope="col">Kode Penggajian</th>
						<th scope="col">NIP</th>
						<th scope="col">Nama Karyawan</th>
						<th scope="col">Tanggal Penerimaan Gaji</th>
						<th scope="col">Nominal Gaji</th>
						<th scope="col">Options</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($gaji as $g) : ?>
						<tr>
							<th scope="row"><?= $i; ?></th>
							<td><?= $g['kode_penggajian']; ?></td>
							<td><?= $g['nip']; ?></td>
							<td><?= $g['nama_karyawan']; ?></td>
							<td><?= date('d F Y', strtotime($g['tanggal_penerimaan'])); ?></td>
							<td>Rp. <?= number_format($g['nominal']); ?></td>
							<td>
								<a href="<?= base_url('Penggajian/detailPenggajian/') . $g['nip']; ?>" class="btn btn-info">Detail Penggajian</a>
							</td>
						</tr>
						<?php $i++; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
