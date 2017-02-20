<div class="container">
	<div class="alert alert-danger" style="margin-top:100px;">
		Harap Login
		<p>
			Anda belum login ke dalam sistem. Silahkan login terlebih dahulu untuk konfirmasi pembayaran.
		</p>
	</div>
	<div class="row">
		<div class="col-lg-4">
			&nbsp;
		</div>
		<div class="col-lg-4" align="center" style="margin-top:30px;">
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon2"><b>Login</b></span>
			</div>
			<div class="input-group" style="margin-top:30px;">
				<span class="input-group-addon" id="basic-addon2">Username</span>
				<input type="text" class="form-control" name="username" placeholder="Masukkan Username Anda..." aria-describedby="basic-addon2">
			</div>
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon3">Password&nbsp;</span>
				<input type="password" class="form-control" name="password" placeholder="Masukkan Password Anda...">
			</div>
			<a href="<?php echo base_url('site/konfirmasi_pembayaran') ?>" class="btn btn-primary btn-default" align="center" style="margin-top:50px;margin-bottom:88px;">Login</a>
		</div>
		<div class="col-lg-4">
			&nbsp;
		</div>
	</div>
</div>