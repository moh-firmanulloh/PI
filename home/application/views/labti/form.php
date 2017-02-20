<?php $npm = ""; $nama = ""; $nilai = ""; ?>

<form role="form" action="<?php echo base_url(); ?>index.php/labti/halaman/simpan" method="post">
	<div class="form-group">
		<input class="form-control" type="hidden" name="op" value="<?php echo $op; ?>" placeholder="op">
		<label>NPM</label>
		<input class="form-control" type="text" name="npm" value="<?php echo $npm; ?>" placeholder="NPM">
	</div>
	<div class="form-group">
		<label>Nama Mahasiswa</label>
		<input class="form-control" type="text" name="nama" value="<?php echo $nama; ?>" placeholder="Nama Mahasiswa">
	</div>
	<div class="form-group">
		<label>Nilai</label>
		<input class="form-control" type="text" name="nilai" value="<?php echo $nilai; ?>" placeholder="Nilai">
	</div>

	<button type="submit" class="btn btn-default">Simpan</button>
</form>