<div class="container-fluid">

	<div class="row">
		<div class="col mt-5">
			<a href="<?= base_url('Aturan_gaji/addAturan'); ?>" class="btn btn-primary mb-3">Tambah Aturan Gaji</a>
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
						<th scope="col">Nama Jabatan</th>
						<th scope="col">Masa Kerja <span style="color:red;">(thn)</span></th>
						<th scope="col">Insentif</th>
						<th scope="col">Bonus</th>
						<th scope="col">Options</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($aturanGaji as $ag) : ?>
						<tr>
							<th scope="row"><?= $i; ?></th>
							<td><?= $ag['jabatan']; ?></td>
							<td><?= $ag['masa_kerja']; ?> Tahun</td>
							<td>Rp. <?= number_format($ag['insentif']); ?></td>
							<td>Rp. <?= number_format($ag['bonus']); ?></td>
							<!-- <td>Ini Jabatan ....</td> -->
							<td>
								<a href="<?= base_url('Aturan_gaji/updateAturan/') . $ag['id']; ?>" class="btn btn-info">Update Aturan Gaji</a>
								<a href="<?= base_url('Aturan_gaji/deleteAturan/') . $ag['id']; ?>" class="btn btn-danger">Hapus Aturan Gaji</a>
							</td>
						</tr>
						<?php $i++; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
