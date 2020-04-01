<div class="container-fluid">

	<div class="row">
		<div class="col mt-5">
			<a href="<?= base_url('Jabatan/addJabatan'); ?>" class="btn btn-primary mb-3">Tambah Jabatan</a>
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
						<th scope="col">Kode Jabatan</th>
						<th scope="col">Nama Jabatan</th>
						<th scope="col">Standar Gaji</th>
						<!-- <th scope="col">Keterangan</th> -->
						<th scope="col">Options</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($jabatan as $j) : ?>
						<tr>
							<th scope="row"><?= $i; ?></th>
							<td><?= $j['kode']; ?></td>
							<td><?= $j['jabatan']; ?></td>
							<td>Rp. <?= number_format($j['standar_gaji']); ?></td>
							<!-- <td>Ini Jabatan ....</td> -->
							<td>
								<a href="<?= base_url('Jabatan/detailJabatan/') . $j['id']; ?>" class="btn btn-info">Detail Jabatan</a>
								<a href="<?= base_url('Jabatan/deleteJabatan/') . $j['id']; ?>" class="btn btn-danger">Hapus Jabatan</a>
							</td>
						</tr>
						<?php $i++; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
