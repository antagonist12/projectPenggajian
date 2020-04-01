<div class="container-fluid">

	<div class="row">
		<div class="col-md-5 mt-5">

			<h3>Tambah Gaji</h3>
			<br>
			<form method="post" action="<?= base_url('Penggajian/addGaji') ?>">
				<div class="form-group">
					<label for="jabatan">Pilih Jabatan</label>
					<div>
						<select class="custom-select mr-sm-2" id="jabatan" name="jabatan">
							<option value="" selected>Pilih jabatan Karyawan</option>
							<?php foreach ($jabatan as $j) : ?>
								<option value="<?= $j['jabatan'] ?>"><?= $j['jabatan'] ?></option>
							<?php endforeach; ?>
						</select>
						<?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
				</div>

				<div class="form-group">
					<label for="nip">Pilih Karyawan</label>
					<div>
						<select class="custom-select mr-sm-2" id="nip" name="nip">
							<option value="0">Pilih Karyawan</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<input type="hidden" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Karyawan" value="">
				</div>

				<div class="form-group">
					<label for="tglPenerimaan">Tanggal Penerimaan</label>
					<input type="date" class="form-control" name="tglPenerimaan" id="tglPenerimaan" placeholder="Masukkan Keterangan Jabatan" value="<?= set_value('tglPenerimaan'); ?>">
					<?= form_error('tglPenerimaan', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>

				<div class="form-group">
					<label for="nominal">Nominal Gaji Karyawan</label>
					<input type="text" class="form-control" name="nominal" id="nominal" placeholder="Masukkan nominal Karyawan" value="" readonly>
					<?= form_error('nominal', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>

				<button class="btn btn-success" name="tambah" type="submit">Tambah Gaji</button>
				<a href="<?= base_url('Penggajian/'); ?>" class="btn btn-dark">Kembali</a>
			</form>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

<script>
	$(document).ready(function() {
		$('#jabatan').change(function() {
			var jabatan = $('#jabatan').val();
			$.ajax({
				url: "<?php echo base_url(); ?>/Penggajian/DataKaryawan",
				method: "POST",
				data: {
					jabatan,
				},
				cache: false,
				dataType: 'json',
				success: function(array) {
					var html = '';
					for (let index = 0; index < array.length; index++) {
						html += '<option value="' + array[index].nip + '">' + array[index].nama + '</option>'
						$('#nama').val(array[index].nama);
						if (array[index].masa_kerja < 1) {
							$('#nominal').val(parseInt(array[index].standar_gaji));
						} else {
							$('#nominal').val(parseInt(array[index].standar_gaji) + parseInt(array[index].insentif) + parseInt(array[index].bonus));
						}
					}
					$('#nip').html(html);
				}
			});
		});
	});
</script>
